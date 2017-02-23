<?php add_action( 'admin_enqueue_scripts', 'acf_admin' ); 

function acf_admin($hook) {

    wp_enqueue_script( 'acf_script', get_stylesheet_directory_uri() . '/js/acf-admin-script.js' );
}

/* Base functions */

function get_anim($anim_field='', $parallax='', $target = '') {
	$textAnim = $groupOptions = '\'';

	if($anim_field != '') {
		if($target != '') {
			$groupOptions =  ' uk-invisible\', target:\''.$target.'\', delay:300';

		}	

		if($parallax && $parallax != '') {
			switch ($anim_field) {
				case 'opacity':
					$textAnim = ' data-uk-parallax="{opacity: \'0,1\', viewport: \'0.5\'}"';
					break;
				case 'scale':
					$textAnim = ' data-uk-parallax="{opacity: \'0,1\',scale: \'0,1\', viewport: \'0.5\'}"';
					break;
				case 'bottom':
					$textAnim = ' data-uk-parallax="{opacity: \'0,1\',y: \'100,0\', viewport: \'0.5\'}"';
					break;
				case 'top':
					$textAnim = ' data-uk-parallax="{opacity: \'0,1\',y: \'-100,0\', viewport: \'0.5\'}"';
					break;
				case 'left':
					$textAnim = ' data-uk-parallax="{opacity: \'0,1\',x: \'-100,0\', viewport: \'0.5\'}"';
					break;
				case 'right':
					$textAnim = ' data-uk-parallax="{opacity: \'0,1\',x: \'100,0\', viewport: \'0.5\'}"';
					break;
				default:
					$textAnim = '';
			}
		}
		else {
			switch ($anim_field) {
				case 'opacity':
					$textAnim = ' data-uk-scrollspy="{cls:\'uk-animation-fade'.$groupOptions.'}"';
					break;
				case 'scale':
					$textAnim = ' data-uk-scrollspy="{cls:\'uk-animation-scale-up'.$groupOptions.'}"';
					break;
				case 'bottom':
					$textAnim = ' data-uk-scrollspy="{cls:\'uk-animation-slide-bottom'.$groupOptions.'}"';
					break;
				case 'top':
					$textAnim = ' data-uk-scrollspy="{cls:\'uk-animation-slide-top'.$groupOptions.'}"';
					break;
				case 'left':
					$textAnim = ' data-uk-scrollspy="{cls:\'uk-animation-slide-left'.$groupOptions.'}"';
					break;
				case 'right':
					$textAnim = ' data-uk-scrollspy="{cls:\'uk-animation-slide-right'.$groupOptions.'}"';
					break;
				default:
					$textAnim = '';
			}				
		}
	}
	return $textAnim;
}
function getBgImg($bg_field = '') {
	$bgImage = '';
	if($bg_field != '') {
		$bgImage = ' style="background-image:url('.$bg_field.'); background-position: center; background-size:cover;"';
	}
	return $bgImage;
}

function getBgClass($bg_color = '') {
	$bgClass = '';
	if($bg_color != '') {
		$bgClass = ' acf-bg-'.get_sub_field('background_color');
	}
	return $bgClass;
}

function getTextClass($text_color = '') {
	$textClass = '';
	if($text_color != '') {
		$textClass = ' acf-text-'.get_sub_field('text_color');
	}
	return $textClass;
}

/* Render functions */

function get_text_block() {
	global $post;

	if( get_row_layout() == 'simple_text_block' ): 
		$bgImage = '';
		$bgpar = '';
		$contClass = '';
		$contInnerClass = '';
		$spacingClass = ' ' . get_sub_field('spacing');
		$parallax = get_sub_field('parallax');
		$cols = get_sub_field('text_layout');

		$bgImage = getBgImg(get_sub_field('background_image'));
		$bgClass = getBgClass(get_sub_field('background_color'));
		$textClass = getTextClass(get_sub_field('text_color'));		
		$textAnim = get_anim(get_sub_field('text_animation'), $parallax);		
	
		if($parallax) {
			$bgpar = ' data-uk-parallax="{bg: \'-200\'}"';
			$bgClass .= ' parallax-container';
		}
		if($cols==1) {
			$contClass=" uk-container-small";
		}
		else {
			$contInnerClass=" uk-column-medium-1-2";			
		}

		$html = '<section class="' . $bgClass . $spacingClass . $textClass . '"'.$bgImage.$bgpar.'>';
		$html .= '<div'.$textAnim.'>';
		$html .= '<div class="uk-container uk-container-center'.$contClass.'">';
		if(get_sub_field('title') != '')
			$html .= '<h2 class="uk-text-center">'.get_sub_field('title').'</h2>';
		$html .= '<div class="'.$contInnerClass.'">';
		$html .= get_sub_field('text');
		$html .= '</div>';
		$html .= '</div>';
		if($parallax) {
			$html .= '</div>';
		}
		$html .= '</section>';

		return $html;

    endif;
}


