<?php

// Load header template
// see https://developer.wordpress.org/reference/functions/get_header/
get_header();
while (have_posts()) {
    // Iterate the post index in the loop
    // see https://developer.wordpress.org/reference/functions/the_post/
    the_post();
    // Display the content only. Note that we do not want to display the title
    // https://developer.wordpress.org/reference/functions/the_content/
    the_content();
}
// Load footer template
// https://developer.wordpress.org/reference/functions/get_footer/
get_footer();
