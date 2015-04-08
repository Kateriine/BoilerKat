<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file 
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
    <div class="uk-grid">
        <div class="uk-width-medium-2-3">
            <main role="main">
                <?php if ( have_posts() ): ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        
                        <?php the_content(); ?>
                    <?php endwhile; ?>
                <?php endif; ?>
               
            </main>
        </div>
        <div class="uk-width-medium-1-3 sidebar">
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
        </div>
    </div>
</div>


<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>