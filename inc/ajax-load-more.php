<?php
/**
 * AJAX: load more news cards for the feed.
 *
 * @package Tanki_Online_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Handle load-more request: return HTML for the next page of tanki_news.
 */
function tanki_ajax_load_more_news() {
	check_ajax_referer( 'tanki_load_more', 'nonce' );

	$page = isset( $_POST['page'] ) ? absint( $_POST['page'] ) : 0; // phpcs:ignore WordPress.Security.NonceVerification.Missing
	if ( $page < 2 ) {
		wp_send_json_error( array( 'message' => 'Invalid page' ), 400 );
	}

	$news_type = isset( $_POST['news_type'] ) ? sanitize_title( wp_unslash( $_POST['news_type'] ) ) : 'all'; // phpcs:ignore WordPress.Security.NonceVerification.Missing

	$query = new WP_Query( tanki_get_feed_query_args( $page, $news_type ) );

	if ( ! $query->have_posts() ) {
		wp_send_json_success(
			array(
				'html'     => '',
				'page'     => $page,
				'maxPages' => (int) $query->max_num_pages,
				'done'     => true,
			)
		);
	}

	ob_start();
	while ( $query->have_posts() ) {
		$query->the_post();
		get_template_part( 'template-parts/content', 'news-card' );
	}
	$html = ob_get_clean();
	wp_reset_postdata();

	wp_send_json_success(
		array(
			'html'     => $html,
			'page'     => $page,
			'maxPages' => (int) $query->max_num_pages,
			'done'     => $page >= (int) $query->max_num_pages,
		)
	);
}
add_action( 'wp_ajax_tanki_load_more', 'tanki_ajax_load_more_news' );
add_action( 'wp_ajax_nopriv_tanki_load_more', 'tanki_ajax_load_more_news' );
