<?php
/**
 * The Template for displaying all single posts
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package     WordPress
 * @subpackage  Starkers
 * @since       Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="uk-container uk-container-center margin-bottom-desktop">
<main role="main">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <article class="uk-article">
        <header class="uk-article-title">
           <h1><?php the_title(); ?></h1>
        </header>
         <div class="uk-article-meta">
            <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>
        </div>
        <?php the_content(); ?>         
        <footer>
            <?php if ( get_the_author_meta( 'description' ) ) : ?>
            <?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
            <h3>About <?php echo get_the_author() ; ?></h3>
            <?php the_author_meta( 'description' ); ?>
            <?php endif; ?>
        </footer>
    </article>
    <section>
    <?php comments_template( '', true ); ?>
    </section>
    <?php endwhile; ?>
</main>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>