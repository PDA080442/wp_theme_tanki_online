<?php
/**
 * Main query adjustments for news archive and home.
 *
 * @package Tanki_Online_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Adjust the main frontend query for news archive and home.
 *
 * @param WP_Query $query Query instance.
 */
function tanki_modify_main_query( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}

	if ( $query->is_post_type_archive( 'tanki_news' ) ) {
		$query->set( 'posts_per_page', 12 );
	}

	if ( $query->is_home() ) {
		$query->set( 'post_type', 'tanki_news' );
	}
}
add_action( 'pre_get_posts', 'tanki_modify_main_query' );
