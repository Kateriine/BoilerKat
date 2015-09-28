# KatThemeBase V4.0
Naked WP theme with uikit 2.21.0 and Starkers Masters

Optional file to create widgets

Better with

- [wp-types and views](http://wp-types.com/) (Custom fields)
- [Gravity Forms](http://www.gravityforms.com/) (Forms)
- [WP Rocket](http://wp-rocket.me/) (Optimization)
- [WP-SEO by Yoast](https://wordpress.org/plugins/wordpress-seo/) (SEO)

Optional:

- [Posts 2 Posts](https://wordpress.org/plugins/posts-to-posts/) (Relations between posts)
- [The Repeater Field](https://wordpress.org/plugins/ewww-image-optimizer/) (Custom fields matrix)
- [EWWW Image Optimizer](https://wordpress.org/plugins/posts-to-posts/) (Image optimisation)
- [WP-PageNavi](https://wordpress.org/plugins/wp-pagenavi/) (Custom pagination)
- [Manual Image Crop](https://wordpress.org/plugins/manual-image-crop/) (Images custom crop doesn't work with the resize on the fly function)
- [Ductile Responsive Video](https://wordpress.org/plugins/ductile-responsive-video/) (Responsive youtube embeds)
- [WPML](https://wpml.org/) (Translation)
- [Gravity Forms multilingual](https://wpml.org/documentation/related-projects/gravity-forms-multilingual/) (Multilingual forms)
- [Black Studio TinyMCE Widget](https://wordpress.org/plugins/black-studio-tinymce-widget/) (WYWIWYG widgets)

## Base functions:

### In external/custom.php
- Custom image sizes (you can change the sizes, add more)
- Encrypted email
- Add current page class to menu in almost every case
- Real resize images on the fly (just provide src, width and height)
Optional functions to uncomment:
- WPML custom language menu (Works with some scss files listed below) (Plugin to add)
- Custom map with pronamic ([Plugin to add](https://wordpress.org/plugins/pronamic-google-maps/))
- Post 2 post connections ([Plugin to add](https://wordpress.org/plugins/posts-to-posts/))
- SVG support for Wordpress


### In external/shortcodes.php (mainly used in wp-views)
<!-- - Shortcode for icon svgs (to be used in 2 years) :p -->
- Encrypted email shortcodes
- Shortcode to create images on the fly
- Alt image shortcode
- Theme directory shortcode
- Increment in views shortcode ([Plugin to add](http://wp-types.com/))
- Main site url
- Add custom conditions in views ([Plugin to add](http://wp-types.com/))
- Custom image sizes urls shortcode(to uncomment)
- wp-pagenavi shortcode support in views (to uncomment) (Works with some scss files listed below) ([Plugin to add](https://wordpress.org/plugins/wp-pagenavi/))
- custom gallery shortcode
- custom video gallery

### In external/sidebars.php
- Main sidebar

### In external/social.php
(First of all, uncomment "require_once( 'external/social.php' );" in functions.php)
(Works with some scss files listed below)
- Social share buttons
- Social stats buttons

### In external/gforms.php ([Plugin to add](http://www.gravityforms.com/))
(First of all, uncomment "require_once( 'external/gforms.php' );" in functions.php)

- tabindex regulation when multiple forms on same page
- populate a simple value in an input
- populate multiple values in a select input

## JS
Fancybox, slick: to add to grunt concat if needed
Slick slider (idem)
Video JS
(Works with some scss files listed below)

### In js/site.js
- Smartresize (you can change the mobile limit size)
- Responsive pics management (drupal way): change src according to screen size (to be implemented in theme)

##SCSS:
Fancybox, social sharing, slick, Video JS, langs, pagenavi to uncomment in style.scss if needed.

## Improvements in UIKit:

- Replacement of font-sizes in px/rem instead of px
- mixin .btn to manage buttons in scss
- offcanvas revamped (mobile offcanvas to desktop sidebar)
- Some additions in grid.scss

## Gulp Support

`(sudo) npm install`

This should install all the dependencies you need.
origin/master

#When updating UIKIT:

- Files overriding uikit: uikit-hooks and uikit-variables
- Beware of files to adapt:
-> buttons.scss
-> grid.scss
