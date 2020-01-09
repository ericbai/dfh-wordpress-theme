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
function dfh_enqueue_script(string $handle, string $filename, array $deps = array()) {
    wp_enqueue_script(
        $handle,
        get_stylesheet_directory_uri() . '/' . $filename,
        $deps,
        // `filemtime` takes a file path NOT a url
        filemtime(get_stylesheet_directory() . '/' . $filename), // set version as file last modified time
        true
    );
}

// depth-first search for block by name given array of blocks in a post's content
// see https://developer.wordpress.org/reference/functions/parse_blocks/#user-contributed-notes
function dfh_get_block(string $block_name, array $blocks) {
    $found_block = null;
    foreach ($blocks as $block) {
        if ($found_block) {
            return $found_block;
        }
        if ($block_name == $block['blockName']) {
            $found_block = $block;
        }
        else if ($block['innerBlocks']) {
            $found_block = dfh_get_block($block_name, $block['innerBlocks']);
        }
    }
    return $found_block;
}

function dfh_pluralize(int $num, string $singular, string $plural) {
    return esc_html($num == 1 ? $singular : $plural);
}
