<?php

function theme_setup() {
  register_nav_menu( 'primary', 'primary menu' );
  register_nav_menu( 'secondary', 'secondary menu' );

  load_theme_textdomain( 'site', get_template_directory() . '/languages' );

  add_theme_support('post-thumbnails');
  add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );

}
add_action( 'after_setup_theme', 'theme_setup' );
add_action( 'after_setup_theme', 'custom_image_setup' );



/******************/
/* Base functions */
/******************/

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
    add_image_size( 'square', 600, 600, true );
    add_image_size( 'rectangle', 640, 480, false );
    add_image_size( 'small-square', 200, 200, true );
    add_image_size( 'header-image', 2500, 400, true );
    add_filter( 'image_size_names_choose', 'insert_custom_image_sizes' );
}


function katFeatImg($w = 100, $h = 100, $quality = 100, $id = null, $size = null){
  global $post;
  global $WP_Views;
  global $_wp_additional_image_sizes;

  if(!$quality) $quality = 100;

  $id = ($id) ? $id : $post->ID;
  $thumb_id = get_post_thumbnail_id($post->id);
  $alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);

  $reqSize = 'full';
  if($size){
    $reqSize = $size;

  }
    $output=get_post_thumbnail_id($id) . $reqSize;

  if ( has_post_thumbnail($id)) {
      $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($id), $reqSize);
  }
  
  if($w != 0){
    $w = $w;
    $h = $h;

  }
  else{
    $w = $image_url[1];
    $h = $image_url[2];
  }

  $timthumb_script = get_template_directory_uri() . '/external/timthumb.php?src=';
  $timthumb_params = '&amp;q=' . $quality . '&amp;w=' . $w . '&amp;h=' . $h;

  $output = '<img title="'. $alt .'" src="'.$timthumb_script . $image_url[0] . $timthumb_params.'" alt="'.$alt.'"/>';

  return $output;
}

function greyscale($w = 100, $h = 100, $quality = 100, $size = null, $id = null){
  global $post;
  global $WP_Views;
  global $_wp_additional_image_sizes;


  if(!$quality) $quality = 100;

  $id = ($id) ? $id : $post->ID;
  $thumb_id = get_post_thumbnail_id($post->id);
  $alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);

  $reqSize = 'full';
  if($size){
    $reqSize = $size;

  }

  if ( has_post_thumbnail($id)) {
      $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($id), $reqSize);
  }
  
  if($w != 0){
    $w = $w;
    $h = $h;

  }
  else{
    $w = $image_url[1];
    $h = $image_url[2];
  }

  $timthumb_script = get_template_directory_uri() . '/external/timthumb.php?src=';
  $timthumb_params = '&amp;q=' . $quality . '&amp;w=' . $w . '&amp;h=' . $h .'&amp;f=2';

  $output = '<img title="'. $alt .'" src="'.$timthumb_script . $image_url[0] . $timthumb_params.'" alt="'.$alt.'"/>';

  return $output;
}

/* Custom field image with custom width and height

If you prefer to use it with a custom image size, just put ($field, 0,0,$quality, 'custom-size') */
function katCustomImg($field, $w, $h, $quality, $size){
  global $post;
  global $WP_Views;

  global $_wp_additional_image_sizes;

  if(!$quality) $quality = 100;

  $id = ($id) ? $id : $post->ID;

  $reqSize = 'full';
  if($size){
    $reqSize = $size;

  }

  
  $imgURL = types_render_field($field, array('output' => 'raw'));
  
  if($w != 0){
    $w = $w;
    $h = $h;

  }
  else{
    $w = $image_url[1];
    $h = $image_url[2];
  }

  
  $theID = get_attachment_id_from_src($imgURL);

  $alt_text = get_post_meta($theID, '_wp_attachment_image_alt', true);
 
  $timthumb_script = get_template_directory_uri() . '/external/timthumb.php?src=';
  $timthumb_params = '&amp;q=' . $quality . '&amp;w=' . $w . '&amp;h=' . $h;

  $output = '<img title="' . $alt_text . '" src="'.$timthumb_script . $imgURL. $timthumb_params.'" alt="' . $alt_text . '"/>';

  return $output;
}

function get_attachment_id_from_src ($image_src) {

    global $wpdb;
    $query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
    $id = $wpdb->get_var($query);
    return $id;

  }

    // excerpt

function post_intro_excerpt($atts){
    extract(
        shortcode_atts( array('length' => 0), $atts )
    );
    global $post;
    if(types_render_field('post-intro')!=''){
      $text = types_render_field('post-intro');
    }

    else{
      $text = get_the_content();
    }

    if ( '' != $text ) {
        $text = strip_shortcodes( $text );
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]>', $text);
        if ($length > 0) {
            $excerpt_length = $length;
        } else {
            $excerpt_length = apply_filters('excerpt_length', 10);
        }
        $all = strlen($text);

        $text = wp_strip_all_tags( $text, true );
        $text = mb_substr( $text, 0, $excerpt_length );
        // remove part of an entity at the end
        $text = preg_replace( '/&[^;\s]{0,6}$/', '', $text );
        
        if($all > $excerpt_length)
          $text .=  '...';
    }
    return apply_filters('the_excerpt', $text);
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



/* Add current menu item class to a post2post element in nav menu and its parent : please change post type */
function add_menu_parent_class( $items ) {
    // global $wp_query;

    // $post = $wp_query->get_queried_object();
    // // $sol_id = wpcf_pr_post_get_belongs(get_the_ID(), 'solution');

    // // $sol_data = get_post($sol_id, ARRAY_A);
    // // $sol_slug = $sol_data['post_name'];
    // $parents = array();
    // foreach ( $items as $item ) {
    //   //print_r($item);
    //   //echo $sol_id.'. ' .$item->post_excerpt .':'. $sol_slug.'<br/>';
    //   //if (!empty($sol_id)) {

    //   /***** UIKIT ****/
    //   foreach ( $item->classes as $class ) {
    //     if($class=='menu-item-has-children'){
    //       $item->classes[] = 'uk-parent';
    //     }
    //   }

    //     // if (strtolower($item->post_name) == $sol_slug) {
    //     //   $item->classes[] = 'current-menu-item';
    //     //   $itemParent = $item->menu_item_parent;
    //     // }
    //   //}
    // }

    // foreach ( $items as $item ) {
    //     if ( $item->ID ==  $itemParent ) {
    //         $item->classes[] = 'current-page-ancestor';
    //     }
    // }

    // return $items;
}


//add_filter('wp_nav_menu_objects', 'add_class_to_menu', 10, 2 );
add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );


function your_callback() {
    global $post;
// Code here
}
add_action( 'draft_to_publish', 'your_callback' );

?>
