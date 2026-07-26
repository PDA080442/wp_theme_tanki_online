<?php
/**
 * Main query adjustments for news archive, home, and search.
 *
 * @package Tanki_Online_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Adjust the main frontend query for news archive, home, and search.
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

	if ( $query->is_search() ) {
		$query->set( 'post_type', 'tanki_news' );
		$query->set( 'posts_per_page', 12 );
		$query->set( 'orderby', 'date' );

		$order = isset( $_GET['order'] ) ? strtoupper( sanitize_text_field( wp_unslash( $_GET['order'] ) ) ) : 'DESC'; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$query->set( 'order', 'ASC' === $order ? 'ASC' : 'DESC' );

		$news_type = isset( $_GET['news_type'] ) ? sanitize_title( wp_unslash( $_GET['news_type'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( $news_type && 'all' !== $news_type ) {
			$query->set(
				'tax_query',
				array(
					array(
						'taxonomy' => 'news_type',
						'field'    => 'slug',
						'terms'    => $news_type,
					),
				)
			);
		}
	}
}
add_action( 'pre_get_posts', 'tanki_modify_main_query' );
