<?php

// Note `get_stylesheet_*` is aware of child themes, `get_template_*` is not
// see https://wordpress.stackexchange.com/a/114282

// https://developer.wordpress.org/reference/functions/wp_enqueue_style/
function dfh_enqueue_style(string $handle, string $filename) {
    wp_enqueue_style(
        $handle,
        get_stylesheet_directory_uri() . '/' . $filename,
        array(),
        // `filemtime` takes a file path NOT a url
        filemtime(get_stylesheet_directory() . '/' . $filename) // set version as file last modified time
    );
}

// https://developer.wordpress.org/reference/functions/wp_enqueue_script/
function dfh_enqueue_script(string $handle, string $filename) {
    wp_enqueue_script(
        $handle,
        get_stylesheet_directory_uri() . '/' . $filename,
        array(),
        // `filemtime` takes a file path NOT a url
        filemtime(get_stylesheet_directory() . '/' . $filename), // set version as file last modified time
        true
    );
}
