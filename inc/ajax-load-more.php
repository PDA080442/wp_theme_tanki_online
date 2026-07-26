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

	$page = isset( $_POST['page'] ) ? absint( $_POST['page'] ) : 0;
	if ( $page < 2 ) {
		wp_send_json_error( array( 'message' => 'Invalid page' ), 400 );
	}

	$query = new WP_Query(
		array(
			'post_type'           => 'tanki_news',
			'post_status'         => 'publish',
			'posts_per_page'      => defined( 'TANKI_FEED_POSTS_PER_PAGE' ) ? TANKI_FEED_POSTS_PER_PAGE : 12,
			'paged'               => $page,
			'ignore_sticky_posts' => true,
		)
	);

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
