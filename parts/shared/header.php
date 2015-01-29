<header class="header">
    <div class="uk-container uk-container-center centered cont-nav">
	<div class="uk-navbar-brand"><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></div>
	<?php bloginfo( 'description' ); ?>
    <div class="uk-float-right">
        <button class="uk-button-offcanvas uk-hidden-large" data-uk-offcanvas="{target:'#offcanvas-1'}">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <div id="offcanvas-1" class="uk-offcanvas">
            <nav class="uk-offcanvas-bar">
                <?php 
                wp_nav_menu(array('container' => '', 'theme_location' => 'primary',  'items_wrap'      => '<ul class="uk-navbar uk-navbar-nav uk-nav-offcanvas">%3$s</ul>')); 
               ?>
            </nav>
        </div>
    </div>
	<!-- <nav class="uk-navbar">


        <?php 
        wp_nav_menu(array('container' => '', 'theme_location' => 'primary',  'items_wrap'      => '<ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon"  data-uk-nav="{multiple:true}">%3$s</ul>')); 
?>
    </nav> -->

	    
</div>
	<?php //get_search_form(); ?>
</header>
