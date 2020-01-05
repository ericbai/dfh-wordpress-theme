<?php

if (!function_exists("dfh_setup_theme")) {
    function dfh_setup_theme() {
        // see https://developer.wordpress.org/themes/basics/theme-functions/#load-text-domain
        load_theme_textdomain(DFH_TEXT_DOMAIN, get_template_directory() . '/languages');
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
            'dfh-menu-nav' => esc_html__('Top-level navigation', DFH_TEXT_DOMAIN),
            'dfh-menu-footer' => esc_html__('Footer links', DFH_TEXT_DOMAIN),
        ));
        // so that the visual editor has the same styles as the theme
        // see https://developer.wordpress.org/block-editor/developers/themes/theme-support/#editor-styles
        add_theme_support('editor-styles');
        // see https://developer.wordpress.org/block-editor/developers/themes/theme-support/#enqueuing-the-editor-style
        add_editor_style('style.css');
    }
}
add_action('after_setup_theme', 'dfh_setup_theme');
