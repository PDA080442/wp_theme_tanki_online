<?php
/**
 * AJAX search endpoint and helpers.
 *
 * @package Tanki_Online_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Build WP_Query args for news search with optional filters.
 *
 * @param string $search    Search string.
 * @param string $order     ASC|DESC.
 * @param string $news_type Taxonomy slug or "all".
 * @return array
 */
function tanki_get_search_query_args( $search, $order = 'DESC', $news_type = 'all' ) {
	$order     = 'ASC' === strtoupper( $order ) ? 'ASC' : 'DESC';
	$news_type = sanitize_title( $news_type );

	$args = array(
		'post_type'              => 'tanki_news',
		'post_status'            => 'publish',
		'posts_per_page'         => 12,
		's'                      => $search,
		'orderby'                => 'date',
		'order'                  => $order,
		'ignore_sticky_posts'    => true,
		'no_found_rows'          => true,
		'update_post_meta_cache' => false,
	);

	if ( $news_type && 'all' !== $news_type ) {
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
 * Render search result items as HTML string.
 *
 * @param WP_Query $query Query with posts.
 * @return string
 */
function tanki_render_search_results_html( $query ) {
	if ( ! $query->have_posts() ) {
		return '<p class="search-popup__empty">' . esc_html__( 'Ничего не найдено', 'tanki-online-news' ) . '</p>';
	}

	ob_start();

	while ( $query->have_posts() ) {
		$query->the_post();
		get_template_part( 'template-parts/content', 'search-item' );
	}

	wp_reset_postdata();

	return (string) ob_get_clean();
}

/**
 * AJAX: search tanki_news and return HTML list.
 */
function tanki_ajax_search() {
	$search    = isset( $_GET['s'] ) ? sanitize_text_field( wp_unslash( $_GET['s'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$order     = isset( $_GET['order'] ) ? sanitize_text_field( wp_unslash( $_GET['order'] ) ) : 'DESC'; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$news_type = isset( $_GET['news_type'] ) ? sanitize_title( wp_unslash( $_GET['news_type'] ) ) : 'all'; // phpcs:ignore WordPress.Security.NonceVerification.Recommended

	if ( '' === trim( $search ) ) {
		wp_send_json_success(
			array(
				'html'  => '',
				'count' => 0,
			)
		);
	}

	$query = new WP_Query( tanki_get_search_query_args( $search, $order, $news_type ) );

	wp_send_json_success(
		array(
			'html'  => tanki_render_search_results_html( $query ),
			'count' => (int) $query->post_count,
		)
	);
}
add_action( 'wp_ajax_tanki_search', 'tanki_ajax_search' );
add_action( 'wp_ajax_nopriv_tanki_search', 'tanki_ajax_search' );
