<?php

// tabindex when multiple forms on same page
add_filter( 'gform_tabindex', 'gform_tabindexer', 10, 2 );
function gform_tabindexer( $tab_index, $form = false ) {
  $starting_index = 1000; // if you need a higher tabindex, update this number
  if( $form )
    add_filter( 'gform_tabindex_' . $form['id'], 'gform_tabindexer' );
  return GFCommon::$tab_index >= $starting_index ? GFCommon::$tab_index : $starting_index;
}

//populate a value in an input

// add_filter('gform_field_value_rate_name', 'my_custom_population_function');
// function my_custom_population_function($value){
//   global $post;
//   global $WP_Views;
//   return $post->post_title;
// }

// //Fonction d'exemple pour "populate" des données dans un dropdown (par exemple)

// //add_filter( 'gform_pre_render_6', 'populate_rates' );

// //populate multiple values in a select input
// function populate_rates($form){
//   foreach($form['fields'] as $field){
//     if($field['id'] == 11){
//       $args=array(
//         'post_type'=>'price'
//         );
//       $query = new WP_Query($args);

//       $choices = array(array('text' => __('Select a rate', 'site'), 'value' => ' ', 'isSelected' => '', 'price' => ''));

//       if ( $query->have_posts() ):
//         while ( $query->have_posts() ) : $query->the_post();
//           $tit = str_replace(array('<sup>', '</sup>'), '', get_the_title( ));
//           $sel=false;
//           if ($_GET['rate-id'] == get_the_id()){
//             $sel = true;
//           }
//           $choices[] = array('text' =>  $tit, 'value' =>  get_the_id( ), 'isSelected' => $sel, 'price' => '');
//         endwhile;
//       endif;
//       wp_reset_postdata();
//       $field->choices = $choices;
//     }
//   }
//   return $form;
// }
?>
