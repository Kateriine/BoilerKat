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


// $today = strtotime(date('Y-m-d', current_time('timestamp')));
$today = current_time('Ymd');
$args = array(

  //Type & Status Parameters
  'post_type'   => 'event',
  'post_status' => array(
      'publish'
    ),
  'meta_query' => array(
      array(
        'key' => 'end-date',
        'compare'=>'>=',
        'value' => $today,
        'type' => 'numeric',
      )
    ),
  'meta_key' => 'start-date',
  'meta_key' => 'end-date',
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
          <div class="uk-article-meta">
            <?php echo custom_date();?>
          </div>
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
