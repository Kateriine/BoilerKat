<?php

function theme_setup() {
  register_nav_menu( 'primary', 'primary menu' );
  register_nav_menu( 'secondary', 'secondary menu' );

  load_theme_textdomain( 'site', get_template_directory() . '/languages' );

  add_theme_support('post-thumbnails');
  //add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );
  /*
  Sécurité:
   Activer les liens RSS automatiques (feed_links & feed_links_extra)
   */
  add_theme_support( 'automatic-feed-links' );
}
add_action( 'after_setup_theme', 'theme_setup' );
//add_action( 'after_setup_theme', 'custom_image_setup' );
add_action('admin_init', 'add_svg_upload');
add_action( 'init', 'disable_emojis' );
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

/**
 * Disable the emoji's
 */
function disable_emojis() {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );  
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );  
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}

function _remove_script_version( $src ){
$parts = explode( '?ver', $src );
return $parts[0];
}

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param    array  $plugins  
 * @return   array             Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}


function custom_date() {
  global $post;
  if($post->post_type=='event') {
    $metaStart = get_post_meta( $post->ID, 'wpcf-start-date', true);
    $metaStartDate = date_i18n('F j, Y', $metaStart );
    $metaEnd = get_post_meta( $post->ID, 'wpcf-end-date', true);
    $metaEndDate = date_i18n('F j, Y', $metaEnd);

    if($metaStart != $metaEnd) {
      if(date_i18n('F', $metaStart ) != date_i18n('F', $metaEnd )) {
        if(date_i18n('Y', $metaStart ) != date_i18n('Y', $metaEnd )) {
          $date_tag =  '<div class="uk-article-meta">From '.$metaStartDate.' to '.$metaEndDate.'</div>';
        }
        else {
          $date_tag =  '<div class="uk-article-meta">From '.date_i18n('F j', $metaStart ).' to '.$metaEndDate.'</div>';

        }
      }
      else {
      $date_tag =  '<div class="uk-article-meta">From '.date_i18n('F j', $metaStart ).' to '.$metaEndDate.'</div>';
      }
    }
    else {
    $date_tag =  '<div class="uk-article-meta">'.$metaStartDate.'</div>';
    }
  }
  elseif($post->post_type=='post') {
    $date_tag =  '<div class="uk-article-meta">'.get_the_date().'</div>';
  }
  else {
    $date_tag='';
  }
  return $date_tag;
}

/******************************************************/
/******************* Base functions *******************/
/******************************************************/

function print_p($arr) {
  echo '<pre>';
  print_r($arr);
  echo '</pre>';
}

/******************/
/* Custom login */
/******************/
function my_login_logo() {
 ?>

    <style type="text/css">
      body.login{background: #FFF;}
      .wp-core-ui .button-primary {
                background: #2E79B1;
                border:none;
                border-radius: 2px;
                height:40px;
                box-shadow: none;
                line-height:38px;
                -webkit-transition: background .2s ease-in;
                -moz-transition: background .2s ease-in;
                transition: background .2s ease-in;
                text-shadow: none;
            }
        .wp-core-ui .button-primary:hover, .wp-core-ui .button-primary:focus,
            #adminmenu li.menu-top:hover, #adminmenu li.opensub>a.menu-top, #adminmenu li>a.menu-top:focus {
              background-image: -webkit-linear-gradient(left, #2EA6B1 0%, #2E79B1 100%);
              background-image: -o-linear-gradient(left, #2EA6B1 0%, #2E79B1 100%);
              background-image: linear-gradient(to right, #2EA6B1 0%, #2E79B1 100%);
            }
        body.login div#login h1 a {
            background-image: url(<?php echo get_template_directory_uri(); ?>/images/logo.svg);
            background-size:contain;
            width: 100%;
        }
        .login #backtoblog, .login #nav{
          padding: 0;
          margin-top: 20px;
        }
        .login #nav {
          float: left;
          margin-right: 10px
        }
        #backtoblog {float: right;}
        a {
            color: #2E79B1;
            font-weight:bold
        }
        .login form .input, .login input[type=text] {
          height: 50px;
          -webkit-appearance: none;
        }

        input[type=text]:focus, input[type=search]:focus, input[type=radio]:focus, input[type=tel]:focus, input[type=time]:focus, input[type=url]:focus, input[type=week]:focus, input[type=password]:focus, input[type=checkbox]:focus, input[type=color]:focus, input[type=date]:focus, input[type=datetime]:focus, input[type=datetime-local]:focus, input[type=email]:focus, input[type=month]:focus, input[type=number]:focus, select:focus, textarea:focus,
        .login form .input:focus, .login form .input:-webkit-autofill, input:-webkit-autofill {
          border-color: #2E79B1;
          outline: 0;
          box-shadow:none;
          background: #E5F3F5;
          color: #444;
        }

        .login #backtoblog a:hover, .login #nav a:hover, .login h1 a:hover,
        .login #backtoblog a:focus, .login #nav a:focus, .login h1 a:focus  {
            color: #2E79B1;
        }

    </style>
