<?php
/**
 * WP Theme constants and setup functions
 *
 * @package ZaoStarterTheme
 */

// Useful global constants.
define( 'ZAO_STARTERTHEME_VERSION', '0.1.0' );
define( 'ZAO_STARTERTHEME_TEMPLATE_URL', get_template_directory_uri() );
define( 'ZAO_STARTERTHEME_PATH', get_template_directory() . '/' );
define( 'ZAO_STARTERTHEME_INC', ZAO_STARTERTHEME_PATH . 'includes/' );

require_once ZAO_STARTERTHEME_INC . 'core.php';
require_once ZAO_STARTERTHEME_INC . 'helpers.php';
require_once ZAO_STARTERTHEME_INC . 'classes/class-zao-nav-walker.php';
require_once ZAO_STARTERTHEME_INC . 'classes/class-zao-comment-walker.php';
require_once ZAO_STARTERTHEME_INC . 'body-class-adjustment.php';
require_once ZAO_STARTERTHEME_INC . 'template-tags.php';

// Run the setup functions.
ZaoStarterTheme\Core\setup();

// Require Composer autoloader if it exists.
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once 'vendor/autoload.php';
}