function get_text_block_w_img(){
	global $post;

	if( get_row_layout() == 'text_w_img' ): 
		$spacingClass = ' ' . get_sub_field('spacing');
		$bgClass = getBgClass(get_sub_field('background_color'));
		$textClass = getTextClass(get_sub_field('text_color'));	
		if(get_sub_field('animation')=='outside') {
			$firstBlockAnim = ' data-uk-scrollspy="{cls:\'uk-animation-slide-left\'}"';
			$scndBlockAnim = ' data-uk-scrollspy="{cls:\'uk-animation-slide-right\'}"';
		}
		else {
			$leftAnim = '';
			$rightAnim = '';
			$textAnim = get_anim(get_sub_field('animation'));
		}


		$image = get_sub_field('image');
		$imgPos = get_sub_field('image_position');
		if($imgPos == 'right') {
			$imgContClass=" uk-push-1-2";
			$textContClass = " uk-pull-1-2";
			if(get_sub_field('animation')=='outside') {
				$firstBlockAnim = ' data-uk-scrollspy="{cls:\'uk-animation-slide-right\'}"';
				$scndBlockAnim = ' data-uk-scrollspy="{cls:\'uk-animation-slide-left\'}"';
			}
		}
		else {
			$imgContClass="";
			$textContClass="";
		}

		$html = '<section class="' . $bgClass . $spacingClass . $textClass . '">';
		
		$html .= '<div'.$textAnim.'>';
		
		$html .= '<div class="uk-container uk-container-center">';
		if(get_sub_field('title') != '')
			$html .= '<h2 class="uk-text-center">'.get_sub_field('title').'</h2>';
	 	$html .=  '<div class="uk-grid uk-grid-match" data-uk-grid-match data-uk-grid-margin>';
		$html .= '<div class="uk-width-medium-1-2'.$imgContClass.'"'.$firstBlockAnim.'><div>';
		$html .= '<img src="'.$image['sizes']['medium_large'].'" alt="'.$image['alt'].'" width="'.$image['sizes']['medium_large-width'].'" height="'.$image['sizes']['medium_large-width'].'" />';
		$html .= '</div></div>';
		$html .= '<div class="uk-width-medium-1-2'.$textContClass.'"'.$scndBlockAnim.'>';
		$html .= get_sub_field('text');
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</section>';

		return $html;

    endif;
}
// function get_sidebar_block() {
// 	 if( get_row_layout() == 'horizontal_sidebar' ):
// 	 	$sidebar = get_sub_field('sidebar');
// 	 	return $sidebar;
// 	 endif;
// }

function get_widget_block() {
	global $post;
	if( get_row_layout() == 'widget_row' ):
	 	$html = '';
	 	$widgets = get_sub_field('widget_area');
		$nbCols = get_sub_field('number_of_columns');

		$spacingClass = ' ' . get_sub_field('spacing');
		$bgClass = getBgClass(get_sub_field('background_color'));
		$textClass = getTextClass(get_sub_field('text_color'));	

		$startAnimClass = '';
		$textAnim = get_anim(get_sub_field('animation'), '', '.uk-width-large-1-'.$nbCols);
		if(get_sub_field('animation') != 'default') {
			$startAnimClass=" uk-invisible";
		}

		if ($nbCols > 2) {
			$nbColsMed = 2;
		}
		else $nbColsMed = $nbCols;
	 	if( have_rows('widget_area') ):
			$html = '<section class="' . $bgClass . $spacingClass . $textClass . '">';
			$html .= '<div class="uk-container uk-container-center">';

	 		$html .=  '<div class="uk-grid uk-grid-match" data-uk-grid-match data-uk-grid-margin'.$textAnim.'>';
	 		$i = 0;
	 		$totalWidgets = count($widgets['rows']);

	 		

	 		while ( have_rows('widget_area') ) : the_row();
	 			$html .= '<div class="uk-width-medium-1-'.$nbColsMed.' uk-width-large-1-'.$nbCols.$startAnimClass.'">';

		 		 $widgetField = $widgets['rows'][$i]['the_widget'];
		 		 $html .= get_widget_field($widgetField);
		 		 $html .= '</div>';
				 $i++;
		 	endwhile;
		 	$html .= '</div>';
		 	$html .= '</div>';
			$html .= '</section>';
	 	endif;	
	 	return $html; 	
	endif;
}

