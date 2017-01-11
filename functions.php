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

  require_once( 'external/utilities.php' );
  require_once( 'external/shortcodes.php' );
  require_once( 'external/sidebars.php' );
  require_once( 'external/widgets.php' );
  require_once( 'external/gforms.php' );
  require_once( 'external/social.php' );
  require_once( 'external/acf_custom_functions.php' );
  require_once( 'external/custom.php' );
  require_once( 'external/plugs/class-tgm-plugin-activation.php' );
  require 'image_editor_extend.php';


  // register_nav_menus(array('primary' => 'Primary Navigation'));

  /* ========================================================================================================================

  Actions and Filters

  ======================================================================================================================== */

  add_action( 'wp_enqueue_scripts', 'script_enqueuer' );

  add_filter( 'body_class', array( 'Utilities', 'add_slug_to_body_class' ) );
  add_action('wp_enqueue_scripts','dequeue_my_css',100);

  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  
  function dequeue_my_css() {
    wp_dequeue_style('wptoolset-field-datepicker');
    wp_deregister_style('wptoolset-field-datepicker');
    wp_dequeue_script( 'jquery-ui-datepicker-local-en-GB'  );
    wp_deregister_script( 'jquery-ui-datepicker-local-en-GB'  );
    // wp_dequeue_script( 'wptoolset-field-date'  );
    // wp_deregister_script( 'wptoolset-field-date'  );
  }

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

  function script_enqueuer() {
    wp_register_script( 'modernizr', get_template_directory_uri().'/js/modernizr.custom.15226.js');
    wp_register_script( 'main', get_template_directory_uri().'/js/build/main.min.js', array( 'jquery' ) );

    wp_enqueue_script('modernizr');
    wp_enqueue_script( 'main' );

    wp_register_style( 'all', get_stylesheet_directory_uri().'/css/style.css', '', '', 'all' );
    wp_enqueue_style( 'all' );
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
  function theme_comment( $comment, $args, $depth ) {
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


