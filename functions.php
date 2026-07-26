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
 * Return file modification time for cache-friendly asset versioning.
 *
 * @param string $relative_path Path relative to theme root.
 * @return string
 */
function tanki_asset_version( $relative_path ) {
	$file_path = TANKI_THEME_DIR . '/' . ltrim( $relative_path, '/' );

	if ( file_exists( $file_path ) ) {
		return (string) filemtime( $file_path );
	}

	return TANKI_THEME_VERSION;
}

/**
 * Theme setup.
 */
function tanki_setup() {
	load_theme_textdomain( 'tanki-online-news', TANKI_THEME_DIR . '/languages' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 80,
			'width'       => 240,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	set_post_thumbnail_size( 1200, 630, true );
	add_image_size( 'news-card', 400, 260, true );
	add_image_size( 'news-single', 1200, 630, true );
}
add_action( 'after_setup_theme', 'tanki_setup' );

/**
 * Enqueue theme styles and scripts on the frontend.
 */
function tanki_enqueue_assets() {
	wp_enqueue_style(
		'tanki-style',
		get_stylesheet_uri(),
		array(),
		tanki_asset_version( 'style.css' )
	);

	$main_css_path = TANKI_THEME_DIR . '/assets/css/main.css';

	if ( file_exists( $main_css_path ) ) {
		wp_enqueue_style(
			'tanki-main',
			TANKI_THEME_URI . '/assets/css/main.css',
			array( 'tanki-style' ),
			tanki_asset_version( 'assets/css/main.css' )
		);
	}

	$main_js_path = TANKI_THEME_DIR . '/assets/js/main.js';

	if ( file_exists( $main_js_path ) ) {
		wp_enqueue_script(
			'tanki-main',
			TANKI_THEME_URI . '/assets/js/main.js',
			array(),
			tanki_asset_version( 'assets/js/main.js' ),
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'tanki_enqueue_assets' );
