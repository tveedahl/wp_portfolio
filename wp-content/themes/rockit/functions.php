<?php
/**
 * Rockit functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package Rockit
 */

if ( ! function_exists( 'rockit_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rockit_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Rockit, use a find and replace
	 * to change 'rockit' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'tgmpa', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary Menu', 'rockit' ),
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
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'rockit_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // rockit_setup
add_action( 'after_setup_theme', 'rockit_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rockit_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rockit_content_width', 640 );
}
add_action( 'after_setup_theme', 'rockit_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rockit_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'rockit' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'rockit_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rockit_scripts() {
	wp_enqueue_style( 'rockit-style', get_stylesheet_uri() );

	wp_enqueue_style( 'rockit-main', get_template_directory_uri() . '/stylesheets/main.css' );

	wp_enqueue_style( 'rockit-font-awesome', get_template_directory_uri() . '/stylesheets/font-awesome.min.css' );

	wp_enqueue_script( 'rockit-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'rockit-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'rockit-jquery', get_template_directory_uri() . '/js/jquery-3.4.1.min.js' );

	wp_enqueue_script( 'rockit-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rockit_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
* Check if necessary theme plugins are installed, show error messages otherwise
*/
function rockit_showAdminMessages()
{
	$plugin_messages = array();
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    // Download the Meta Tag Manager plugin
	if(!is_plugin_active( 'meta-tag-manager/meta-tag-manager.php' ))
	{
		$plugin_messages[] = 'This theme requires you to install the Meta Tag Manager plugin, <a href="https://wordpress.org/plugins-wp/meta-tag-manager/" target="_blank">download it from here</a>.';
	}
	// Download the Contact Form 7 plugin
	if(!is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ))
	{
		$plugin_messages[] = 'This theme requires you to install the Contact Form 7 plugin, <a href="https://wordpress.org/plugins-wp/contact-form-7/" target="_blank">download it from here</a>.';
	}
    // Download the Google Analyticator plugin
	if(!is_plugin_active( 'google-analyticator/google-analyticator.php' ))
	{
		$plugin_messages[] = 'This theme requires you to install the Google Analyticator plugin, <a href="https://wordpress.org/plugins-wp/google-analyticator/" target="_blank">download it from here</a>.';
	}
	if(count($plugin_messages) > 0)
	{
        foreach($plugin_messages as $message)
        {
            echo '<div class="notice notice-error is-dismissible"><p>'. $message . '</p></div>';
        }
	}
}
add_action('admin_notices', 'rockit_showAdminMessages');

/**
 * Setup a function to check if these pages exist
 */
/*function rockit_the_slug_exists($post_name) {
    global $rockit_wpdb;
    if($rockit_wpdb->get_row("SELECT post_name FROM wp_posts WHERE post_name = '" . $post_name . "'", 'ARRAY_A')) {
        return true;
    } else {
        return false;
    }
}*/

/**
 * Create the About page
 */
if (isset($_GET['activated']) && is_admin()) {
    $blog_page_title = 'About';
    //$blog_page_content = 'This is blog page placeholder. Anything you enter here will not appear in the front end, except for search results pages.';
    $blog_page_check = get_page_by_title($blog_page_title);
    $blog_page = array(
        'post_type' => 'page',
        'post_title' => $blog_page_title,
        //'post_content' => $blog_page_content,
        'post_status' => 'publish',
        //'post_author' => 1,
        'post_slug' => 'blog'
    );
    /*if (!isset($blog_page_check->ID) && !rockit_the_slug_exists('about')) {
        $blog_page_id = wp_insert_post($blog_page);
    }*/
    if (!isset($blog_page_check->ID)) {
        $blog_page_id = wp_insert_post($blog_page);
    }
}

/**
 * Create the Contact page
 */
if (isset($_GET['activated']) && is_admin()) {
    $blog_page_title = 'Contact';
    //$blog_page_content = 'This is blog page placeholder. Anything you enter here will not appear in the front end, except for search results pages.';
    $blog_page_check = get_page_by_title($blog_page_title);
    $blog_page = array(
        'post_type' => 'page',
        'post_title' => $blog_page_title,
        //'post_content' => $blog_page_content,
        'post_status' => 'publish',
        //'post_author' => 1,
        'post_slug' => 'blog'
    );
    /*if (!isset($blog_page_check->ID) && !rockit_the_slug_exists('contact')) {
        $blog_page_id = wp_insert_post($blog_page);
    }*/
    if (!isset($blog_page_check->ID)) {
        $blog_page_id = wp_insert_post($blog_page);
    }
}

/**
 * Checks if blog category exists, and creates it otherwise
 */
$term = term_exists('Blog', 'category');
if ($term !== 0 && $term !== null) {
} else {
    /**
     * Blog category does not exist -- create it
     */
    $parent_term = term_exists( 'Blog', 'category' ); // array is returned if taxonomy is given
    $parent_term_id = $parent_term['term_id']; // get numeric term id
    wp_insert_term(
        'Blog', // the term
        'category', // the taxonomy
        array(
            'description'=> 'A category to which blog posts can be assigned',
            'slug' => 'blog',
            'parent'=> $parent_term_id
        )
    );
}