function get_widget_field($field_value, $instance_args = array()){
	if ( empty( $field_value ) || !isset( $field_value['instance'] ) || !isset( $field_value['the_widget'] ) || empty($field_value['the_widget']) ) {
		return;
	}
	
	$acf_widget_id = $field_value['widget_id'];
	$instance = $field_value['instance'];
	$instance = array_merge($instance, $instance_args);
	
	$widget = $field_value['the_widget'];
	ob_start();
	the_widget( $widget, $instance, array( 'widget_id' => $acf_widget_id, 'before_title'  => '<h3 class="widget-title">',
			    'after_title'   => '</h3>' ) );
	$output = ob_get_contents();
    ob_end_clean();
    return $output;
}

function get_gallery_block() {
	global $post;
	if( get_row_layout() == 'gallery' ):
		$html = '';
		$t = get_sub_field('title');
		$images = get_sub_field('gallery');
		$nbCols = get_sub_field('number_of_columns');
		$spacingClass = ' ' . get_sub_field('spacing');
		$bgClass = getBgClass(get_sub_field('background_color'));
		$textClass = getTextClass(get_sub_field('text_color'));	

		$startAnimClass = '';
		$textAnim = get_anim(get_sub_field('animation'), '', '.uk-width-large-1-'.$nbCols);
		
		if(get_sub_field('animation') != 'default') {
			$startAnimClass=" uk-invisible";
		}

		if ($nbCols > 3) {
			$nbColsMed = floor($nbCols/2);
		}
		else $nbColsMed = $nbCols;

		if ($nbCols > 1) {
			$nbColsSmall = 2;
		}
		else 
			$nbColsSmall = $nbCols;

		$html = '<section class="' . $bgClass . $spacingClass . $textClass . '">';
		$html .= '<div class="uk-container uk-container-center">';

		$html .= '<h2>'.$t.'</h2>';
		if( $images ):
			$html .=  '<div class="uk-grid uk-grid-match" data-uk-grid-match data-uk-grid-margin'.$textAnim.'>';
			foreach( $images as $image ):
				$url = $image['url'];
	 			$html .= '<div class="uk-width-small-1-'.$nbColsSmall.' uk-width-medium-1-'.$nbColsMed.' uk-width-large-1-'.$nbCols.$startAnimClass.'">';
				$html .= '<a href="' .$image['url'] .'" class="fancybox"  data-fancybox-group="gallery" data-fancybox-title="<h3>'.$image['title'].'</h3>'.$image['caption'].'">';
	 				$html .= '<img src="'. resize_crop_img($url, 600, 600, true). '" width="600" height="600" alt="'.$image['alt'].'">';
				$html .= '</a>';
	 			$html .= '</div>';
			endforeach;
			$html .= '</div>';
		endif;
		$html .= '</div>';
		$html .= '</section>';
		return $html;
	endif;
}

function get_multiple_text_blocks() {
	global $post;
	if( get_row_layout() == 'text_image_up' ):
		$html = '';
		$nbCols = get_sub_field('number_of_columns');
		$spacingClass = ' ' . get_sub_field('spacing');
		$bgClass = getBgClass(get_sub_field('background_color'));
		$textClass = getTextClass(get_sub_field('text_color'));	
		if ($nbCols > 2) {
			$nbColsMed = floor($nbCols/2);
		}
		else $nbColsMed = $nbCols;

		$startAnimClass = '';
		$textAnim = get_anim(get_sub_field('animation'), '', '.uk-width-large-1-'.$nbCols);
		if(get_sub_field('animation') != 'default') {
			$startAnimClass=" uk-invisible";
		}

		$html = '<section class="' . $bgClass . $spacingClass . $textClass . '">';
		$html .= '<div class="uk-container uk-container-center">';

	 	if( have_rows('box_texts') ):
			$html .=  '<div class="uk-grid uk-grid-match" data-uk-grid-match data-uk-grid-margin'.$textAnim.'>';
			while( have_rows('box_texts') ): the_row(); 
				$t = get_sub_field('text');
				$image = get_sub_field('image');
				$btnText = get_sub_field('button_text');
				$btnLink = get_sub_field('button_text');
	 			$html .= '<div class="uk-width-medium-1-'.$nbColsMed.' uk-width-large-1-'.$nbCols.$startAnimClass.'">';
	 			if($image)
	 				$html .= '<div class="uk-margin-bottom"><img src="'. resize_crop_img($image['url'], 600, 600). '" width="600" height="600" alt="'.$image['alt'].'"></div>';
				$html .= '<div class="">'. $t . '</div>';
				if($btnText != '' && $btnLink != '') {
					$html .= '<div class="button-place uk-text-center">';
					$html .= '<a href="'.$btnLink.'" class="uk-button uk-button-primary">'.$btnText.'</a>';	
					$html .= '</div>';				
				}
	 			$html .= '</div>';
			endwhile;
			$html .= '</div>';
		endif;

		$html .= '</div>';
		$html .= '</section>';

		return $html;
	endif;
}

