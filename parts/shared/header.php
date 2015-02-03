<header class="header">
    <div class="uk-container uk-container-center centered cont-nav">
	<div class="uk-navbar-brand"><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></div>
	<?php bloginfo( 'description' ); ?>
    <div class="uk-float-right">
        <button class="uk-button-offcanvas uk-visible-small" data-uk-offcanvas="{target:'#offcanvas-1'}">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <div id="offcanvas-1" class="uk-offcanvas">
            <nav class="uk-offcanvas-bar">
                <?php 
                wp_nav_menu(array('container' => '', 'theme_location' => 'primary',  'items_wrap'      => '<ul class="uk-nav uk-navbar uk-navbar-nav uk-nav-parent-icon uk-nav-offcanvas"  data-uk-nav="{multiple:true}">%3$s</ul>', 'walker' => new Ui_Nav_Menu())); 
               ?>
            </nav>
        </div>
    </div>

	    
</div>
	<?php //get_search_form(); ?>
</header>
