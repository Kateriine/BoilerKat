<?php
/**
 * Template name: Events list
 */
?>
<?php Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="uk-container uk-container-center">
  <main role="main">
    <h1>Events</h1>
<?php


 $today = strtotime(date('Y-m-d', current_time('timestamp')));

$args = array(

  //Type & Status Parameters
  'post_type'   => 'event',
  'post_status' => array(
      'publish'
    ),
  'meta_query' => array(
      array(
        'key' => 'wpcf-end-date',
        'compare'=>'>=',
        'value' => $today,
        'type' => 'numeric',
      )
    ),
  'meta_key' => 'wpcf-start-date',
  'meta_key' => 'wpcf-end-date',
  'orderby' => 'meta_value_num',
  'order' => 'ASC'
);

$query = new WP_Query( $args );
if($query->have_posts()) { ?>

    <div class="uk-grid" data-uk-grid-margin>

    <?php  while ($query->have_posts()) {
      $query->the_post(); ?>
      <div class="uk-width-medium-1-3">
        <article class="uk-article">
          <h2 class="uk-article-title"><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
          <?php echo custom_date();?>
          <?php the_content(); ?>
        </article>
      </div>

    <?php } ?>
    </div>
    <?php }
    else { ?>
    <h1>No events to display</h1>
    <?php } ?>
  </main>
</div>
<?php Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>
