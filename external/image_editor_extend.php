<?php
require_once(ABSPATH . WPINC . '/class-wp-image-editor.php');
require_once(ABSPATH . WPINC . '/class-wp-image-editor-imagick.php');
require_once(ABSPATH . WPINC . '/class-wp-image-editor-gd.php');
class Imagick_Filters_Editor extends WP_Image_Editor_Imagick {
  public function sepia($arg = 100) {
    $this->image->sepiaToneImage($arg);
    return true;
  }
  public function greyscale() {
    $this->image->modulateImage(100,0,100);
    return true;
  }
}
class GD_Filters_Editor extends WP_Image_Editor_GD {
  public function sepia() {
    imagefilter($this->image, IMG_FILTER_GRAYSCALE);
    imagefilter($this->image, IMG_FILTER_COLORIZE, 90, 60, 40);
    return true;
  }

  public function greyscale() {
    imagefilter($this->image, IMG_FILTER_GRAYSCALE);
    return true;
  }
}

function add_image_filters_editors( $editors ) {
  array_unshift( $editors, 'Imagick_Filters_Editor' );
  array_unshift( $editors, 'GD_Filters_Editor' );

  return $editors;
}

add_filter( 'wp_image_editors', 'add_image_filters_editors' );

function grayscale_img($img='', $w, $h, $crop=true) {
  if($img == '') 
    return;

  $upload_dir = wp_upload_dir();
  $info = pathinfo($img);
  $origBasePath = str_replace(site_url() , $_SERVER['DOCUMENT_ROOT'], $info['dirname']);
  $origBasePath = str_replace('//' , '/', $origBasePath);
  $fileN = wp_basename( $img );
  $pathOrig = $origBasePath.'/'.$fileN;
  $base_dir = strtolower( $upload_dir['basedir'] );

  $saveUrl = $upload_dir['baseurl'] .'/grayscale/'. $fileN . '_' . $w .'x'. $h . '.'. strtolower($info['extension']);
  $savePath = $base_dir .'/grayscale/'. $fileN . '_' . $w .'x'. $h . '.'. strtolower($info['extension']);
  $origSize = getimagesize($img);

  if(!is_dir($base_dir .'/grayscale/')) {
    mkdir($base_dir .'/grayscale/', 0755, true);
  }

  if(!file_exists($savePath) && file_exists($pathOrig) ) {
    $editor = wp_get_image_editor($pathOrig);
    if ( is_wp_error( $editor ) )
      return $editor;
    if ( ! is_wp_error( $editor ) ) {


      $editor->resize( $w, $h, $crop );
      $editor->greyscale();
      $new_image_info = $editor->save( $savePath );

      if ( is_wp_error( $new_image_info ) )
        return $new_image_info;
    }
  }
  if(file_exists($savePath))
    return  $saveUrl;
}

function resize_crop_img($img='', $w, $h, $crop=true) {
  if($img == '') 
    return;
  $upload_dir = wp_upload_dir();
  $info = pathinfo($img);
  $origBasePath = str_replace(site_url() , $_SERVER['DOCUMENT_ROOT'], $info['dirname']);
  $origBasePath = str_replace('//' , '/', $origBasePath);
  $fileN = wp_basename( $img );
  $pathOrig = $origBasePath.'/'.$fileN;
 
  $base_dir = strtolower( $upload_dir['basedir'] );

  $origSize = getimagesize($img);
  

  $saveUrl = $upload_dir['baseurl'] .'/cropped-resized/'. $fileN . '_' . $w .'x'. $h . '.'. strtolower($info['extension']);
  $savePath = $base_dir .'/cropped-resized/'. $fileN . '_' . $w .'x'. $h . '.'. strtolower($info['extension']);

  if(!is_dir($base_dir .'/cropped-resized/')) {
    mkdir($base_dir .'/cropped-resized/', 0755, true);
  }

  if(!file_exists($savePath) && file_exists($pathOrig) ) {
    $editor = wp_get_image_editor( $pathOrig);
    if ( is_wp_error( $editor ) )
      return $editor;
    if ( ! is_wp_error( $editor ) ) {
      $editor->resize( $w, $h, $crop );
      $new_image_info = $editor->save( $savePath );
      if ( is_wp_error( $new_image_info ) )
        return $new_image_info;
    }
  }
  if(file_exists($savePath))
    return  $saveUrl;
}