<?php 
}
add_action( 'login_enqueue_scripts', 'my_login_logo' );

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


// Disable XML RPC
add_filter( 'xmlrpc_enabled', '__return_false' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );

/******************/
/* Image treatment */
/******************/

/* Change and add image sizes as desired :) */

// function custom_image_setup () {
//   //example:
//   // add_image_size( 'square', 600, 600, true );
//   // add_filter( 'image_size_names_choose', 'insert_custom_image_sizes' );
// }


// // Add new image sizes to menus in media library
// function insert_custom_image_sizes( $image_sizes ) {
//   // get the custom image sizes
//   global $_wp_additional_image_sizes;
//   // if there are none, just return the built-in sizes
//   if ( empty( $_wp_additional_image_sizes ) )
//   return $image_sizes;
//   // add all the custom sizes to the built-in sizes
//   foreach ( $_wp_additional_image_sizes as $id => $data ) {
//   // take the size ID (e.g., 'my-name'), replace hyphens with spaces,
//   // and capitalise the first letter of each word
//   if ( !isset($image_sizes[$id]) )
//     $image_sizes[$id] = ucfirst( str_replace( '-', ' ', $id ) );
//   }
//   return $image_sizes;
// }


function get_attachment_id_from_src ($image_src) {
  global $wpdb;
  $query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
  $id = $wpdb->get_var($query);
  return $id;

}

// Get And Cache Transient example
// function get_vimeo_thumb($id, $size = 'thumbnail_small')
// {
//   if(get_transient('vimeo_' . $size . '_' . $id))
//   {
//     $thumb_image = get_transient('vimeo_' . $size . '_' . $id);
//   }
//   else
//   {
//     $thumb_image = getVimeoVidThumbnailUrl($id);

//      set_transient('vimeo_' . $size . '_' . $id, $thumb_image, 2629743);
//   }
//   //return $thumb_image;
//   return crop_img($thumb_image, 265, 210);
  
// }

function crop_img($img, $w, $h) {
  $upload_dir = wp_upload_dir();
  $info = pathinfo($img);
  $fileN = $info['filename'];
  $base_dir = strtolower( $upload_dir['basedir'] );
  $saveUrl = $upload_dir['baseurl'] .'/cropped/'. $fileN . '_' . $w .'x'. $h . '.jpg';
  $savePath = $base_dir .'/cropped/'. $fileN . '_' . $w .'x'. $h . '.jpg';

  if(!is_dir($base_dir .'/cropped/')) {
    mkdir($base_dir .'/cropped/', 0755, true);
  }

  if(!file_exists($savePath)) {
    $imagine = new Imagine\Gd\Imagine();
    $point = new  Imagine\Image\Point($w/2,$h/2);
    $box    = new Imagine\Image\Box($w, $h);
    $imagine->open($img)
        ->crop($point, $box)
        ->save($savePath);
  }
  return  $saveUrl;
}

function resize_crop_img($img, $w, $h) {
  $upload_dir = wp_upload_dir();
  $info = pathinfo($img);
  $fileN = $info['filename'];
  $base_dir = strtolower( $upload_dir['basedir'] );

  $saveUrl = $upload_dir['baseurl'] .'/cropped-resized/'. $fileN . '_' . $w .'x'. $h . '.jpg';
  $savePath = $base_dir .'/cropped-resized/'. $fileN . '_' . $w .'x'. $h . '.jpg';

  if(!is_dir($base_dir .'/cropped-resized/')) {
    mkdir($base_dir .'/cropped-resized/', 0755, true);
  }

  if(!file_exists($savePath)) {
    $imagine = new Imagine\Gd\Imagine();
    //$point = new  Imagine\Image\Point($w/2,$h/2);
    $box    = new Imagine\Image\Box($w, $h);
    $mode    = Imagine\Image\ImageInterface::THUMBNAIL_OUTBOUND;
    $imagine->open($img)
        ->thumbnail($box, $mode)
        ->save($savePath);
  }
  return  $saveUrl;
}

function resize_img($img, $w, $h) {
  $upload_dir = wp_upload_dir();
  $info = pathinfo($img);
  $fileN = $info['filename'];
  $base_dir = strtolower( $upload_dir['basedir'] );

  //CALCULATE NEW SIZE TO CHECK IF FILE EXISTS
  list($originalWidth, $originalHeight) = getimagesize($img);
  $widthRatio = $w / $originalWidth;
  $heightRatio = $h / $originalHeight;
  $ratio = min($widthRatio, $heightRatio);
  $newWidth  = round((int)$originalWidth  * $ratio);
  $newHeight = round((int)$originalHeight * $ratio);
  $saveUrl = $upload_dir['baseurl'] .'/resized/'. $fileN . '_' . $newWidth .'x'. $newHeight . '.jpg';
  $savePath = $base_dir .'/resized/'. $fileN . '_' . $newWidth .'x'. $newHeight . '.jpg';

  if(!is_dir($base_dir .'/resized/')) {
    mkdir($base_dir .'/resized/', 0755, true);
  }

  if(!file_exists($savePath)) {
    $imagine = new Imagine\Gd\Imagine();
    $box    = new Imagine\Image\Box($w, $h);
    $mode    = Imagine\Image\ImageInterface::THUMBNAIL_INSET;


    $imagine->open($img)
        ->thumbnail($box, $mode)
        ->save($savePath);
  }
  return  $saveUrl;
}

