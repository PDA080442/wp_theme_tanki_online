<?php
/**
 * Main query adjustments for news archive, home, and search.
 *
 * @package Tanki_Online_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** Posts per page on home / news archive (Load More after first page). */
if ( ! defined( 'TANKI_FEED_POSTS_PER_PAGE' ) ) {
	define( 'TANKI_FEED_POSTS_PER_PAGE', 12 );
}

/**
 * Valid news_type slugs for feed/search filters.
 *
 * @return string[]
 */
function tanki_get_news_type_filter_slugs() {
	return array( 'all', 'novost', 'video' );
}

/**
 * Read and validate news_type from request (GET or POST).
 *
 * @param string|null $raw Optional raw value; defaults to $_REQUEST['news_type'].
 * @return string all|novost|video
 */
function tanki_get_feed_news_type_filter( $raw = null ) {
	if ( null === $raw ) {
		$query_var = get_query_var( 'news_type' );
		if ( is_string( $query_var ) && '' !== $query_var ) {
			$raw = sanitize_title( $query_var );
		} elseif ( isset( $_REQUEST['news_type'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$raw = sanitize_title( wp_unslash( $_REQUEST['news_type'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		} else {
			$raw = 'all';
		}
	} else {
		$raw = sanitize_title( $raw );
	}

	if ( ! in_array( $raw, tanki_get_news_type_filter_slugs(), true ) ) {
		return 'all';
	}

	return $raw;
}

/**
 * Apply feed sort, status, and optional taxonomy filter to a query.
 *
 * @param WP_Query $query Query instance.
 * @param string   $news_type Optional filter slug; defaults to request.
 */
function tanki_apply_feed_query_settings( $query, $news_type = null ) {
	if ( null === $news_type ) {
		$news_type = tanki_get_feed_news_type_filter();
	} else {
		$news_type = tanki_get_feed_news_type_filter( $news_type );
	}

	$query->set( 'orderby', 'date' );
	$query->set( 'order', 'DESC' );
	$query->set( 'has_password', false );

	if ( 'all' !== $news_type ) {
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

/**
 * Build WP_Query args for feed / load-more (same rules as main query).
 *
 * @param int    $page      Page number.
 * @param string $news_type Filter slug or "all".
 * @return array
 */
function tanki_get_feed_query_args( $page = 1, $news_type = 'all' ) {
	$news_type = tanki_get_feed_news_type_filter( $news_type );

	$args = array(
		'post_type'           => 'tanki_news',
		'post_status'         => 'publish',
		'posts_per_page'      => TANKI_FEED_POSTS_PER_PAGE,
		'paged'               => max( 1, (int) $page ),
		'orderby'             => 'date',
		'order'               => 'DESC',
		'has_password'        => false,
		'ignore_sticky_posts' => true,
	);

	if ( 'all' !== $news_type ) {
		$args['tax_query'] = array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
			array(
				'taxonomy' => 'news_type',
				'field'    => 'slug',
				'terms'    => $news_type,
			),
		);
	}

	return $args;
}

/**
 * Base URL for feed type filter links (home or archive).
 *
 * @return string
 */
function tanki_get_feed_filter_base_url() {
	if ( is_post_type_archive( 'tanki_news' ) ) {
		$url = get_post_type_archive_link( 'tanki_news' );
		return $url ? $url : home_url( '/news/' );
	}

	return home_url( '/' );
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
		$query->set( 'posts_per_page', TANKI_FEED_POSTS_PER_PAGE );
		tanki_apply_feed_query_settings( $query );
	}

	if ( $query->is_home() ) {
		$query->set( 'post_type', 'tanki_news' );
		$query->set( 'posts_per_page', TANKI_FEED_POSTS_PER_PAGE );
		tanki_apply_feed_query_settings( $query );
	}

	if ( $query->is_search() ) {
		$query->set( 'post_type', 'tanki_news' );
		$query->set( 'posts_per_page', 12 );
		$query->set( 'orderby', 'date' );

		$order = isset( $_GET['order'] ) ? strtoupper( sanitize_text_field( wp_unslash( $_GET['order'] ) ) ) : 'DESC'; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$query->set( 'order', 'ASC' === $order ? 'ASC' : 'DESC' );

		$news_type = tanki_get_feed_news_type_filter();
		if ( 'all' !== $news_type ) {
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
