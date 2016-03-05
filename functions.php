<?php
  /**
   * Starkers functions and definitions
   *
   * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
   *
   * @package   WordPress
   * @subpackage  Starkers
   * @since     Starkers 4.0
   */

  /* ========================================================================================================================

  Required external files

  ======================================================================================================================== */

  require_once( 'external/starkers-utilities.php' );
  require_once( 'external/shortcodes.php' );
  require_once( 'external/sidebars.php' );
  require_once( 'external/widgets.php' );
  require_once( 'external/gforms.php' );
  require_once( 'external/social.php' );
  require_once( 'external/acf_custom_functions.php' );
  require_once( 'external/custom.php' );
  require_once( 'external/plugs/class-tgm-plugin-activation.php' );


  // register_nav_menus(array('primary' => 'Primary Navigation'));

  /* ========================================================================================================================

  Actions and Filters

  ======================================================================================================================== */

  add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

  add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

  /* ========================================================================================================================

  Custom Post Types - include custom post types and taxonimies here e.g.

  e.g. require_once( 'custom-post-types/your-custom-post-type.php' );

  ======================================================================================================================== */



  /* ========================================================================================================================

  Scripts

  ======================================================================================================================== */

  /**
   * Add scripts via wp_head()
   *
   * @return void
   * @author Keir Whitaker
   */

  function starkers_script_enqueuer() {
    wp_register_script( 'modernizr', get_template_directory_uri().'/js/modernizr.custom.15226.js');


    wp_register_script( 'main', get_template_directory_uri().'/js/build/main.min.js', array( 'jquery' ) );
    // wp_register_script( 'accordion', get_template_directory_uri().'/js/components/accordion.js', array( 'jquery' ) );
    // wp_register_script( 'autocomplete', get_template_directory_uri().'/js/components/autocomplete.js', array( 'jquery' ) );
    // wp_register_script( 'cover', get_template_directory_uri().'/js/components/cover.js', array( 'jquery' ) );
    // wp_register_script( 'datepicker', get_template_directory_uri().'/js/components/datepicker.js', array( 'jquery' ) );
    // wp_register_script( 'formPassword', get_template_directory_uri().'/js/components/form-password.js', array( 'jquery' ) );
    // wp_register_script( 'formSelect', get_template_directory_uri().'/js/components/form-select.js', array( 'jquery' ) );
    // wp_register_script( 'grid', get_template_directory_uri().'/js/components/grid.js', array( 'jquery' ) );
    // wp_register_script( 'htmlEditor', get_template_directory_uri().'/js/components/htmleditor.js', array( 'jquery' ) );
    // wp_register_script( 'lightbox', get_template_directory_uri().'/js/components/lightbox.js', array( 'jquery' ) );
    // wp_register_script( 'nestable', get_template_directory_uri().'/js/components/nestable.js', array( 'jquery' ) );
    // wp_register_script( 'notify', get_template_directory_uri().'/js/components/notify.js', array( 'jquery' ) );
    // wp_register_script( 'pagination', get_template_directory_uri().'/js/components/pagination.js', array( 'jquery' ) );
    // wp_register_script( 'search', get_template_directory_uri().'/js/components/search.js', array( 'jquery' ) );
    // wp_register_script( 'slideshow', get_template_directory_uri().'/js/components/slideshow.js', array( 'jquery' ) );
    // wp_register_script( 'slideshowFx', get_template_directory_uri().'/js/components/slideshow-fx.js', array( 'jquery' ) );
    // wp_register_script( 'sortable', get_template_directory_uri().'/js/components/sortable.js', array( 'jquery' ) );
    // wp_register_script( 'sticky', get_template_directory_uri().'/js/components/sticky.js', array( 'jquery' ) );
    // wp_register_script( 'timepicker', get_template_directory_uri().'/js/components/timepicker.js', array( 'jquery' ) );
    // wp_register_script( 'upload', get_template_directory_uri().'/js/components/upload.js', array( 'jquery' ) );


    wp_enqueue_script('modernizr');
    // wp_enqueue_script( 'accordion' );
    // wp_enqueue_script( 'autocomplete' );
    // wp_enqueue_script( 'cover' );
    // wp_enqueue_script( 'datepicker' );
    // wp_enqueue_script( 'formPassword' );
    // wp_enqueue_script( 'formSelect' );
    // wp_enqueue_script( 'grid' );
    // wp_enqueue_script( 'lightbox' );
    // wp_enqueue_script( 'nestable' );
    // wp_enqueue_script( 'notify' );
    // wp_enqueue_script( 'pagination' );
    // wp_enqueue_script( 'search' );
    // wp_enqueue_script( 'slideshow' );
    // wp_enqueue_script( 'slideshowFx' );
    // wp_enqueue_script( 'sortable' );
    // wp_enqueue_script( 'sticky' );
    // wp_enqueue_script( 'timepicker' );
    // wp_enqueue_script( 'upload' );
    wp_enqueue_script( 'main' );

    wp_register_style( 'screen', get_stylesheet_directory_uri().'/css/style.css', '', '', 'screen' );
    wp_enqueue_style( 'screen' );
  }

  /* ========================================================================================================================

  Comments

  ======================================================================================================================== */

  /**
   * Custom callback for outputting comments
   *
   * @return void
   * @author Keir Whitaker
   */
  function starkers_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    ?>
    <?php if ( $comment->comment_approved == '1' ): ?>
    <li>
      <article id="comment-<?php comment_ID() ?>">
        <?php echo get_avatar( $comment ); ?>
        <h4><?php comment_author_link() ?></h4>
        <time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
        <?php comment_text() ?>
      </article>
    <?php endif;
  }

