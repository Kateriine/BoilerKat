<?php
/**
 * The front page template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file
 *
 * @package   WordPress
 * @subpackage  Adam
 */
?>
<?php Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<?php echo display_social_share();?>
<?php echo display_map();?>
<div class="uk-container uk-container-center">
  <div class="uk-grid">
    <div class="uk-width-medium-2-3">
      <main>
        <?php if ( have_posts() ): ?>
          <?php while ( have_posts() ) : the_post(); ?>

            <?php the_content(); ?>
          <?php endwhile; ?>
        <?php endif; ?>
        <div class="flex-video widescreen">
          <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="100%" height="100%" poster="http://video-js.zencoder.com/oceans-clip.png" data-setup="{}">
            <source src="http://video-js.zencoder.com/oceans-clip.mp4" type='video/mp4' />
            <source src="http://video-js.zencoder.com/oceans-clip.webm" type='video/webm' />
            <source src="http://video-js.zencoder.com/oceans-clip.ogv" type='video/ogg' />
            <track kind="captions" src="demo.captions.vtt" srclang="en" label="English"></track><!-- Tracks need an ending tag thanks to IE9 -->
            <track kind="subtitles" src="demo.captions.vtt" srclang="en" label="English"></track><!-- Tracks need an ending tag thanks to IE9 -->
            <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
          </video>
        </div>
      </main>
    </div>
    <div class="uk-width-medium-1-3 sidebar">
      <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div>
  </div>
</div>
<?php Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>
