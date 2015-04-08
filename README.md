# KatThemeBase V3.5
Naked WP theme with uikit 2.18 and Starkers Masters

Optional file to create widgets

Better with <a href="http://wp-types.com/" target="_blank">wp-types and views</a> and <a href="https://wordpress.org/plugins/wordpress-seo/" target="_blank">WP-SEO by Yoast</a>.

## Base functions:

### In external/custom.php
- Custom image sizes (you can change the sizes, add more)
- Encrypted email
- Add current page class to menu in almost every case
- Real resize images on the fly (just provide src, width and height)
Optional functions to uncomment:
- WPML custom language menu (Works with some scss files listed below) (Plugin to add)
- Custom map with pronamic (<a href="https://wordpress.org/plugins/pronamic-google-maps/" target="_blank">Plugin to add</a>)
- Post 2 post connections (<a href="https://wordpress.org/plugins/posts-to-posts/" target="_blank">Plugin to add</a>)

### In external/shortcodes.php (mainly used in wp-views)
- Shortcode for icon svgs
- Encrypted email shortcodes
- Shortcode to create images on the fly
- Alt image shortcode
- Theme directory shortcode
- Increment in views shortcode (<a href="http://wp-types.com/" target="_blank">Plugin to add</a>)
- Main site url
- Add custom conditions in views (<a href="http://wp-types.com/" target="_blank">Plugin to add</a>)
- Custom image sizes urls shortcode(to uncomment)
- wp-pagenavi shortcode support in views (to uncomment) (Works with some scss files listed below) (<a href="https://wordpress.org/plugins/wp-pagenavi/" target="_blank">Plugin to add</a>)
- custom gallery shortcode
- custom video gallery

### In external/sidebars.php
- Main sidebar

### In external/social.php
(First of all, uncomment "require_once( 'external/social.php' );" in functions.php)
(Works with some scss files listed below)
- Social share buttons
- Social stats buttons

### In external/gforms.php (<a href="http://www.gravityforms.com/" target="_blank">Plugin to add</a>)
(First of all, uncomment "require_once( 'external/gforms.php' );" in functions.php)

- tabindex regulation when multiple forms on same page
- populate a simple value in an input
- populate multiple values in a select input

## JS
Fancybox, slick: to add to grunt concat if needed
Slick slider (idem)
(Works with some scss files listed below)

### In js/site.js
- Smartresize (you can change the mobile limit size)
- Responsive pics management (drupal way): change src according to screen size (to be implemented in theme)

##SCSS:
Fancybox, social sharing, slick, langs, pagenavi to uncomment in style.scss if needed.

## Improvements in UIKit:

- Replacement of font-sizes in px/rem instead of px
- mixin .btn to manage buttons in scss
- offcanvas revamped (mobile offcanvas to desktop sidebar)
- Some additions in grid.scss 

## Notes:
- Works well with Grunt and svgstore (file has been prepared)

## To improve:

- Dynamic customisation of widgets
- Gulp support
- Video js support