/**
 * Include the TGM_Plugin_Activation class.
 */

add_action( 'tgmpa_register', 'adam_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function adam_register_required_plugins() {

  /**
   * Array of plugin arrays. Required keys are name and slug.
   * If the source is NOT from the .org repo, then source is also required.
   */
  $plugins = array(

      array(
      'name'     => 'Ductile Responsive Video', // The plugin name
      'slug'     => 'ductile-responsive-video', // The plugin slug (typically the folder name)
      'required' => true,
    ),
    array(
      'name'     => 'Advanced Custom Fields Pro', // The plugin name
      'slug'     => 'advanced-custom-fields-pro', // The plugin slug (typically the folder name)
      'source'   => 'http://connect.advancedcustomfields.com/index.php?p=pro&a=download&k=b3JkZXJfaWQ9NjkxNjd8dHlwZT1wZXJzb25hbHxkYXRlPTIwMTUtMTEtMTggMTc6MjY6Mzk=', // The plugin source
      'required' => true,
    ),
    array(
      'name'     => 'Advanced Custom Fields Repeater Collapser', // The plugin name
      'slug'     => 'ACF-Repeater-Collapser-master', // The plugin slug (typically the folder name)
      'source'   => 'https://github.com/mrwweb/ACF-Repeater-Collapser/archive/master.zip', // The plugin source
      'external_url' => 'https://github.com/mrwweb/ACF-Repeater-Collapser/archive/master.zip',
      'required' => false,
    ),
    array(
      'name'     => 'Advanced Custom Fields: Widget Area', // The plugin name
      'slug'     => 'acf-field-widget-area-master', // The plugin slug (typically the folder name)
      'source'   => 'https://github.com/lucasstark/acf-field-widget-area/archive/master.zip', // The plugin source
      'external_url' => 'https://github.com/lucasstark/acf-field-widget-area/',
      'required' => true,
    ),
    array(
      'name'     => 'Advanced Custom Fields: A Widget', // The plugin name
      'slug'     => 'acf-field-a-widget-master', // The plugin slug (typically the folder name)
      'source'   => 'https://github.com/lucasstark/acf-field-a-widget/archive/master.zip', // The plugin source
      'external_url' => 'https://github.com/lucasstark/acf-field-a-widget/',
      'required' => true,
    ),
    array(
      'name'     => 'Gravity Forms', // The plugin name
      'slug'     => 'gravityforms', // The plugin slug (typically the folder name)
      'source'   => 'http://s3.amazonaws.com/gravityforms/releases/gravityforms_1.9.9.13.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1433494222&Signature=3PEVaC7m5Mxgd7is7Vp3ChX8Wtc%3D', // The plugin source
      'external_url' => 'http://s3.amazonaws.com/gravityforms/releases/gravityforms_1.9.16.7.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1456397264&Signature=QFZpnnpgusm3zYbMxUxBeb09P9Y%3D',
      'required' => false,
    ),
    // array(
    //   'name'     => 'Advanced Custom Fields: Repeater Field', // The plugin name
    //   'slug'     => 'acf-repeater', // The plugin slug (typically the folder name)
    //   'source'   => 'https://wpml.org/fr/?download=6088&user_id=22940&subscription_key=$P$BQlyEef.gRIGD2TrWo18AswYdeeUt', // The plugin source
    //   'required' => false,
    // ),
    array(
      'name'     => 'Types', // The plugin name
      'slug'     => 'types', // The plugin slug (typically the folder name)
      'required' => false,
    ),
    array(
      'name'     => 'WP-Views', // The plugin name
      'slug'     => 'wp-views', // The plugin slug (typically the folder name)
      'source'   => 'https://wp-types.com/?download=308&user_id=1709&subscription_key=GkRutbktJy', // The plugin source
      'required' => false,
    ),
    array(
      'name'     => 'WPML Multilingual CMS', // The plugin name
      'slug'     => 'sitepress-multilingual-cms', // The plugin slug (typically the folder name)
      'source'   => 'https://wpml.org/fr/?download=6088&user_id=22940&subscription_key=$P$BQlyEef.gRIGD2TrWo18AswYdeeUt', // The plugin source
      'external_url' => 'https://wpml.org/fr/?download=6088&user_id=22940&subscription_key=$P$BQlyEef.gRIGD2TrWo18AswYdeeUt',
      'required' => false,
    ),
    array(
      'name'     => 'WPML String Translation', // The plugin name
      'slug'     => 'wpml-string-translation', // The plugin slug (typically the folder name)
      'source'   => 'https://wpml.org/fr/?download=6092&user_id=22940&subscription_key=$P$BQlyEef.gRIGD2TrWo18AswYdeeUt', // The plugin source
      'external_url' => 'https://wpml.org/fr/?download=6092&user_id=22940&subscription_key=$P$BQlyEef.gRIGD2TrWo18AswYdeeUt',
      'required' => false,
    ),
    array(
      'name'     => 'WPML Translation Management', // The plugin name
      'slug'     => 'wpml-translation-management', // The plugin slug (typically the folder name)
      'source'   => 'https://wpml.org/fr/?download=6094&user_id=22940&subscription_key=$P$BQlyEef.gRIGD2TrWo18AswYdeeUt', // The plugin source
      'external_url' => 'https://wpml.org/fr/?download=6094&user_id=22940&subscription_key=$P$BQlyEef.gRIGD2TrWo18AswYdeeUt',
      'required' => false,
    ),
    array(
      'name'     => 'Gravity Forms Multilingual', // The plugin name
      'slug'     => 'gravityforms-multilingual', // The plugin slug (typically the folder name)
      'source'   => 'https://wpml.org/fr/?download=8882&user_id=22940&subscription_key=$P$BQlyEef.gRIGD2TrWo18AswYdeeUt', // The plugin source
      'external_url' => 'https://wpml.org/fr/?download=8882&user_id=22940&subscription_key=$P$BQlyEef.gRIGD2TrWo18AswYdeeUt',
      'required' => false,
    ),
    array(
      'name'     => 'WordPress SEO', // The plugin name
      'slug'     => 'wordpress-seo', // The plugin slug (typically the folder name)
      'required' => false,
    ),
    array(
      'name'     => 'WP Rocket', // The plugin name
      'slug'     => 'wp-rocket', // The plugin slug (typically the folder name)
      'source'   => 'http://support.wp-rocket.me/invoicingspadebe/invoicing_at_spade_dot_be/wp-rocket_2.6.1.zip', // The plugin source
      'external_url' => 'http://support.wp-rocket.me/invoicingspadebe/invoicing_at_spade_dot_be/wp-rocket_2.6.1.zip',
      'required' => false,
    ),
    array(
      'name'     => 'Posts 2 Posts', // The plugin name
      'slug'     => 'posts-to-posts', // The plugin slug (typically the folder name)
      'required' => false,
    ),
    array(
      'name'     => 'Google Analyticator', // The plugin name
      'slug'     => 'google-analyticator', // The plugin slug (typically the folder name)
      'required' => false,
    ),
    array(
      'name'     => 'Admin Menu Editor', // The plugin name
      'slug'     => 'admin-menu-editor', // The plugin slug (typically the folder name)
      'required' => false,
    ),
    array(
      'name'     => 'WP-PageNavi', // The plugin name
      'slug'     => 'wp-pageNavi', // The plugin slug (typically the folder name)
      'required' => false,
    ),
    array(
      'name'     => 'GitHub Updater', // The plugin name
      'slug'     => 'github-updater', // The plugin slug (typically the folder name)
      'source'   => 'https://github.com/afragen/github-updater/archive/develop.zip', // The plugin source
      'external_url' => 'https://github.com/afragen/github-updater',
      'required' => false,
    ),
    array(
      'name'     => 'WP Sync DB', // The plugin name
      'slug'     => 'wp-sync-db', // The plugin slug (typically the folder name)
      'source'   => 'https://github.com/wp-sync-db/wp-sync-db/archive/master.zip', // The plugin source
      'external_url' => 'https://github.com/wp-sync-db/wp-sync-db',
      'required' => false,
    ),
    array(
      'name'     => 'MCE Table Buttons', // The plugin name
      'slug'     => 'mce-table-buttons', // The plugin slug (typically the folder name)
      'required' => false,
    ),
    array(
      'name'     => 'Gravity Forms: Multiple Form Instances', // The plugin name
      'slug'     => 'gravity-forms-multiple-form-instances', // The plugin slug (typically the folder name)
      'required' => false,
    ),
    array(
      'name'     => 'Black Studio TinyMCE Widget', // The plugin name
      'slug'     => 'black-studio-tinymce-widget', // The plugin slug (typically the folder name)
      'required' => false,
    ),
    array(
      'name'     => 'Identity Data management from Kat', // The plugin name
      'slug'     => 'katContact-master', // The plugin slug (typically the folder name)
      'source'   => 'https://github.com/Kateriine/katContact/archive/master.zip', // The plugin source
      'external_url' => 'https://github.com/Kateriine/katContact/',
      'required' => false,
    ),
  );

  /** Change this to your theme text domain, used for internationalising strings */
  $theme_text_domain = 'site';

  /**
   * Array of configuration settings. Uncomment and amend each line as needed.
   * If you want the default strings to be available under your own theme domain,
   * uncomment the strings and domain.
   * Some of the strings are added into a sprintf, so see the comments at the
   * end of each line for what each argument will be.
   */
  $config = array(
    /*'domain'       => $theme_text_domain,         // Text domain - likely want to be the same as your theme. */
    /*'default_path' => '',                         // Default absolute path to pre-packaged plugins */
    /*'menu'         => 'install-my-theme-plugins', // Menu slug */
    'strings'        => array(
      /*'page_title'             => __( 'Install Required Plugins', $theme_text_domain ), // */
      /*'menu_title'             => __( 'Install Plugins', $theme_text_domain ), // */
      /*'instructions_install'   => __( 'The %1$s plugin is required for this theme. Click on the big blue button below to install and activate %1$s.', $theme_text_domain ), // %1$s = plugin name */
      /*'instructions_activate'  => __( 'The %1$s is installed but currently inactive. Please go to the <a href="%2$s">plugin administration page</a> page to activate it.', $theme_text_domain ), // %1$s = plugin name, %2$s = plugins page URL */
      /*'button'                 => __( 'Install %s Now', $theme_text_domain ), // %1$s = plugin name */
      /*'installing'             => __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name */
      /*'oops'                   => __( 'Something went wrong with the plugin API.', $theme_text_domain ), // */
      /*'notice_can_install'     => __( 'This theme requires the %1$s plugin. <a href="%2$s"><strong>Click here to begin the installation process</strong></a>. You may be asked for FTP credentials based on your server setup.', $theme_text_domain ), // %1$s = plugin name, %2$s = TGMPA page URL */
      /*'notice_cannot_install'  => __( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', $theme_text_domain ), // %1$s = plugin name */
      /*'notice_can_activate'    => __( 'This theme requires the %1$s plugin. That plugin is currently inactive, so please go to the <a href="%2$s">plugin administration page</a> to activate it.', $theme_text_domain ), // %1$s = plugin name, %2$s = plugins page URL */
      /*'notice_cannot_activate' => __( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', $theme_text_domain ), // %1$s = plugin name */
      /*'return'                 => __( 'Return to Required Plugins Installer', $theme_text_domain ), // */
    ),
  );

  tgmpa( $plugins, $config );

}
