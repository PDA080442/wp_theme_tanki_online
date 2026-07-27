<?php
/**
 * Theme Customizer settings (footer images).
 *
 * @package Tanki_Online_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Customizer settings for footer images.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 */
function tanki_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'tanki_footer',
		array(
			'title'    => __( 'Футер', 'tanki-online-news' ),
			'priority' => 40,
		)
	);

	$wp_customize->add_setting(
		'tanki_footer_mascot',
		array(
			'default'           => 0,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Media_Control(
			$wp_customize,
			'tanki_footer_mascot',
			array(
				'label'     => __( 'Маскот футера', 'tanki-online-news' ),
				'section'   => 'tanki_footer',
				'mime_type' => 'image',
			)
		)
	);

	$wp_customize->add_setting(
		'tanki_footer_partner_logo',
		array(
			'default'           => 0,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Media_Control(
			$wp_customize,
			'tanki_footer_partner_logo',
			array(
				'label'     => __( 'Логотип партнёра (Alternativa)', 'tanki-online-news' ),
				'section'   => 'tanki_footer',
				'mime_type' => 'image',
			)
		)
	);
}
add_action( 'customize_register', 'tanki_customize_register' );

/**
 * Return HTML for a footer image from Customizer or theme default.
 *
 * @param string $setting_id Theme mod key (attachment ID).
 * @param string $default_relative Default image path relative to theme root.
 * @param string $class CSS class for the <img>.
 * @param string $alt Alt text.
 * @return string
 */
function tanki_get_footer_image_html( $setting_id, $default_relative, $class, $alt = '' ) {
	$attachment_id = (int) get_theme_mod( $setting_id, 0 );

	if ( $attachment_id ) {
		$html = wp_get_attachment_image(
			$attachment_id,
			'full',
			false,
			array(
				'class' => $class,
				'alt'   => $alt,
			)
		);

		if ( $html ) {
			return $html;
		}
	}

	$src = TANKI_THEME_URI . '/' . ltrim( $default_relative, '/' );

	return sprintf(
		'<img class="%1$s" src="%2$s" alt="%3$s" decoding="async" />',
		esc_attr( $class ),
		esc_url( $src ),
		esc_attr( $alt )
	);
}
