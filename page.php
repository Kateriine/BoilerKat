<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 *
 * @package   WordPress
 * @subpackage  Adam
 * @since     Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="uk-container uk-container-center">
  <main>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <article class="uk-article">
      <header>
        <h1 class="uk-article-title"><?php the_title(); ?></h1>
      </header>
      <?php the_content(); ?>
    </article>
    <section>
      <?php comments_template( '', true ); ?>
    </section>
    <?php endwhile; ?>
  </main>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
