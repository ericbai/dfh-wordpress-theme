<?php

// For tutorial of the Wordpress Customizer API
// see https://premium.wpmudev.org/blog/wordpress-theme-customizer-guide/
// see https://developer.wordpress.org/themes/customize-api/

// see https://developer.wordpress.org/reference/hooks/customize_register/
add_action('customize_register', 'dfh_theme_customizer_settings');
function dfh_theme_customizer_settings($wp_customize) {
    $section_footer = 'dfh_footer_settings';

    // see https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
    $wp_customize->add_section($section_footer, array(
        'title'       => __('Footer Settings', DFH_TEXT_DOMAIN),
        'description' => __('Customize the content of the footer', DFH_TEXT_DOMAIN),
        'priority'    => 125, // place right underneath `Homepage Settings`
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
          'label'   => __('Footer content', DFH_TEXT_DOMAIN),
          'section' => $section_footer,
          'setting' => DFH_THEME_MOD_FOOTER_CONTENT,
       )
    ));
}

// to enable live preview
// see https://developer.wordpress.org/reference/hooks/customize_preview_init/
add_action('customize_preview_init', 'dfh_customizer_preview');
function dfh_customizer_preview() {
  dfh_enqueue_script(
      'dfh_customizer_preview',
      'src/js/customizer.js',
      array('jquery','customize-preview'),
  );
}