// //add some icon stuff >> FOR CIRCA 2017 OR 2018
// function icon($icon){
//   return '<svg class="chicon">
//       <use xlink:href="' .get_stylesheet_directory_uri() . '/images/icons.svg#chicon-'.$icon.'" />
//       </svg>';
// }

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
    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' );
    $output .= "\n$indent<div class=\"uk-dropdown \"><ul class=\" uk-nav uk-nav-dropdown\">\n";
  }

  function end_lvl( &$output, $depth = 0, $args = array() ) {

     $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' );
    $output .= "\n$indent</ul></div>\n";
  }

  function start_el(  &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    global $wp_query;
    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

    // passed classes
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;

    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
    // build html
    if(in_array('menu-item-has-children', $classes)){
      $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $class_names . '" data-uk-dropdown>';
    }
    else{
       $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $class_names . '">';
    }

    // link attributes
    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )   ? ' target="' . esc_attr( $item->target   ) .'"' : '';
    $attributes .= ! empty( $item->xfn )    ? ' rel="'  . esc_attr( $item->xfn    ) .'"' : '';
    $attributes .= ! empty( $item->url )    ? ' href="'   . esc_attr( $item->url    ) .'"' : '';
    $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

    $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
      $args->before,
      $attributes,
      $args->link_before,
      apply_filters( 'the_title', $item->title, $item->ID ),
      $args->link_after,
      $args->after
    );

    // build html
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
}

/******************/
/* SVG UPLOAD ON WP */
/******************/

function add_svg_upload() {
  add_filter('upload_mimes', 'svg_upload_mimes');
  ob_start();

  add_action('shutdown', function() {
      $final = '';
      $ob_levels = count(ob_get_level());
      for ($i = 0; $i < $ob_levels; $i++) {
          $final .= ob_get_clean();
      }
      echo apply_filters('final_output', $final);
  }, 0);
  add_filter('final_output', function($content) {
    $content = str_replace('<# } else if ( \'image\' === data.type && data.sizes && data.sizes.full ) { #>',
        '<# } else if ( \'svg+xml\' === data.subtype ) { #>
        <img class="details-image" src="{{ data.url }}" draggable="false" />
        <# } else if ( \'image\' === data.type && data.sizes && data.sizes.full ) { #>',
        $content
    );
    $content = str_replace(
      '<# } else if ( \'image\' === data.type && data.sizes ) { #>',
        '<# } else if ( \'svg+xml\' === data.subtype ) { #>
        <div class="centered">
          <img src="{{ data.url }}" class="thumbnail" draggable="false" />
        </div>
      <# } else if ( \'image\' === data.type && data.sizes ) { #>',
        $content
    );
    return $content;
  });
}
function svg_upload_mimes($existing_mimes=array()){
  $existing_mimes['svg'] = 'image/svg+xml';
  return $existing_mimes;
}

function svgImg($size='full'){
  global $post;
  $id = $post->ID;

  if ( has_post_thumbnail($id)) {
      $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($id), $size);
      $imgURL = $image_url[0];

      $thumb_id = get_post_thumbnail_id($post->ID);
      $alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
      return '<img src="' . $imgURL . '" alt="'.$alt.'" class="style-svg">';
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
//   if($l['active']) {
//     echo '<li data-uk-dropdown="{mode:\'click\'}"><a href="#" class="icl_lang_sel_current">'.$l['language_code'].'</a><ul class="uk-dropdown">';

//     foreach($languages as $l2){
//       if(!$l2['active']) echo '<li class="icl-'.$l2['language_code'].'"><a rel="alternate" hreflang="'.$l2['language_code'].'"  href="'.$l2['url'].'" class="icl_lang_sel_native">'.$l2['language_code'].'</a></li>';
//     }
//     echo '</ul></li>';
//   }
//   }
//   echo '</ul>';
// }

/******************/
/* MAP */
/******************/
//Map (to use with pronamic plugin)
// function  custom_map(){
//   global $post;
//  if ( function_exists( 'pronamic_google_maps' ) ) {
//     pronamic_google_maps( array(
//       'width'  => '100%',
//       'height' => '100%',
//       'map_options' => array(
//       'scrollwheel' => false
//       ),
//       'marker_options' => array(
//         'icon' => get_stylesheet_directory_uri() . '/images/markerIcon.svg'
//       )
//     ) );
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
//   array(
//     'name' => 'post_to_page',
//     'from' => 'post',
//     'to' => 'page',
//     'sortable' => 'any',
//     'reciprocal' => 'true'
//   )
//   );
// }

?>
