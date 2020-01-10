<?php

// Add badge to indicate which page is designated the Resources Overview page
// see https://wordpress.stackexchange.com/a/240088
// see https://developer.wordpress.org/reference/hooks/display_post_states/
add_filter('display_post_states', 'dfh_post_states', 10, 2);
function dfh_post_states($states, $post) {
    // Badge for resource overview page
    $resource_overview_page_id = get_theme_mod(DFH_THEME_MOD_RESOURCE_OVERVIEW_LOCATION);
    if ($resource_overview_page_id &&
        $post->post_type == 'page' &&
        $post->ID == $resource_overview_page_id) {
        $states[] = __('Resource Overview Page', DFH_TEXT_DOMAIN);
    }
    // Badge for toolkit overview page
    $toolkit_overview_page_id = get_theme_mod(DFH_THEME_MOD_TOOLKIT_OVERVIEW_LOCATION);
    if ($toolkit_overview_page_id &&
        $post->post_type == 'page' &&
        $post->ID == $toolkit_overview_page_id) {
        $states[] = __('Toolkit Overview Page', DFH_TEXT_DOMAIN);
    }
    return $states;
}
