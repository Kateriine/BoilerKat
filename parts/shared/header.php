<header class="header">
  <div class="uk-container uk-container-center centered cont-nav">

    <div class="uk-navbar-brand">
      <a href="<?php echo home_url(); ?>">
        <img src="<?php echo get_stylesheet_directory_uri();?>/images/logo.svg" width="200" height="121" alt="<?php _e('Back to homepage', 'site');?>">
      </a>
    </div>

    <?php bloginfo( 'description' ); ?>
    <div class="uk-float-right">
       <button class="hamburger hamburger--elastic" type="button" aria-label="Menu" aria-controls="offcanvas-1" data-uk-offcanvas="{target:'#offcanvas-1'}">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </button>
      <div id="offcanvas-1" class="uk-offcanvas">
        <nav class="uk-offcanvas-bar">
          <?php
          wp_nav_menu(array('container' => '', 'theme_location' => 'primary',  'items_wrap'    => '<ul class="uk-nav uk-navbar uk-navbar-nav uk-nav-parent-icon uk-nav-offcanvas"  data-uk-nav="{multiple:true}">%3$s</ul>', 'walker' => new Ui_Nav_Menu()));
           ?>
        </nav>
      </div>
    </div>
  </div>
  <?php //get_search_form(); ?>
</header>
