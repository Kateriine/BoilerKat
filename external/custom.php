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



/******************************************************/
/******************* Base functions *******************/
/******************************************************/

/******************/
/* RSS */
/******************/

/*
 Deactivate secondary RSS (comments, etc)
 */
remove_action('wp_head', 'feed_links_extra', 3);

/*
 Deactivate Articles RSS and comments RSS (comments, etc)
 */
remove_action('wp_head', 'feed_links', 2);


/*
 Reactivate main RSS
 * © Daniel Roch
 */
function kat_feed_link( $args = array() ) {
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
add_action('wp_head', 'kat_feed_link');


/******************/
/* Image treatment */
/******************/

/* Change and add image sizes as desired :) */

function custom_image_setup () {
  //example:
    // add_image_size( 'square', 600, 600, true );
    // add_filter( 'image_size_names_choose', 'insert_custom_image_sizes' );
}


// Add new image sizes to menus in media library
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


function get_attachment_id_from_src ($image_src) {
    global $wpdb;
    $query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
    $id = $wpdb->get_var($query);
    return $id;

}

//creates resized and cropped image files safely from existing media library entries. 
function kat_img_resize( $src, $width, $height ) {


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

//add some icon stuff
function icon($icon){
  return '<svg class="chicon">
            <use xlink:href="' .get_stylesheet_directory_uri() . '/images/icons.svg#chicon-'.$icon.'" />
          </svg>';
}

/******************/
/* Email treatment */
/******************/
/* function to encrypt inline email */

function hide_email($email) { 
  $character_set = '+-.0123456789@ABCDEFGHIJKLMNOPQRSTUVWXYZ_abcdefghijklmnopqrstuvwxyz';
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

function hide_email_w_icon($email) { 
  $character_set = '+-.0123456789@ABCDEFGHIJKLMNOPQRSTUVWXYZ_abcdefghijklmnopqrstuvwxyz';
  $key = str_shuffle($character_set); $cipher_text = ''; $id = 'e'.rand(1,999999999);

  for ($i=0;$i<strlen($email);$i+=1) $cipher_text.= $key[strpos($character_set,$email[$i])];

  $script = 'var a="'.$key.'";var b=a.split("").sort().join("");var c="'.$cipher_text.'";var d="";';
  $script.= 'for(var e=0;e<c.length;e++)d+=b.charAt(a.indexOf(c.charAt(e)));';
  $script.= 'document.getElementById("'.$id.'").innerHTML="<a href=\\"mailto:"+d+"\\" class=\\"social\\"><i class=\\"icon icon-envelope\\"></i></a>"';
  $script = "eval(\"".str_replace(array("\\",'"'),array("\\\\",'\"'), $script)."\")"; 
  $script = '<script type="text/javascript">/*<![CDATA[*/'.$script.'/*]]>*/</script>';

  return '<span id="'.$id.'"></span>'.$script;

}

/******************/
/* UIKIT adaptations */
/******************/
//Add uikit submenu class 
class Ui_Nav_Menu extends Walker_Nav_Menu {
  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"uk-nav-sub\">\n";
  }
}

/******************/
/* Multilanguage */
/******************/
//custom language menu with WPML plugin: uncomment if necessary

// function icl_lang(){
//   $languages = icl_get_languages('skip_missing=0');
//   echo '<ul id="lang_custom">';
//   foreach($languages as $l){
//     if($l['active']) {
//         echo '<li data-uk-dropdown="{mode:\'click\'}"><a href="#" class="icl_lang_sel_current">'.$l['language_code'].'</a><ul class="uk-dropdown">';

//         foreach($languages as $l2){
//             if(!$l2['active']) echo '<li class="icl-'.$l2['language_code'].'"><a rel="alternate" hreflang="'.$l2['language_code'].'"  href="'.$l2['url'].'" class="icl_lang_sel_native">'.$l2['language_code'].'</a></li>';
//         }
//       echo '</ul></li>';
//     }
//   }
//   echo '</ul>';  
// }

/******************/
/* MAP */
/******************/
//Map (to use with pronamic plugin)
// function  custom_map(){
//   global $post;
//    if ( function_exists( 'pronamic_google_maps' ) ) {
//       pronamic_google_maps( array(
//           'width'  => '100%',
//           'height' => '100%',
//           'map_options' => array(
//             'scrollwheel' => false
//           ),
//           'marker_options' => array(
//                 'icon' => get_stylesheet_directory_uri() . '/images/markerIcon.svg'
//             ) 
//       ) );
//   }
// }

/******************/
/* Post2Post */
/******************/
// post 2 post connection example
// add_action('init', 'connectPosts');
// function connectPosts(){
//   /* Fields for homepage only*/
//   p2p_register_connection_type( 
//     array(
//       'name' => 'post_to_page',
//       'from' => 'post',      
//       'to' => 'page',
//       'sortable' => 'any',
//       'reciprocal' => 'true'
//     ) 
//   );
// }

?>
