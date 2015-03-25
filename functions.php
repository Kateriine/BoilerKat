<?php
	/**
	 * Starkers functions and definitions
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
 	 * @package 	WordPress
 	 * @subpackage 	Starkers
 	 * @since 		Starkers 4.0
	 */

	/* ========================================================================================================================
	
	Required external files
	
	======================================================================================================================== */

	require_once( 'external/starkers-utilities.php' );
	require_once( 'external/shortcodes.php' );
	require_once( 'external/sidebars.php' );
	require_once( 'external/widgets.php' );
	//require_once( 'external/gforms.php' );
	//require_once( 'external/social.php' );
	require_once( 'external/custom.php' );

	
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

		
		wp_register_script( 'uikit', get_template_directory_uri().'/js/uikit.js', array( 'jquery' ) );
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
		wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery' ) );

		
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
		wp_enqueue_script( 'uikit' );
		wp_enqueue_script( 'site' );

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