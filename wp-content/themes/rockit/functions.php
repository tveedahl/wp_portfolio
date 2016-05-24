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
	load_theme_textdomain( 'rockit', get_template_directory() . '/languages' );

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

	wp_enqueue_script( 'rockit-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'rockit-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rockit_scripts' );

/**
 * Disable WordPress Admin Bar for all users but admins.
 */
show_admin_bar(false);

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
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // This is an example of how to include a plugin bundled with a theme.
        array(
            'name'               => 'Contact Form 7', // The plugin name.
            'slug'               => 'contact-form-7', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/plugins/contact-form-7.4.2.2.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),
		array(
            'name'               => 'Add Meta Tags', // The plugin name.
            'slug'               => 'add-meta-tags', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/plugins/add-meta-tags.2.11.3.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        )
    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => ''                      // Message to output right before the plugins table.
        /*'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'theme-slug' ),
            'menu_title'                      => __( 'Install Plugins', 'theme-slug' ),
            'installing'                      => __( 'Installing Plugin: %s', 'theme-slug' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'theme-slug' ),
            'notice_can_install_required'     => _n_noop(
                'This theme requires the following plugin: %1$s.',
                'This theme requires the following plugins: %1$s.',
                'theme-slug'
            ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop(
                'This theme recommends the following plugin: %1$s.',
                'This theme recommends the following plugins: %1$s.',
                'theme-slug'
            ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop(
                'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
                'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
                'theme-slug'
            ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop(
                'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
                'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
                'theme-slug'
            ), // %1$s = plugin name(s).
            'notice_ask_to_update_maybe'      => _n_noop(
                'There is an update available for: %1$s.',
                'There are updates available for the following plugins: %1$s.',
                'theme-slug'
            ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop(
                'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
                'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
                'theme-slug'
            ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop(
                'The following required plugin is currently inactive: %1$s.',
                'The following required plugins are currently inactive: %1$s.',
                'theme-slug'
            ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop(
                'The following recommended plugin is currently inactive: %1$s.',
                'The following recommended plugins are currently inactive: %1$s.',
                'theme-slug'
            ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop(
                'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
                'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
                'theme-slug'
            ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop(
                'Begin installing plugin',
                'Begin installing plugins',
                'theme-slug'
            ),
            'update_link' 					  => _n_noop(
                'Begin updating plugin',
                'Begin updating plugins',
                'theme-slug'
            ),
            'activate_link'                   => _n_noop(
                'Begin activating plugin',
                'Begin activating plugins',
                'theme-slug'
            ),
            'return'                          => __( 'Return to Required Plugins Installer', 'theme-slug' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'theme-slug' ),
            'activated_successfully'          => __( 'The following plugin was activated successfully:', 'theme-slug' ),
            'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'theme-slug' ),  // %1$s = plugin name(s).
            'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'theme-slug' ),  // %1$s = plugin name(s).
            'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'theme-slug' ), // %s = dashboard link.
            'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'tgmpa' ),

            'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        ),*/
    );

    tgmpa($plugins, $config);
}

/**
 * Programmatically create necessary site pages
*/

/**
 * Setup a function to check if these pages exist
 */
function the_slug_exists($post_name) {
    global $wpdb;
    if($wpdb->get_row("SELECT post_name FROM wp_posts WHERE post_name = '" . $post_name . "'", 'ARRAY_A')) {
        return true;
    } else {
        return false;
    }
}

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
    if (!isset($blog_page_check->ID) && !the_slug_exists('about')) {
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
    if (!isset($blog_page_check->ID) && !the_slug_exists('contact')) {
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

