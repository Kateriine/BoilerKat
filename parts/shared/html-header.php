<!DOCTYPE HTML>
<!--[if IE 9]>     <html class="no-js ie ie9 lt-ie10" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
  <head>
    <title><?php wp_title( '|' ); ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Remove if you're not building a responsive site. (But then why would you do such a thing?) -->
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicons/manifest.json">
    <link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicons/favicon.ico">
    <meta name="msapplication-config" content="<?php echo get_stylesheet_directory_uri(); ?>/images/favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <?php wp_head(); ?>
    <!--[if (gte IE 6)&(lte IE 8)]>
  
      <script src="<?php echo get_template_directory_uri();?>/js/selectivizr-min.js"></script>
      <script src="<?php echo get_template_directory_uri();?>/js/respond.min.js"></script>

    <![endif]-->
    <!--[if !IE]><!--><script>  
      if (/*@cc_on!@*/false) {  
        document.documentElement.className+=' ie10';  
      }  
    </script><!--<![endif]-->
  </head>
  <body <?php body_class(); ?>>
