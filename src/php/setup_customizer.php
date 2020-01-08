<?php

// For tutorial of the Wordpress Customizer API
// see https://premium.wpmudev.org/blog/wordpress-theme-customizer-guide/
// see https://developer.wordpress.org/themes/customize-api/

// see https://developer.wordpress.org/reference/hooks/customize_register/
// see https://developer.wordpress.org/reference/classes/wp_customize_manager/
add_action('customize_register', 'dfh_theme_customizer_settings');
function dfh_theme_customizer_settings($wp_customize) {
    $section_footer = 'dfh_footer_settings';
    $section_page_locations = 'static_front_page';

    // Remove `Page for Posts` control because this theme does not use posts
    $wp_customize->remove_control('page_for_posts');
    // Do not let users add custom CSS
    $wp_customize->remove_section('custom_css');

    // Renamve `Homepage Settings` to `Page Location Settings`
    $section_page_locations_obj = $wp_customize->get_section($section_page_locations);
    $section_page_locations_obj->title = __('Page Locations', DFH_TEXT_DOMAIN);
    $section_page_locations_obj->description = __('Specify where key pages are located in this website', DFH_TEXT_DOMAIN);

    // Force users to choose a static front page by setting the option then removing the control
    // see https://codex.wordpress.org/Option_Reference
    update_option('show_on_front', 'page');
    $wp_customize->remove_control('show_on_front');

    // Allow specifying which page is the Resource Overview page so that our resource blocks
    // know how to get back to the overview page without having the user specify each time
    // see https://developer.wordpress.org/reference/classes/wp_customize_manager/add_setting/
    $wp_customize->add_setting(DFH_THEME_MOD_RESOURCE_OVERVIEW_LOCATION, array());
    $wp_customize->add_control('dfh_resource_overview_location', array(
        'section'        => $section_page_locations,
        'setting'        => DFH_THEME_MOD_RESOURCE_OVERVIEW_LOCATION,
        'label'          => __('Resource overview page', DFH_TEXT_DOMAIN),
        'type'           => 'dropdown-pages',
        'allow_addition' => true,
    ));

    // Allow specifying which page is the Toolkit Overview page so that our toolkit detail
    // know how to get back to the overview page without having the user specify each time
    // see https://developer.wordpress.org/reference/classes/wp_customize_manager/add_setting/
    $wp_customize->add_setting(DFH_THEME_MOD_TOOLKIT_OVERVIEW_LOCATION, array());
    $wp_customize->add_control('dfh_toolkit_overview_location', array(
        'section'        => $section_page_locations,
        'setting'        => DFH_THEME_MOD_TOOLKIT_OVERVIEW_LOCATION,
        'label'          => __('Toolkit overview page', DFH_TEXT_DOMAIN),
        'type'           => 'dropdown-pages',
        'allow_addition' => true,
    ));

    // Add a section to manage footer content
    // see https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
    $wp_customize->add_section($section_footer, array(
        'title'       => __('Footer Content', DFH_TEXT_DOMAIN),
        'description' => __('Update the content of the footer', DFH_TEXT_DOMAIN),
        'priority'    => 125, // place right underneath `Page Locations`
    ));
    // see https://developer.wordpress.org/reference/classes/wp_customize_manager/add_setting/
    $wp_customize->add_setting(DFH_THEME_MOD_FOOTER_CONTENT, array(
        'transport' => 'postMessage', // for Javascript live updating
        'default'   => DFH_THEME_MOD_FOOTER_CONTENT_DEFAULT,
    ));
    // Custom vendor addition from Skyrocket
    // see https://maddisondesigns.com/2017/05/the-wordpress-customizer-a-developers-guide-part-2/#tinymceeditor
    // see https://developer.wordpress.org/reference/classes/wp_customize_manager/add_control/
    $wp_customize->add_control(new Skyrocket_TinyMCE_Custom_control(
        $wp_customize,
        'dfh_footer_content',
        array(
            'section' => $section_footer,
            'setting' => DFH_THEME_MOD_FOOTER_CONTENT,
            'label'   => __('Footer content', DFH_TEXT_DOMAIN),
        )
    ));
}

// To enable live preview
// see https://developer.wordpress.org/reference/hooks/customize_preview_init/
add_action('customize_preview_init', 'dfh_customizer_preview');
function dfh_customizer_preview() {
    dfh_enqueue_script(
        'dfh_customizer_preview',
        'src/js/customizer.js',
        array('jquery','customize-preview'),
    );
}
