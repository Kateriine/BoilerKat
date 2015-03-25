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
