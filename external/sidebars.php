<?php

add_action( 'widgets_init', 'add_sidebar' );
/******************/
/*    Sidebars    */
/******************/
function add_sidebar() {
    register_sidebar( array(
        'name'          => 'Main sidebar',
        'id'            => 'sidebar-1',
        'description'   => 'Appears in home sidebar of the site.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="aside-inner">',
        'after_widget'  => '</div></aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>'
    ) );
    register_sidebar( array(
        'name'          => 'Footer',
        'id'            => 'footer-widgets',
        'description'   => 'Footer of the site.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s uk-width-large-1-4"><div class="aside-inner">',
        'after_widget'  => '</div></aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>'
    ) );
}
?>