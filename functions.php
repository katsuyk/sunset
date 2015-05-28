<?php
/**
 * sunset functions and definitions
 *
 * @package sunset
 */


if ( ! function_exists( 'sunset_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sunset_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on sunset, use a find and replace
	 * to change 'sunset' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'sunset', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'sunset' ),
		'footer-menu' => __( 'Footer Menu', 'sunset' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );
}
endif; // sunset_setup
add_action( 'after_setup_theme', 'sunset_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function sunset_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'sunset' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar Left', 'sunset' ),
		'id'            => 'sidebar-left',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Contact', 'sunset' ),
		'id'            => 'contact',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'sunset_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sunset_scripts() {
	wp_enqueue_style( 'bootstrap-styles', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.4', 'all' );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.3.0', 'all' );

	wp_enqueue_style( 'sunset-style', get_stylesheet_uri() );

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.4', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sunset_scripts' );

/**
* Add Respond.js for IE
*/
if( !function_exists('ie_scripts')) {
	function ie_scripts() {
		echo '<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->';
    	echo '<!-- WARNING: Respond.js doesn\'t work if you view the page via file:// -->';
    	echo '<!--[if lt IE 9]>';
      	echo '<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>';
      	echo '<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>';
    	echo '<![endif]-->';
	}
	add_action('wp_head', 'ie_scripts');
}	// end if.


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
* Load Bootstrap Menu.
*/
require get_template_directory() . '/inc/bootstrap-walker.php';

/**
* Comments Callback.
*/
require get_template_directory() . '/inc/comments-callback.php';

/**
* Author Meta.
*/
require get_template_directory() . '/inc/author-meta.php';
