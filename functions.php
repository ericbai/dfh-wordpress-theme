<?php

if (!function_exists("dfh_setup_theme")) {
    function dfh_setup_theme() {
        // see https://developer.wordpress.org/themes/basics/theme-functions/#load-text-domain
        load_theme_textdomain('dfh', get_template_directory() . '/languages');
        // see https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
        add_theme_support('title-tag');
        // see https://developer.wordpress.org/reference/functions/add_theme_support/#custom-logo
        add_theme_support('custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ));
        // see https://developer.wordpress.org/block-editor/developers/themes/theme-support/#default-block-styles
        add_theme_support('wp-block-styles');
        // see https://developer.wordpress.org/block-editor/developers/themes/theme-support/#responsive-embedded-content
        add_theme_support('responsive-embeds');
        // see https://developer.wordpress.org/themes/basics/theme-functions/#navigation-menus
        register_nav_menus(array(
            'dfh-menu-nav' => esc_html__('Top-level navigation', 'dfh'),
            'dfh-menu-footer' => esc_html__('Footer links', 'dfh'),
        ));
    }
}
add_action('after_setup_theme', 'dfh_setup_theme');

/**
 * Enqueue scripts and styles.
 */
function dfh_load_files() {
    dfh_enqueue_style('dfh-style', 'style.css');
    dfh_enqueue_script('dfh-scripts', 'dist/main.js');
    // Use the version of jQuery bundled with WordPress for max compatibility
    // see https://wordpress.stackexchange.com/a/140310
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'dfh_load_files');

/**
 * Helper functions
 */
require get_template_directory() . '/inc/helpers.php';
