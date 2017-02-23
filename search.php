<?php
/**
 * Search results page
 *
 * @package   WordPress
 * @subpackage  Adam
 */
?>
<?php Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="uk-container uk-container-center">
  <main>
    <?php if ( have_posts() ): ?>
    <h1>Search Results for '<?php echo get_search_query(); ?>'</h1>
    <div class="uk-grid" data-uk-grid-match data-uk-grid-margin>

    <?php while ( have_posts() ) : the_post(); ?>
      <div class="uk-width-medium-1-3">
        <article class="uk-article">
          <header>
            <h2 class="uk-article-title"><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>      
            <div class="uk-article-meta">
              <?php echo custom_date();?>
            </div>
          </header>   
          <?php the_content(); ?>
        </article>
      </div>
    <?php endwhile; ?>
    </div>
    <?php else: ?>
    <h1>No results found for '<?php echo get_search_query(); ?>'</h1>
    <?php endif; ?>
  </main>
</div>
<?php Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
