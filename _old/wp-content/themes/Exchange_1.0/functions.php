<?php
/**
 * @package WordPress
 * @subpackage Exchange_1.0
 * @since Exchange 1.0
 */




add_theme_support( 'post-thumbnails' );



	add_filter( 'nav_menu_link_attributes', 'cfw_add_data_atts_to_nav', 10, 4 );
	function cfw_add_data_atts_to_nav( $atts, $item, $args )
		{
			// $atts['data-target'] = $item->title;
			$atts['data-target'] = '0';
			return $atts;
		}
	
	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page();
	}

	// Options Framework (https://github.com/devinsays/options-framework-plugin)
	if ( !function_exists( 'optionsframework_init' ) ) {
		define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/_/inc/' );
		require_once dirname( __FILE__ ) . '/_/inc/options-framework.php';
	}

	// Theme Setup (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function html5reset_setup() {
		load_theme_textdomain( 'html5reset', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'structured-post-formats', array( 'link', 'video' ) );
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'quote', 'status' ) );
		register_nav_menu( 'primary', __( 'Navigation Menu', 'html5reset' ) );
		register_nav_menu( 'secondary', __( 'Footer Navigation', 'html5reset' ) );
		register_nav_menu( 'mobile', __( 'Mobile Navigation', 'html5reset' ) );
		add_theme_support( 'post-thumbnails' );
	}
	add_action( 'after_setup_theme', 'html5reset_setup' );

	// Scripts & Styles (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function html5reset_scripts_styles() {
		global $wp_styles;

		// Load Comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

		}
	add_action( 'wp_enqueue_scripts', 'html5reset_scripts_styles' );

	// WP Title (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function html5reset_wp_title( $title, $sep ) {
		global $paged, $page;

		if ( is_feed() )
			return $title;

//		 Add the site name.
		$title .= get_bloginfo( 'name' );

//		 Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";

//		 Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( __( 'Page %s', 'html5reset' ), max( $paged, $page ) );

		return $title;
	}
	add_filter( 'wp_title', 'html5reset_wp_title', 10, 2 );


	// Load jQuery
	// if ( !function_exists( 'core_mods' ) ) {
	// 	function core_mods() {
	// 		if ( !is_admin() ) {
	// 			wp_deregister_script( 'jquery' );
	// 			wp_register_script( 'jquery', ( "http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" ), false);
	// 			wp_enqueue_script( 'jquery' );
	// 		}
	// 	}
	// 	add_action( 'wp_enqueue_scripts', 'core_mods' );
	// }

	// Custom Menu
	register_nav_menu( 'primary', __( 'Navigation Menu', 'html5reset' ) );

	
	// Navigation - update coming from twentythirteen
	function post_navigation() {
		echo '<div class="navigation">';
		echo '	<div class="next-posts">'.get_next_posts_link('&laquo; Older Entries').'</div>';
		echo '	<div class="prev-posts">'.get_previous_posts_link('Newer Entries &raquo;').'</div>';
		echo '</div>';
	}

	// Posted On
	function posted_on() {
		printf( __( '<span class="sep">Posted </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a> by <span class="byline author vcard">%5$s</span>', '' ),
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_author() )
		);
	}
	
	// Allow SVG in Media Gallery
	function cc_mime_types($mimes) {
	  $mimes['svg'] = 'image/svg+xml';
	  return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');
	function fix_svg_thumb_display() {
	//  echo '
	//	td.media-icon img[src$=".svg"], img[src$=".svg"].attachment-post-thumbnail { 
	//	  width: 100% !important; 
	//	  height: auto !important; 
	//	}
	 // ';
	}
	add_action('admin_head', 'fix_svg_thumb_display');
	
	function new_excerpt_more( $more ) {
    return '&hellip;'; // replace the normal [.....] with a empty string
 }   
 add_filter('excerpt_more', 'new_excerpt_more');

@ini_set( 'upload_max_size' , '32M' );
@ini_set( 'post_max_size', '32M');
@ini_set( 'max_execution_time', '300' );
	
?>
