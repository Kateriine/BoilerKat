<?php
remove_shortcode('gallery', 'gallery_shortcode');
add_action( 'init', 'register_shortcodes');

add_filter('wpv-extra-condition-filters', 'filter_shortcode');


/**************/
/* Shortcodes */
/**************/
function register_shortcodes(){
  //Resized images shortcodes example:
  // add_shortcode('url-pic-square', 'url_pic_square');
  // add_shortcode('gallery-video', 'gallery_video');

  add_shortcode('incrementor', 'incrementor');
  add_shortcode('site-url', 'site_url');
  add_shortcode('img-alt', 'featImg_alt');
  add_shortcode('gallery', 'gallery_img');
  add_shortcode('hide-email', 'hide_email_shortcode');
  add_shortcode('theme-url', 'get_template_directory_uri');
  add_shortcode('pic', 'pic' );
  //add_shortcode('icon', 'chicon');
  //add_shortcode('wpv-pagination', 'wpv_pagenavi');
}

//added some icon stuff for when xlink's gonna be supported everywhere
// function chicon($atts){
//   extract(
//     shortcode_atts( array('icon' => ''), $atts )
//   );
//   return '<svg class="chicon">
//             <use xlink:href="' .get_stylesheet_directory_uri() . '/images/icons.svg#chicon-'.$icon.'" />
//           </svg>';
// }

