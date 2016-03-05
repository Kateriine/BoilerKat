<footer class="footer">
  <div class="uk-container uk-container-center">
    <div class="uk-grid no-p" data-uk-grid-match>
      <?php dynamic_sidebar( 'footer-widgets' ); ?>
    </div>
    <div class="footer-bottom">
      <div class="credits">
      &copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.
      </div>
      <?php wp_nav_menu( array( 'theme_location' => 'secondary', 'before'   => ' | ', 'container' => FALSE ) ); ?>
      <div class="footer-logo"><a href="<?php echo site_url();?>"></a></div>
    </div>
  </div>
</footer>
