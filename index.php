<?php
/**
 * Main template (fallback).
 *
 * @package Tanki_Online_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

get_template_part(
	'template-parts/content',
	'news-feed',
	array(
		'title' => __( 'Новости', 'tanki-online-news' ),
	)
);

get_footer();
