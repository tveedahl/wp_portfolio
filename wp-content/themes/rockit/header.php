<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Rockit
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link rel="shortcut icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/favicon.ico" type="image/x-icon"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'rockit'); ?></a>
    <header id="masthead" class="site-header" role="banner">
        <div class="navbar-wrapper">
            <div class="container">
                <nav class="navbar navbar-inverse navbar-static-top">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?php echo home_url(); ?>"><?php the_custom_logo(); ?></a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <?php 
                                wp_nav_menu( array( 
                                    'menu' => 'rockit-menu',
                                    'menu_class' => 'nav navbar-nav' 
                                ) ); 
                            ?>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <div id="content" class="site-content">
