<?php
/**
 * The Template for displaying all single posts
 *
 * @package   WordPress
 * @subpackage  Adam
 */
?>
<?php Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="uk-container uk-container-center margin-bottom-desktop">
  <main>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <article class="uk-article uk-article-divider">
      <header class="uk-article-title">
         <h1><?php the_title(); ?></h1>
      </header>
       <?php echo custom_date();?>
      <?php the_content(); ?>
      <footer>
        <?php if ( get_the_author_meta( 'description' ) ) : ?>
        <?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
        <h3>About <?php echo get_the_author() ; ?></h3>
        <?php the_author_meta( 'description' ); ?>
        <?php endif; ?>
      </footer>
    </article>
    <section class="uk-comment">
    <?php comments_template( '', true ); ?>
    </section>
    <?php endwhile; ?>
  </main>
</div>
<?php Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