/**
* Image shortcode callback
* Enables the [pic] shortcode, pseudo-TimThumb but creates resized and cropped image files safely from existing media library entries. Usage:
* [pic src="http://example.org/wp-content/uploads/2012/03/image.png" width="100" height="100"]
*/
function pic($atts){
  extract( shortcode_atts( array(
   'src' => '',
   'width' => '',
   'height' => '',
  ), $atts ) );
  $id = $wpdb->get_var($wpdb->prepare("SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $src));
  $alt=get_post_meta($id , '_wp_attachment_image_alt', true);
  return '<img src="'.kat_img_resize( $src, $width, $height ).'" alt="'.$alt.'" />';
}



/* Resized images shortcodes example: */
// function url_pic_square($id) {
//   global $post;
//   $id = ($id) ? $id : $post->ID;

//   if ( has_post_thumbnail($id)) {
//     $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'square');
//     return $image_url[0];
//   }
// }

//Get alt attribute of featured image
function featImg_alt($id){
  global $post;
  global $WP_Views;
  $id = ($id) ? $id : $post->ID;
  $thumb_id = get_post_thumbnail_id($post->ID);
  $alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
  if(count($alt)) echo $alt;
}

function hide_email_shortcode($atts){
  extract(
    shortcode_atts( array('email' => ''), $atts )
  );
  return hide_email($email);
}

/* To count posts in wp-views */
function incrementor() {
  static $i = 1;
  return $i ++;
}

// Gallery shortcode

function gallery_img($attr) {
  global $post, $wp_locale;

  static $instance = 0;
  $instance++;

  if ( ! empty( $attr['ids'] ) ) {
    // 'ids' is explicitly ordered, unless you specify otherwise.
    if ( empty( $attr['orderby'] ) )
      $attr['orderby'] = 'post__in';
    $attr['include'] = $attr['ids'];
  }

  // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
  if ( isset( $attr['orderby'] ) ) {
    $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
    if ( !$attr['orderby'] )
      unset( $attr['orderby'] );
  }

  extract(shortcode_atts(array(
    'order'    => 'ASC',
    'orderby'  => 'menu_order ID',
    'id'     => $post->ID,
    'itemtag'  => 'dl',
    'icontag'  => 'dt',
    'captiontag' => 'dd',
    'columns'  => 3,
    'size'     => 'thumbnail',
    'include'  => '',
    'exclude'  => ''
  ), $attr));

  $id = intval($id);
  if ( 'RAND' == $order )
    $orderby = 'none';

  if ( !empty($include) ) {
    $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

    $attachments = array();
    foreach ( $_attachments as $key => $val ) {
      $attachments[$val->ID] = $_attachments[$key];
    }
  } elseif ( !empty($exclude) ) {
    $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
  } else {
    $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
  }

  if ( empty($attachments) )
    return '';


  $output= '<div class="gallery"><div class="uk-grid" data-uk-grid-margin>';


  $i = 0;
  foreach ( $attachments as $id => $attachment ) {

    $large = wp_get_attachment_image_src( $attachment->ID , 'large' );
    $th = do_shortcode('[pic src="'.$large[0].'" width="600" height="600" crop="true"]');
    $alt=get_post_meta($attachment->ID , '_wp_attachment_image_alt', true);
    $caption = $attachment->post_excerpt;
    $output .= '<div class="uk-width-small-1-2 uk-width-medium-1-'.$columns.'">';
    $output .= '<a href="';
    $output .= $large[0];
    $output .= '"  class="fancybox clearfix" title="'.$caption.'" data-fancybox-group="gallery"><img src="' . $th . '" alt="';
    $output.= $alt;
    $output.= '"></a></div>';
  }
  $output .= '</div></div>';
  return $output;
}

// function gallery_video($attr) {
//   global $post, $wp_locale;

//   $argsV = array( 'post_type' => 'attachment', 'numberposts' => -1, 'post_status' => null, 'post_mime_type'  => 'video/mp4', 'post_parent' => $post->ID, 'order' => 'ASC' );

//   $vids = get_posts($argsV);
//   $output= '<div class="gallery"><div class="uk-grid">';

//   if ($vids) {

//     foreach( $vids as $vid ) : setup_postdata($post);
//     $output.= '<div class="uk-width-medium-1-2">';
//     $output.= '<div class="video-wrapper ratio-16-9">';
//     $output.= '<div class="video-container">';
//     $output.= '<video id="example_video_' . $vid->ID . '" class="video-js vjs-default-skin" controls preload="none" poster="" data-setup="{}">';
//     $output.= '<source src="';
//     $output .= wp_get_attachment_url( $vid->ID );
//     $output.= '" type="video/mp4" />';
//     $output.= '</video></div></div></div>';
//     endforeach;
//   }
//   $output.= '</div></div><div class="clearfix"></div>';

//   return $output;
// }

/* Add custom filters to wp-views */
function filter_shortcode($evaluate)
{
  global $post;
  global $WP_Views;

  $img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumb');
  //examples:
  // $pageBtn = types_render_field("solution-button-text");
  // $startShow = types_render_field("show-start-date");
  // $endShow = types_render_field("show-end-date");

  switch ($evaluate){
    case 'featImg':
    if($img != '') return '0<1';
    else return '0>1';
    break;

    //case 'pageBtn':
    //if($pageBtn != '') return '0<1';
    //else return '0>1';
    //break;
//
    //case 'same-date':
    //if($startShow == $endShow || $endShow==''){
    //  return '0<1';
    //}
    //else return '0>1';
     // break;

    default:
    return '0>1';
    break;
  }
}


// // Add a custom wp_pagenavi shortcode
// function wpv_pagenavi($args, $content) {
//  global $WP_Views;
//  //print_r($WP_Views->post_query);
//  return wp_pagenavi( array('echo' => false, 'query' => $WP_Views->post_query));
// }

// add_filter('wpv_view_settings', 'ek_my_vs', 99, 2);

// function ek_my_vs($settings, $id) {
//   //if ( $id = 89 ) { // change XXX to the View ID being used in the page on the homepage
//     global $wp_query;
//     $my_query_vars = $wp_query->query_vars;
//     $paged = isset( $my_query_vars['page'] )  ? $my_query_vars['page'] : 1;
//     $settings['paged'] = $paged;
//   //}
//   return $settings;
// }


/// C'est nul

  ?>
