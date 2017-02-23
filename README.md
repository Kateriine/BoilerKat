# Boilerkat V4.2

Naked WP theme with uikit 2.27.2 and based on Starkers Masters

Optional file to create widgets

## Main features

The following features are located in `external/custom.php`.

- Custom image sizes (you can change the sizes, add more)
- Encrypted email
- Add current page class to menu in almost every case

Optional functions to uncomment:
- [WPML](https://wpml.org/) custom language menu
- Custom map with [Pronamic](https://wordpress.org/plugins/pronamic-google-maps/)
- [Post 2 post connections](https://wordpress.org/plugins/posts-to-posts/)

The following features are located in `external/image_editor_extend.php`.
- Real resize images on the fly (just provide src, width and height)

The following features are located in `external/svg_upload.php`.
- SVG support for WordPress

The following features are located in `external/acf_custom_functions.php`.
- functions to use with tpl-page-rows.php. If you wish to use it, install acf pro and import the file acf-custom-fields.json


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

Note: if you use W3 toal cache, feel free to use w3_total_cache_config.json


## JS

- Fancybox
- Slick
- Slick slider
- Video JS (check scss files)
- Smartresize (you can change the mobile limit size)


Note: *When adding/removing JS features, don't forget to adjust the gulpfile accordingly.*

## CSS

We use [uikit](https://github.com/uikit/uikit) - Version 2.27.2, see [Changelog](https://github.com/uikit/uikit/blob/develop/CHANGELOG.md)

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
- You're good to go! (Just be careful if upgrading from v2 to V3, some changes might be huge)

FYI: the files overriding uikit are `uikit-hooks.scss` and `uikit-variables.scss` located in the `scss`folder.

## Gulp

- `sudo npm install` installs NPM modules
- `gulp [name of the task]` launches a task


## Plugins

This theme works better with:

- [ACF Pro](http://wp-types.com/) (Custom fields)
- [Advanced Custom Fields: Widget Area](https://github.com/lucasstark/acf-field-widget-area/)
- [Advanced Custom Fields: A Widget](https://github.com/lucasstark/acf-field-a-widget)
- [WP-SEO by Yoast](https://wordpress.org/plugins/wordpress-seo/) (SEO)
- [WP-Smush](https://fr-be.wordpress.org/plugins/wp-smushit/) (Img Optimization)

*Optionally*:

- [Gravity Forms](http://www.gravityforms.com/) (Forms)
- [WP-Types and Views](http://wp-types.com/) (Custom fields)
- [Coming Soon Page & Maintenance Mode by SeedProd](https://tah.wordpress.org/plugins/coming-soon/)
- [W3 Total Cache](https://srd.wordpress.org/plugins/w3-total-cache/) (Optimization)
- [Posts 2 Posts](https://wordpress.org/plugins/posts-to-posts/) (Relations between posts)
- [WP-PageNavi](https://wordpress.org/plugins/wp-pagenavi/) (Custom pagination)
- [Manual Image Crop](https://wordpress.org/plugins/manual-image-crop/) (Images custom crop doesn't work with the resize on the fly function)
- [Ductile Responsive Video](https://wordpress.org/plugins/ductile-responsive-video/) (Responsive youtube embeds)
- [WPML](https://wpml.org/) (Translation)
- [Gravity Forms multilingual](https://wpml.org/documentation/related-projects/gravity-forms-multilingual/) (Multilingual forms)
- [Black Studio TinyMCE Widget](https://wordpress.org/plugins/black-studio-tinymce-widget/) (WYWIWYG widgets)

# Templates 

* 404.php
* archive.php
* comments.php
* front-page.php
* index.php
* page.php
* search.php
* single.php
* styleguide.php : to overview styles
* tpl-events-list.php
* tpl-page-rows.php

# Useful files

w3_total_cache_config.json: base config for W3 total cache

acf-custom-fields.json: custom fields for page-with-rows