function get_related_posts() {
	global $post;
	if( get_row_layout() == 'related_posts_row' ):
		$html = '';
		$spacingClass = ' ' . get_sub_field('spacing');
		$bgClass = getBgClass(get_sub_field('background_color'));
		$textClass = getTextClass(get_sub_field('text_color'));	
		$nbCols = get_sub_field('number_of_columns');
		if ($nbCols > 2) {
			$nbColsMed = floor($nbCols/2);
		}
		else $nbColsMed = $nbCols;

		$startAnimClass = '';
		$textAnim = get_anim(get_sub_field('animation'), '', '.uk-width-large-1-'.$nbCols);
		if(get_sub_field('animation') != 'default') {
			$startAnimClass=" uk-invisible";
		}
		
		$html = '<section class="' . $bgClass . $spacingClass . $textClass . '">';
		$html .= '<div class="uk-container uk-container-center">';
	 	if( have_rows('related_posts') ):
	 		$html .=  '<div class="uk-grid uk-grid-match" data-uk-grid-match data-uk-grid-margin'.$textAnim.'>';
			while( have_rows('related_posts') ): the_row(); 
	 			$html .= '<div class="uk-width-medium-1-'.$nbColsMed.' uk-width-large-1-'.$nbCols.$startAnimClass.'">';
				$post_object = get_sub_field('related_post');	
				$post = $post_object;	
				setup_postdata( $post ); 
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
				if($thumb) {
	 				$html .= '<div class="uk-margin-bottom"><img src="'. resize_crop_img($thumb['url'], 600, 600). '" width="600" height="600" alt="'.$thumb['alt'].'"></div>';
				}
				$t = get_the_excerpt();
				$html .=  '<h3><a href="' . get_permalink() . '">'.get_the_title().'</a></h3>';
				$html .= '<div class="">'. $t . '</div>';
				wp_reset_postdata();
	 			$html .= '</div>';
			endwhile;
			$html .= '</div>';
		endif;
		$html .= '</div>';
		$html .= '</section>';
		return $html;
	endif;

}

function get_slider() {
	global $post;
	if( get_row_layout() == 'slider_row' ):

		$idSlider = uniqid();

		$html = '';
		$nbCols = get_sub_field('number_of_slides_to_show');
		$spacingClass = ' ' . get_sub_field('spacing');
		$bgClass = getBgClass(get_sub_field('background_color'));
		$fullWidth = get_sub_field('full_width');
		$slideAnim = get_sub_field('animation');

		$contClass = "uk-container uk-container-center";
		if($fullWidth ==1) {
			$contClass='';
		}
		$html = '<div class="' . $bgClass . $spacingClass . '" data-uk-scrollspy="{cls:\'uk-animation-fade\'}">';
		$html .= '<div class="' . $contClass .'">';

		if( have_rows('slides') ): 

			$html .= '<div class="acf-slider" id="slider-'.$idSlider.'" data-slides-to-show="'.$nbCols.'">';

			while( have_rows('slides') ): the_row(); 
				$image = get_sub_field('image');
				$full = resize_crop_img($image['url'], 1400, 580);
				$small = resize_crop_img($image['url'], 600, 400);
            		
				if($nbCols > 1) {
					$html .= '<div class="slider--similar__slide">';
			   		$html .= '<div class="image">';
			   		$html .= $small;
				}
				else {
	   				$html .= '<div class="slider-ad slider-ad--img">';
			   		$html .= '<div class="image">';		  			
			   		$html .= $full;
				}
	  			$html .= '</div>';
	   			$html .= '</div>';
			endwhile;
			$html .= '</div>';
		endif;

		$html .= '</div>';
		$html .= '</div>';

		// $html .= '<script>';
		// $html .= 'jQuery(document).ready(function($) {';
		// $html .= "var slider = jQuery('.slider-".$idSlider."');
		// 		  slider.slick({";
		// if($nbCols > 1) {
		// 	$html .= "
		// 	slidesToShow: ".$nbCols.",
		//     centerMode: true,
		//     slidesToScroll: ".$nbCols.",";
		// }

		// $html .= "
		// 			infinite: true,
		// 		    speed: 500,";
		
		// $html .= "
		// 		cssEase: 'linear'
		// 		  });});";
		// $html .= '</script>';

		return $html;
	endif;

}
