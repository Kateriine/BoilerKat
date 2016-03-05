# Kat theme base V4.0

Naked WP theme with uikit and based on Starkers Masters

Optional file to create widgets

## Main features

The following features are located in `external/custom.php`.

- Custom image sizes (you can change the sizes, add more)
- Encrypted email
- Add current page class to menu in almost every case
- Real resize images on the fly (just provide src, width and height)

Optional functions to uncomment:
- [WPML](https://wpml.org/) custom language menu
- Custom map with [Pronamic](https://wordpress.org/plugins/pronamic-google-maps/)
- [Post 2 post connections](https://wordpress.org/plugins/posts-to-posts/)
- SVG support for WordPress


The following features are located in `external/shortcodes.php` (mainly used in wp-views).

<!-- - Shortcode for icon svgs (to be used in 2 years) :p -->
- Encrypted email shortcodes
- Shortcode to create images on the fly
- Alt image shortcode
- Theme directory shortcode
- Increment in views shortcode ([WP-Types plugin](http://wp-types.com/))
- Main site url
- Add custom conditions in views ([WP-Types plugin](http://wp-types.com/))
- Custom image sizes urls shortcode(to uncomment)
- wp-pagenavi shortcode support in views (to uncomment) (Works with some scss files listed below) ([WP-pagenavi plugin](https://wordpress.org/plugins/wp-pagenavi/))
- Custom gallery shortcode
- Custom video gallery

The following features are located in `external/sidebars.php`.

- Main sidebar

The following features are located in `external/social.php`

In order to use this, you have to uncomment `require_once( 'external/social.php' );` in `functions.php`.
Works with some scss files listed below.

- Social share buttons
- Social stats buttons

The following features are located in `external/gforms.php` ([Gravity Forms plugin to add](http://www.gravityforms.com/)).
In order to use this, you have to uncomment `require_once( 'external/gforms.php' );` in `functions.php`

- tabindex regulation when multiple forms on same page
- populate a simple value in an input
- populate multiple values in a select input

## JS

- Fancybox
- Slick
- Slick slider
- Video JS (check scss files)
- Smartresize (you can change the mobile limit size)
- Responsive pics management (the Drupal way): change src according to screen size (to be implemented in theme)


Note: *When adding JS features, don't forget to adjust the gulpfile accordingly.*

## CSS

We use [uikit](https://github.com/uikit/uikit) - Version 2.24.3 (December 18, 2015), see [Changelog](https://github.com/uikit/uikit/blob/develop/CHANGELOG.md)

There are some scss files to customize the features below, check `adam/scss/style.scss`:

- Fancybox
- Social sharing
- Slick
- Video JS
- Langs
- Page nav

#### Updating uikit

- SCSS files are located [here](https://github.com/uikit/bower-uikit)
- Copy the content of the `scss` folder into `adam/scss/uikit/`
- You're good to go!

FYI: the files overriding uikit are `uikit-hooks.scss` and `uikit-variables.scss` located in the `scss`folder.

## Gulp

- `sudo npm install` installs NPM modules
- `gulp [name of the task]` launches a task


## Plugins

This theme works better with:

- [WP-Types and Views](http://wp-types.com/) (Custom fields)
- [Gravity Forms](http://www.gravityforms.com/) (Forms)
- [WP Rocket](http://wp-rocket.me/) (Optimization)
- [WP-SEO by Yoast](https://wordpress.org/plugins/wordpress-seo/) (SEO)

*Optionally*:

- [Posts 2 Posts](https://wordpress.org/plugins/posts-to-posts/) (Relations between posts)
- [The Repeater Field](https://wordpress.org/plugins/ewww-image-optimizer/) (Custom fields matrix)
- [EWWW Image Optimizer](https://wordpress.org/plugins/posts-to-posts/) (Image optimisation)
- [WP-PageNavi](https://wordpress.org/plugins/wp-pagenavi/) (Custom pagination)
- [Manual Image Crop](https://wordpress.org/plugins/manual-image-crop/) (Images custom crop doesn't work with the resize on the fly function)
- [Ductile Responsive Video](https://wordpress.org/plugins/ductile-responsive-video/) (Responsive youtube embeds)
- [WPML](https://wpml.org/) (Translation)
- [Gravity Forms multilingual](https://wpml.org/documentation/related-projects/gravity-forms-multilingual/) (Multilingual forms)
- [Black Studio TinyMCE Widget](https://wordpress.org/plugins/black-studio-tinymce-widget/) (WYWIWYG widgets)
