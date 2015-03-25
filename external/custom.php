<?php

function theme_setup() {
  register_nav_menu( 'primary', 'primary menu' );
  register_nav_menu( 'secondary', 'secondary menu' );

  load_theme_textdomain( 'site', get_template_directory() . '/languages' );

  add_theme_support('post-thumbnails');
  add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );
  /*
  Sécurité:
   Activer les liens RSS automatiques (feed_links & feed_links_extra)
   */
  add_theme_support( 'automatic-feed-links' );}

}
add_action( 'after_setup_theme', 'theme_setup' );
add_action( 'after_setup_theme', 'custom_image_setup' );



/******************/
/* Base functions */
/******************/

/*
 Désactiver les flux RSS secondaires (les commentaires de chaque article)
 */
remove_action('wp_head', 'feed_links_extra', 3);


/*
 Désactiver le flux RSS des articles et celui des commentaires
 */
remove_action('wp_head', 'feed_links', 2);


/*
 Réactiver le flux RSS principal
 * © Daniel Roch
 */
function seomix_feed_link( $args = array() ) {
  $defaults = array(
    /* translators: Separator between blog name and feed type in feed links */
    'separator' => _x('»', 'feed link'),
    /* translators: 1: blog title, 2: separator (raquo) */
    'feedtitle' => __('%1$s %2$s Feed'),
    /* translators: %s: blog title, 2: separator (raquo) */
    'comstitle' => __('%1$s %2$s Comments Feed'),
  );
  $args = wp_parse_args( $args, $defaults );
  echo '<link rel="alternate" type="application/rss+xml" title="' . esc_attr(sprintf( $args['feedtitle'], get_bloginfo('name'), $args['separator'] )) . '" href="' . home_url() . "/feed/\" />\n";
}
add_action('wp_head', 'seomix_feed_link');

// Add new image sizes
function insert_custom_image_sizes( $image_sizes ) {
  // get the custom image sizes
  global $_wp_additional_image_sizes;
  // if there are none, just return the built-in sizes
  if ( empty( $_wp_additional_image_sizes ) )
    return $image_sizes;
  // add all the custom sizes to the built-in sizes
  foreach ( $_wp_additional_image_sizes as $id => $data ) {
    // take the size ID (e.g., 'my-name'), replace hyphens with spaces,
    // and capitalise the first letter of each word
    if ( !isset($image_sizes[$id]) )
      $image_sizes[$id] = ucfirst( str_replace( '-', ' ', $id ) );
  }
  return $image_sizes;
}

/* Change and add image sizes as desired :) */

function custom_image_setup () {
  //example:
    // add_image_size( 'square', 600, 600, true );
    // add_filter( 'image_size_names_choose', 'insert_custom_image_sizes' );
}

/**
* Image shortcode callback
*
* Enables the [pic] shortcode, pseudo-TimThumb but creates resized and cropped image files safely
* from existing media library entries. Usage: 
* [pic src="http://example.org/wp-content/uploads/2012/03/image.png" width="100" height="100"]
*
*/
function kat_img_resize( $atts ) {
   extract( shortcode_atts( array(
       'src' => '',
       'width' => '',
       'height' => '',
   ), $atts ) );

   global $wpdb;

   // Sanitize
   $height = absint( $height );
   $width = absint( $width );
   $src = esc_url( strtolower( $src ) );
   $needs_resize = true;

   $upload_dir = wp_upload_dir();
   $base_url = strtolower( $upload_dir['baseurl'] );

   // Let's see if the image belongs to our uploads directory.
   if ( substr( $src, 0, strlen( $base_url ) ) != $base_url ) {
       return "Error: external images are not supported.";
   }

   // Look the file up in the database.
   $file = str_replace( trailingslashit( $base_url ), '', $src );
   $attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '_wp_attachment_metadata' AND meta_value LIKE %s LIMIT 1;", '%"' . like_escape( $file ) . '"%' ) );

   // If an attachment record was not found.
   if ( ! $attachment_id ) {
       return "Error: attachment not found.";
   }
   // Look through the attachment meta data for an image that fits our size.
   $meta = wp_get_attachment_metadata( $attachment_id );
       $srcArr = explode('.', $src);
       $name = $srcArr[0] . '-' . $width . 'x' .$height . '.' . $srcArr[1];


   foreach( $meta['sizes'] as $key => $size ) {
       if ( $size['width'] == $width && $size['height'] == $height ) {

           $src = str_replace( basename( $src ), $size['file'], $src );
           $needs_resize = false;
           break;
       }
       //$siz = 'resized-'.$width .'x' . $height;
       // if($name == $size['file']){
       //     $needs_resize = false;
       //     break;
       // }
   }

   //Miracle solution: if width x height size doesn't exist for this media, we create it :)
   $siz = 'resized-'.$width .'x' . $height;
   if( $meta['sizes'][$siz]['file'] != '' ){
       $needs_resize = false;
   }
   else{
       $needs_resize = true;
   }

   // If an image of such size was not found, we can create one.
   if ( $needs_resize ) {
       $attached_file = get_attached_file( $attachment_id );
       $resized = image_make_intermediate_size( $attached_file, $width, $height, true );
       if ( ! is_wp_error( $resized ) ) {

           // Let metadata know about our new size.
           $key = sprintf( 'resized-%dx%d', $width, $height );
           $meta['sizes'][$key] = $resized;
           $src = str_replace( basename( $src ), $resized['file'], $src );
           wp_update_attachment_metadata( $attachment_id, $meta );

           // Record in backup sizes so everything's cleaned up when attachment is deleted.
           $backup_sizes = get_post_meta( $attachment_id, '_wp_attachment_backup_sizes', true );
           if ( ! is_array( $backup_sizes ) ) $backup_sizes = array();
           $backup_sizes[$key] = $resized;
           update_post_meta( $attachment_id, '_wp_attachment_backup_sizes', $backup_sizes );
       }
   }
   return esc_url( $src );
}



