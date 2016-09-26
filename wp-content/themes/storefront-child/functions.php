<?php

add_action( 'init', 'custom_remove_footer_credit', 10 );

function custom_remove_footer_credit () {
    remove_action( 'storefront_footer', 'storefront_credit', 20 );
    add_action( 'storefront_footer', 'custom_storefront_credit', 20 );
} 

function custom_storefront_credit() {
	?>
	<div class="site-info">
		&copy; <?php echo ' ' . get_the_date( 'Y' ) . ' - Tim Veedahl'; ?>
	</div><!-- .site-info -->
	<?php
}

function site_favicon() {
	echo '<link rel="Shortcut Icon" type="image/x-icon" href="' . get_bloginfo('stylesheet_directory') . '/favicon.ico" />' . "\n";
}
add_action('wp_head', 'site_favicon');

function enqueue_child_theme_styles() {
	//enqueue my child theme stylesheet
	wp_enqueue_style('child-style', get_stylesheet_uri(), array('theme'));

	//enqueue bootstrap in the child theme 
	wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri().'/javascripts/bootstrap.min.js', array('jquery'), NULL, true);
	wp_enqueue_style('main-css', get_stylesheet_directory_uri().'/stylesheets/main.css', false, NULL, 'all');
}
add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);