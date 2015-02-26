<?php
/**
 * Creare Boilerplate functions and definitions
 *
 * @package Creare Boilerplate
 * Version 1.3
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels *
}*/

if ( ! function_exists( 'creare_boilerplate_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function creare_boilerplate_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Creare Boilerplate, use a find and replace
	 * to change 'creare-boilerplate' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'creare-boilerplate', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Register Menus for use in header, footer and sitemap
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus
	 */
	// For use as the main menu.
	register_nav_menus( array(
		'primary' => __( 'Main Menu', 'creare-boilerplate' ),
	) );
	// For use as the footer menu.
	register_nav_menus( array(
		'secondary' => __( 'Footer Menu', 'creare-boilerplate' ),
	) );
	// For use as the sitemap menu.
	register_nav_menus( array(
		'sitemap' => __( 'Sitemap Menu', 'creare-boilerplate' ),
	) );

	// Enable support for Post Formats. Uncomment if needed
	/* add_theme_support( 'post-formats', array( 
		'aside', 
		'image', 
		'video', 
		'quote', 
		'link' 
	) ); */

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );
	
}
endif; // creare_boilerplate_setup
add_action( 'after_setup_theme', 'creare_boilerplate_setup' );


/**
 * Post thumbnails
 *
 * @link http://codex.wordpress.org/Function_Reference/add_theme_support
 */
add_theme_support( 'post-thumbnails' );
//add_image_size( 'company_logo', $width, $height, true );


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function creare_boilerplate_widgets_init() {
	
	// Primary sidebar area
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'creare-boilerplate' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );
	
	// Secondary sidebar area
	register_sidebar( array(
		'name'          => __( 'Secondary Sidebar', 'creare-boilerplate' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) ); 
	
	// Additional sidebar area, uncomment if needed
	/* register_sidebar( array(
		'name'          => __( 'Additional Sidebar', 'creare-boilerplate' ),
		'id'            => 'sidebar-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) ); */
}
add_action( 'widgets_init', 'creare_boilerplate_widgets_init' );

/**
 * Enqueue scripts and styles.
 * Add all addtional styles and scripts in here.
 *
 * @link http://www.creare.co.uk/how-to-enqueue-scripts-stylesheets-to-wordpress-via-a-plugin
 */
function creare_boilerplate_styles_scripts() {
	
	// Stylesheet used for theme styles
	wp_enqueue_style( 'creare-boilerplate-theme', get_stylesheet_uri(), '', null );

	// Enqueue latets jQuery version built in to WordPress. Comment out if not required. 
	wp_enqueue_script( 'jquery' );
	
	// Enqueue our theme's libraries script file
	// Add all 3rd party JS scripts into this one file
	// Minify file once ready to go live
	wp_enqueue_script( 'creare-boilerplate-libraries', get_template_directory_uri() . '/js/libraries.js', '', null );

	// Enqueue our theme's minified script file
	wp_enqueue_script( 'creare-boilerplate-script', get_template_directory_uri() . '/js/scripts.min.js', '', null );

	// Enqueue Google Map Api
	// Un comment enqueue and if statement. Replace ID with contact page ID in conditional so script only loads on contact page
	//if( is_page('ID') ) {
		//wp_enqueue_script( 'creare-boilerplate-googlemapapi', 'https://maps.googleapis.com/maps/api/js?sensor=false', '', null );
	//}

	// Enqueues threaded commenting
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'creare_boilerplate_styles_scripts' );

/**
 * Custom functions that act independently of the theme templates to set up theme functionality.
 */
require get_template_directory() . '/inc/theme-extras.php';

/**
 * Custom functions that complete some basic set up of the theme.
 */
require get_template_directory() . '/inc/theme-setup.php';

/**
 * Blank custom post type to use if required.
 */
// require get_template_directory() . '/inc/cpt.php';

/**
 * File used to set up our bulk plugin installer functionality.
 */
require get_template_directory() . '/inc/plugin-setup.php';

/**
 * File used to set up our comment removal functionality.
 * Comment out the file below to return comment functionality to the website. This includes WooCommerce reviews.
 */
require get_template_directory() . '/inc/comments.php';

/**
 * Adds the ACF Options Page with company fields already setup.
 */
require get_template_directory() . '/inc/options-setup.php';

/**
 * Bespoke theme functionality added below.
 */
