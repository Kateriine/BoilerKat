<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package   WordPress
 * @subpackage  Adam
 */
?>
<?php Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<main role="main">
  <header>
    <h1>Page not found</h1>
  </header>
  <?php get_search_form(); ?>
</main>

<?php Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
