<?php
/**
 * ingenillegal functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ingenillegal
 */

if ( ! function_exists( 'ingenillegal_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ingenillegal_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ingenillegal, use a find and replace
		 * to change 'ingenillegal' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ingenillegal', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main', 'ingenillegal' ),
			'groups-menu' => esc_html__( 'Groups', 'ingenillegal' ),
			'languages-menu' => esc_html__( 'Languages', 'ingenillegal' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for editor styles, editor-style.css
		add_editor_style();
		add_theme_support('editor-styles');

	}
endif;
add_action( 'after_setup_theme', 'ingenillegal_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ingenillegal_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'ingenillegal_content_width', 640 );
}
add_action( 'after_setup_theme', 'ingenillegal_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function ingenillegal_scripts() {

	// Add the style in theme root, with normalizing css
	wp_enqueue_style( 'theme-style', get_stylesheet_uri() );

	// Add style from dist folder
	wp_enqueue_style( 'ingenillegal-style', get_stylesheet_directory_uri() . '/dist/css/style.css');

	// Load theme script with jquery as dependency
	wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/dist/js/script.js', array('jquery'), null, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ingenillegal_scripts' );

/**
* Enqueue editor styles for Gutenberg
*/
function ingenillegal_editor_styles() {
    //wp_enqueue_style( 'theme-slug-editor-style', get_template_directory_uri() . '/assets/stylesheets/editor-style.css' );
		wp_enqueue_style( 'ingenillegal-google-fonts', 'https://fonts.googleapis.com/css?family=Roboto+Mono:400,500|Roboto:300,400,500,700,900&amp;subset=latin-ext', false );
}
add_action( 'enqueue_block_editor_assets', 'ingenillegal_editor_styles' );

/**
 * Functions which enhance the theme by hooking into WordPress.
 * All filters and custom functions for the theme is in this file
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom template tags for this theme.
 * Display for posted_by and similar
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