function get_attachment_id_from_src ($image_src) {

    global $wpdb;
    $query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
    $id = $wpdb->get_var($query);
    return $id;

  }


/* function to encrypt inline email */

function hide_email($email)

{ $character_set = '+-.0123456789@ABCDEFGHIJKLMNOPQRSTUVWXYZ_abcdefghijklmnopqrstuvwxyz';

  $key = str_shuffle($character_set); $cipher_text = ''; $id = 'e'.rand(1,999999999);

  for ($i=0;$i<strlen($email);$i+=1) $cipher_text.= $key[strpos($character_set,$email[$i])];

  $script = 'var a="'.$key.'";var b=a.split("").sort().join("");var c="'.$cipher_text.'";var d="";';

  $script.= 'for(var e=0;e<c.length;e++)d+=b.charAt(a.indexOf(c.charAt(e)));';

  $script.= 'document.getElementById("'.$id.'").innerHTML="<a href=\\"mailto:"+d+"\\">"+d+"</a>"';

  $script = "eval(\"".str_replace(array("\\",'"'),array("\\\\",'\"'), $script)."\")"; 

  $script = '<script type="text/javascript">/*<![CDATA[*/'.$script.'/*]]>*/</script>';

  return '<span id="'.$id.'"></span>'.$script;

}

/* function to encrypt inline email displayed with an icon */

function hide_email_w_icon($email)

{ $character_set = '+-.0123456789@ABCDEFGHIJKLMNOPQRSTUVWXYZ_abcdefghijklmnopqrstuvwxyz';

  $key = str_shuffle($character_set); $cipher_text = ''; $id = 'e'.rand(1,999999999);

  for ($i=0;$i<strlen($email);$i+=1) $cipher_text.= $key[strpos($character_set,$email[$i])];

  $script = 'var a="'.$key.'";var b=a.split("").sort().join("");var c="'.$cipher_text.'";var d="";';

  $script.= 'for(var e=0;e<c.length;e++)d+=b.charAt(a.indexOf(c.charAt(e)));';

  $script.= 'document.getElementById("'.$id.'").innerHTML="<a href=\\"mailto:"+d+"\\" class=\\"social\\"><i class=\\"icon icon-envelope\\"></i></a>"';

  $script = "eval(\"".str_replace(array("\\",'"'),array("\\\\",'\"'), $script)."\")"; 

  $script = '<script type="text/javascript">/*<![CDATA[*/'.$script.'/*]]>*/</script>';

  return '<span id="'.$id.'"></span>'.$script;

}

class Excerpt {

  // Default length (by WordPress)
  public static $length = 55;

  // So you can call: my_excerpt('short');
  public static $types = array(
      'short' => 25,
      'regular' => 55,
      'long' => 100
    );

  /**
   * Sets the length for the excerpt,
   * then it adds the WP filter
   * And automatically calls the_excerpt();
   *
   * @param string $new_length 
   * @return void
   * @author Baylor Rae'
   */
  public static function length($new_length = 55) {
    Excerpt::$length = $new_length;

    add_filter('excerpt_length', 'Excerpt::new_length');

    Excerpt::output();
  }

  // Tells WP the new length
  public static function new_length() {
    if( isset(Excerpt::$types[Excerpt::$length]) )
      return Excerpt::$types[Excerpt::$length];
    else
      return Excerpt::$length;
  }

  // Echoes out the excerpt
  public static function output() {
    the_excerpt();
  }

}

// An alias to the class
function my_excerpt($length = 55) {
  Excerpt::length($length);
}


//Add uikit dropdown nav class 
function add_menu_parent_class( $items ) {
    global $wp_query;

    $post = $wp_query->get_queried_object();
    $parents = array();
    foreach ( $items as $item ) {

      /***** UIKIT ****/
      foreach ( $item->classes as $class ) {
        if($class=='menu-item-has-children'){
          $item->classes[] = 'uk-parent';
        }
      }

    }

    return $items;
}

//add some icon stuff
function icon($icon){
  return '<svg class="chicon">
            <use xlink:href="' .get_stylesheet_directory_uri() . '/images/icons.svg#chicon-'.$icon.'" />
          </svg>';
}

//Add uikit submenu class 
class Ui_Nav_Menu extends Walker_Nav_Menu {
  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"uk-nav-sub\">\n";
  }
}

//custom language menu with WPML: uncomment if necessary
// function icl_lang(){
//   $languages = icl_get_languages('skip_missing=0');
//   echo '<div id="lang_sel"><ul>';
//   foreach($languages as $l){
//     if($l['active']) {
//         echo '<li><a href="#" class="icl_lang_sel_current uk-button uk-button-round">'.$l['language_code'].'</a></li>';
        

//         foreach($languages as $l2){
//             if(!$l2['active']) echo '<li class="icl-'.$l2['language_code'].'"><a rel="alternate" hreflang="'.$l2['language_code'].'"  href="'.$l2['url'].'" class="icl_lang_sel_native  uk-button uk-button-round">'.$l2['language_code'].'</a></li>';
//         }
      
//     }
//   }
//   echo '</ul></div>';  
// }

?>
