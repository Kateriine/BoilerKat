<?php
/**
 * Search results page
 * 
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package     WordPress
 * @subpackage  Starkers
 * @since       Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="uk-container uk-container-center">
    <?php if ( have_posts() ): ?>
    <h1>Search Results for '<?php echo get_search_query(); ?>'</h1> 
    <div class="uk-grid" data-uk-grid-margin>

    <?php while ( have_posts() ) : the_post(); ?>
        <div class="uk-width-medium-1-3">
            <article class="uk-article">
                <header>
                     <h2 class="uk-article-title"><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                </header>
                <div class="uk-article-meta">
                 <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>
                <?php the_content(); ?>
                </div>
            </article>
        </div>
    <?php endwhile; ?>
    </div>
    <?php else: ?>
    <h1>No results found for '<?php echo get_search_query(); ?>'</h1>
    <?php endif; ?>
</main>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>