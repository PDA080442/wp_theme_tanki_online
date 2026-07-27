<?php
/**
 * Archive template for tanki_news CPT.
 *
 * @package Tanki_Online_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$archive_title = post_type_archive_title( '', false );
if ( ! is_string( $archive_title ) || '' === $archive_title ) {
	$archive_title = __( 'Новости', 'tanki-online-news' );
}

get_template_part(
	'template-parts/content',
	'news-feed',
	array(
		'title' => $archive_title,
	)
);

get_footer();
