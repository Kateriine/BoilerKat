<?php
/**
 * Template name: Page with rows
 */
?>
<?php Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
  <main>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <article class="uk-article">
      <div class="uk-container uk-container-center">
        <header>
          <h1 class="uk-article-title"><?php the_title(); ?></h1>
        </header>
      </div>
      <?php //the_content(); ?>
      <?php

      // check if the flexible content field has rows of data
      if( have_rows('block_elements') ):
      // loop through the rows of data
        while ( have_rows('block_elements') ) : the_row();

          // print_r(get_field('flexible_content_field_name'));

          echo get_text_block();
          echo get_text_block_w_img();          
          echo get_widget_block();
          echo get_gallery_block();
          echo get_multiple_text_blocks();
          echo get_related_posts();
          echo get_slider();
          

        endwhile;

      endif; 
        ?>
    </article>
    <section>
      <?php comments_template( '', true ); ?>
    </section>
    <?php endwhile; ?>
  </main>
<?php Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
