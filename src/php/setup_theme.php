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
        // https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-custom-colors-in-block-color-palettes
        add_theme_support('disable-custom-colors');
        // Custom colors here need to be manually reflected in `_custom-colors.scss`
        // https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-color-palettes
        add_theme_support('editor-color-palette',  array(
            // Seafoam
            array(
                'name'  => __('Seafoam Dark 3', DFH_TEXT_DOMAIN),
                'slug'  => 'dfh-seafoam-dark-3',
                'color' => '#88c8b6',
            ),
            array(
                'name'  => __('Seafoam Dark 2', DFH_TEXT_DOMAIN),
                'slug'  => 'dfh-seafoam-dark-2',
                'color' => '#aed6c9',
            ),
            array(
                'name'  => __('Seafoam Dark 1', DFH_TEXT_DOMAIN),
                'slug'  => 'dfh-seafoam-dark-1',
                'color' => '#d1e6df',
            ),
            array(
                'name'  => __('Seafoam', DFH_TEXT_DOMAIN),
                'slug'  => 'dfh-seafoam',
                'color' => '#f2f7f5',
            ),
            // Gold
            array(
                'name'  => __('Gold Dark 1', DFH_TEXT_DOMAIN),
                'slug'  => 'dfh-gold-dark-1',
                'color' => '#b7a175',
            ),
            array(
                'name'  => __('Gold', DFH_TEXT_DOMAIN),
                'slug'  => 'dfh-gold',
                'color' => '#f2dfb9',
            ),
            array(
                'name'  => __('Gold Light 1', DFH_TEXT_DOMAIN),
                'slug'  => 'dfh-gold-light-1',
                'color' => '#f9f0df',
            ),
            array(
                'name'  => __('Gold Light 2', DFH_TEXT_DOMAIN),
                'slug'  => 'dfh-gold-light-2',
                'color' => '#fdfaf3',
            ),
            // Gray
            array(
                'name'  => __('Gray Dark 1', DFH_TEXT_DOMAIN),
                'slug'  => 'dfh-gray-dark-1',
                'color' => '#333333',
            ),
            array(
                'name'  => __('Gray', DFH_TEXT_DOMAIN),
                'slug'  => 'dfh-gray',
                'color' => '#595959',
            ),
            array(
                'name'  => __('Gray Light 1', DFH_TEXT_DOMAIN),
                'slug'  => 'dfh-gray-light-1',
                'color' => '#e5e5e5',
            ),
            // Navy
            array(
                'name'  => __('Navy', DFH_TEXT_DOMAIN),
                'slug'  => 'dfh-navy',
                'color' => '#345980',
            ),
            array(
                'name'  => __('Navy Light 1', DFH_TEXT_DOMAIN),
                'slug'  => 'dfh-navy-light-1',
                'color' => '#8fabc7',
            ),
            array(
                'name'  => __('Navy Light 2', DFH_TEXT_DOMAIN),
                'slug'  => 'dfh-navy-light-2',
                'color' => '#eaeff4',
            ),
        ));
    }
}
add_action('after_setup_theme', 'dfh_setup_theme');
