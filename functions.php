<?php

define('DFH_MENU_HEADER', 'dfh_menu_nav');
define('DFH_MENU_FOOTER', 'dfh_menu_footer');
define('DFH_THEME_MOD_FOOTER_CONTENT', 'dfh_footer_content');

// Can be defined by either the Docs for Health theme or plugin
if (!defined('DFH_TEXT_DOMAIN')) {
    define('DFH_TEXT_DOMAIN', 'dfh');
}
if (!defined('DFH_CONTENT_TYPE_RESOURCE')) {
    define('DFH_CONTENT_TYPE_RESOURCE', 'dfh_resource');
}
if (!defined('DFH_TAXONOMY_RESOURCE')) {
    define('DFH_TAXONOMY_RESOURCE', 'dfh_resource_classification');
}

// Theme files
require_once get_template_directory() . '/src/php/helpers.php';
require_once get_template_directory() . '/src/php/load_deps.php';
require_once get_template_directory() . '/src/php/setup_customizer.php';
require_once get_template_directory() . '/src/php/setup_theme.php';

// External dependencies for adding TinyMCE editor to customizer
require_once get_template_directory() . '/src/php/vendor/skyrocket_customizer.php';
