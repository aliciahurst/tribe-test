<?php
/**
 * test-theme functions and definitions
 *
 * @package test-theme
 */

// A lot of this is not needed in the trial theme, but I am leaving it in because it's standard Underscores and doesn't affect what I'm doing.

if ( ! function_exists( 'test_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function test_theme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on test-theme, use a find and replace
	 * to change 'test-theme' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'test-theme', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'test-theme' ),
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

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'test_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // test_theme_setup
add_action( 'after_setup_theme', 'test_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function test_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'test_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'test_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function test_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'test-theme' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'test_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function test_theme_scripts() {
	wp_enqueue_style('google-fonts', 'http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900');

	wp_enqueue_style( 'test-theme-style', get_stylesheet_uri() );

	wp_enqueue_style( 'vanilla-style', get_template_directory_uri() . '/vanilla.css' ); // normally would be doing Sass but this is quick

	wp_deregister_script('jquery'); // load in google's jquery
    wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", array(), '', true);
    wp_enqueue_script('jquery');

	wp_enqueue_script( 'test-theme-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20120206', true ); // standard packaged with underscores 

	wp_enqueue_script( 'test-theme-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20130115', true ); // standard packaged with underscores

	wp_enqueue_script( 'js-masonry', get_template_directory_uri() . '/assets/js/masonry.pkgd.min.js', array(), '', true); // Masonry

	wp_enqueue_script( 'infinite-scroll', get_template_directory_uri() . '/assets/js/jquery.infinitescroll.min.js', array(), '', true); // Infinite Scroll

	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	//	wp_enqueue_script( 'comment-reply' ); // Don't need this for the trial project, usually would use Disqus and delete this anyway
	// }
}
add_action( 'wp_enqueue_scripts', 'test_theme_scripts' );

// Don't need any of the below for this project, but it's standard in Underscores so I usually just comment it out
// /**
//  * Implement the Custom Header feature.
//  */
// require get_template_directory() . '/inc/custom-header.php';

// /**
//  * Custom template tags for this theme.
//  */
// require get_template_directory() . '/inc/template-tags.php';

// *
//  * Custom functions that act independently of the theme templates.
 
// require get_template_directory() . '/inc/extras.php';

// /**
//  * Customizer additions.
//  */
// require get_template_directory() . '/inc/customizer.php';

// /**
//  * Load Jetpack compatibility file.
//  */
// require get_template_directory() . '/inc/jetpack.php';


// Remove admin bar for now, I do this on every project, can be removed for production
add_filter('show_admin_bar', '__return_false');

// Custom read more link, default says "Continue Reading"
add_filter( 'the_content_more_link', 'modify_read_more_link' );
function modify_read_more_link() {
return '<a class="more-link" href="' . get_permalink() . '">Read More</a>';
}

// Clean up versioning of scripts and styles
function ewp_remove_script_version( $src ){
	return remove_query_arg( 'ver', $src );
}
add_filter( 'script_loader_src', 'ewp_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', 'ewp_remove_script_version', 15, 1 );

// Remove edit post link
add_filter( 'edit_post_link', '__return_false' );

// Add ID to page navivation for infinite scroll
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');
function posts_link_attributes() {
    return 'id="next"';
};