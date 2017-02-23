<?php
/**
 * Add Custom Posts Types
 *
 * Additional custom taxonomies can be defined here
 * http://codex.wordpress.org/Function_Reference/register_post_type
 */


// Hooking up our function to theme setup
add_action( 'init', 'custom_post_type' );

// Creating a function to create our CPTs
function custom_post_type() {    //make tags hierarchical

// Set UI labels for Custom Post Type Events
  $labels = array(
    'name'                => __( 'Events', 'Post Type General Name', 'site' ),
    'singular_name'       => __( 'Event', 'Post Type Singular Name', 'site' ),
    'menu_name'           => __( 'Events', 'site' ),
    'parent_item_colon'   => __( 'Parent Event', 'site' ),
    'all_items'           => __( 'All Events', 'site' ),
    'view_item'           => __( 'See the Event', 'site' ),
    'add_new_item'        => __( 'Add a Event', 'site' ),
    'add_new'             => __( 'Add new', 'site' ),
    'edit_item'           => __( 'Edit', 'site' ),
    'update_item'         => __( 'Update', 'site' ),
    'search_items'        => __( 'Search', 'site' ),
    'not_found'           => __( 'Not found', 'site' ),
    'not_found_in_trash'  => __( 'Not found in trash', 'site' ),
  );

// Set other options for Custom Post Type
  $args = array(
    'label'               => __( 'events', 'site' ),
    'description'         => __( 'events', 'site' ),
    'labels'              => $labels,
    // Features this CPT supports in Post Editor
    'supports'            => array( 'title', 'editor', 'thumbnail' ),
    // You can associate this CPT with a taxonomy or custom taxonomy.
    'taxonomies' => array( ),
    /* A hierarchical CPT is like Pages and can have
    * Parent and child items. A non-hierarchical CPT
    * is like Posts.
    */
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_icon'           => 'dashicons-calendar-alt',
    'menu_position'       => 5,
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );

  register_post_type( 'event', $args );
}
?>
