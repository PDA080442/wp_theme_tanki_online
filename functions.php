<?php
/**
 * Tanki Online News — functions and definitions.
 *
 * @package Tanki_Online_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'TANKI_THEME_VERSION', '1.0.0' );
define( 'TANKI_THEME_DIR', get_template_directory() );
define( 'TANKI_THEME_URI', get_template_directory_uri() );

/**
 * Theme setup.
 */
function tanki_setup() {
	load_theme_textdomain( 'tanki-online-news', TANKI_THEME_DIR . '/languages' );
}
add_action( 'after_setup_theme', 'tanki_setup' );
