# KatThemeBase V3.5
Naked WP theme with uikit 2.16.2 and Starkers Masters

Optional file to create widgets

Better with wp-types and views.

## Base functions:

### In external/custom.php
- Custom image sizes (you can change the sizes, add more)
- Custom intro field excerpt
- Custom excerpt with length
- Encrypted email
- Add current page class to menu in almost every case
- Real resize images on the fly (just provide src, width and height)
Optional functions to uncomment:
- WPML custom language menu (Works with some scss files listed below)
- Custom map with pronamic
- Post 2 post connections

### In external/shortcodes.php (mainly used in wp-views)
- Shortcode for icon svgs
- Antispam email shortcodes
- Shortcode to create images on the fly
- Alt image shortcode
- Theme directory shortcode
- Increment in views shortcode
- Main site url
- Add custom conditions in views
- Custom image sizes urls shortcode(to uncomment)
- wp-pagenavi shortcode support in views (to uncomment) (Works with some scss files listed below)
- custom gallery shortcode
- custom video gallery

### In external/sidebars.php
- Main sidebar

### In external/social.php
(First of all, uncomment "require_once( 'external/social.php' );" in functions.php)
(Works with some scss files listed below)
- Social share buttons
- Social stats buttons

### In external/gforms.php
(First of all, uncomment "require_once( 'external/gforms.php' );" in functions.php)

- tabindex regulation when multiple forms on same page
- populate a simple value in an input
- populate multiple values in a select input

## JS
Fancybox, slick: to add to grunt concat
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

- Grunt management of js (add or delete some (un)necessary files)
- Gulp support
- According to this, adapt function starkers_script_enqueuer() in functions.php
