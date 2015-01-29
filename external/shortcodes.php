<?php
add_action( 'init', 'wpk_register_shortcodes');

    add_filter('wpv-extra-condition-filters', 'filter_shortcode');


/**************/
/* Shortcodes */
/**************/
function wpk_register_shortcodes(){
    add_shortcode('slug', 'wpv_post_slug');
    add_shortcode('url-pic-square', 'url_pic_square');
    add_shortcode('url-pic-rect', 'url_pic_rect');
    add_shortcode('url-pic-square-mini', 'url_pic_square_mini');
    add_shortcode('url-pic-head', 'url_pic_head');
    add_shortcode('post-intro-excerpt', 'post_intro_excerpt');
    add_shortcode('incrementor', 'incrementor');
    add_shortcode('site-url', 'site_url');      
    add_shortcode('img-alt', 'featImg_alt');      
    add_shortcode('hide-email', 'hide_email_shortcode');  
    add_shortcode('theme-url', 'get_template_directory_uri');
    //add_shortcode('wpv-pagination', 'wpv_pagenavi');
}
function hide_email_shortcode($atts){
    extract(
        shortcode_atts( array('email' => ''), $atts )
    );
    return hide_email($email);
}
function featImg_alt($id){
    global $post;
    global $WP_Views;
    $id = ($id) ? $id : $post->ID;
    $thumb_id = get_post_thumbnail_id($post->id);
    $alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
    if(count($alt)) echo $alt;
}

function  wpv_post_slug(){
    global $post;
    return $post->post_name;
}

/* Resized images shortcodes */

function url_pic_square($id) {
    global $post;
    $id = ($id) ? $id : $post->ID;

    if ( has_post_thumbnail($id)) {
        $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'square');
        return $image_url[0]; 
    }
}

function url_pic_rect($id) {
    global $post;
    $id = ($id) ? $id : $post->ID;

    if ( has_post_thumbnail($id)) {
        $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'rectangle');
        return $image_url[0]; 
    }
}

function url_pic_square_mini($id) {
    global $post;
    $id = ($id) ? $id : $post->ID;

    if ( has_post_thumbnail($id)) {
        $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'small-square');
        return $image_url[0]; 
    }
}

function url_pic_head($id) {
    global $post;
    $id = ($id) ? $id : $post->ID;

    if ( has_post_thumbnail($id)) {
        $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'header-image');
        return $image_url[0]; 
    }
}

// Get the page number into wp_pagenavi
// function pagenavi_paged($query) {
//     $paged = get_query_var('paged') ? get_query_var('paged') : 1;
//     $query->query_vars['paged'] = $paged;
//     return $query;
// }
// // Add a custom wp_pagenavi shortcode
// function wpv_pagenavi($args, $content) {
//     global $WP_Views;
//     wp_pagenavi( array('query' => $WP_Views->post_query) );
//}

/* To count posts in wp-views */
function incrementor() {
        static $i = 1;
        return $i ++;
    }

/* Add custom filters to wp-views */

function filter_shortcode($evaluate)
{
    global $post;
    global $WP_Views;

    $img = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'thumb');
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
        //    return '0<1';
        //}
        //else return '0>1';
       // break;

        default:
        return '0>1';
        break;
    }
} 

	?>
