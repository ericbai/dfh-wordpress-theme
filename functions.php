<?php

define('DFH_MENU_HEADER', 'dfh-menu-nav');
define('DFH_MENU_FOOTER', 'dfh-menu-footer');

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

// External dependencies for adding TinyMCE editor to customizer
require_once get_template_directory() . '/vendor/php/skyrocket_customizer.php';

// Theme files
require_once get_template_directory() . '/php/helpers.php';
require_once get_template_directory() . '/php/load_deps.php';
require_once get_template_directory() . '/php/setup_customizer.php';
require_once get_template_directory() . '/php/setup_theme.php';
