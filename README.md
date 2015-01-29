# KatThemeBase
Naked WP theme with uikit 2.16.2 and Starkers Masters

## Base functions:

### In external/custom.php
- Custom image sizes (you can change the sizes, add more)
- Custom intro field excerpt
- Custom excerpt with length
- Encrypted email
- Add current page class to menu in almost every case

### In external/shortcodes.php (mainly used in wp-views)
- Slug 
- Theme directory
- Increment in views
- Custom image sizes urls
- Main site url

### In external/sidebars.php
- Main sidebar

### In js/site.js
- Dropdown menu (might be to remove)
- Smartresize (you can change the mobile limit size)

### Possibility to use timthumb for image treatment

Optional file to create widgets

Better with wp-types and views.

## Improvements in UIKit:

- Replacement of font-sizes in px/rem instead of px
- mixin .btn to manage buttons in scss
- offcanvas revamped
- Some additions in grid.scss 

## To improve:

- Grunt management of js (add or delete some (un)necessary files)
- According to this, adapt function starkers_script_enqueuer() in functions.php
