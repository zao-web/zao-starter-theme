<?php
/**
 * Core setup, site hooks and filters.
 *
 * @package ThemeScaffold\Core
 */

namespace ZaoStarterTheme\Core;

/**
 * Set up theme defaults and register supported WordPress features.
 *
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'after_setup_theme', $n( 'i18n' ) );
	add_action( 'after_setup_theme', $n( 'theme_setup' ) );
	add_action( 'wp_enqueue_scripts', $n( 'scripts' ) );
	add_action( 'wp_enqueue_scripts', $n( 'styles' ) );
}

/**
 * Makes Theme available for translation.
 *
 * Translations can be added to the /languages directory.
 * If you're building a theme based on "zao-starter-theme", change the
 * filename of '/languages/ZaoStarterTheme.pot' to the name of your project.
 *
 * @return void
 */
function i18n() {
	load_theme_textdomain( 'zao-starter-theme', ZAO_STARTERTHEME_PATH . '/languages' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function theme_setup() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5', array(
			'search-form',
			'gallery',
		)
	);

	// This theme uses wp_nav_menu() in three locations.
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'tenup' ),
		)
	);
}

/**
 * Enqueue scripts for front-end.
 *
 * @return void
 */
function scripts() {

	wp_enqueue_script(
		'frontend',
		ZAO_STARTERTHEME_TEMPLATE_URL . '/dist/js/frontend.min.js',
		[],
		ZAO_STARTERTHEME_VERSION,
		true
	);

}

/**
 * Enqueue styles for front-end.
 *
 * @return void
 */
function styles() {

	wp_enqueue_style(
		'styles',
		ZAO_STARTERTHEME_TEMPLATE_URL . '/dist/css/style.min.css',
		[],
		ZAO_STARTERTHEME_VERSION
	);

	if ( is_page_template( 'templates/page-styleguide.php' ) ) {
		wp_enqueue_style(
			'styleguide',
			ZAO_STARTERTHEME_TEMPLATE_URL . '/dist/css/styleguide.min.css',
			[],
			ZAO_STARTERTHEME_VERSION
		);
	}
}
