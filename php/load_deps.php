<?php

add_action('wp_enqueue_scripts', 'dfh_load_theme_files');
function dfh_load_theme_files() {
    dfh_enqueue_style('dfh-theme-style', 'style.css');
    dfh_enqueue_script('dfh-theme-scripts', 'dist/main.js');
    // Use the version of jQuery bundled with WordPress for max compatibility
    // see https://wordpress.stackexchange.com/a/140310
    wp_enqueue_script('jquery');
}
