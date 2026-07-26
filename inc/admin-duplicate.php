<?php
/**
 * Duplicate tanki_news posts in the admin.
 *
 * @package Tanki_Online_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add «Дублировать» to the news list row actions.
 *
 * @param array   $actions Existing actions.
 * @param WP_Post $post    Post object.
 * @return array
 */
function tanki_news_duplicate_row_action( $actions, $post ) {
	if ( 'tanki_news' !== $post->post_type || ! current_user_can( 'edit_post', $post->ID ) ) {
		return $actions;
	}

	$url = wp_nonce_url(
		admin_url( 'admin.php?action=tanki_duplicate_news&post=' . absint( $post->ID ) ),
		'tanki_duplicate_news_' . $post->ID
	);

	$actions['tanki_duplicate'] = sprintf(
		'<a href="%s" aria-label="%s">%s</a>',
		esc_url( $url ),
		esc_attr(
			sprintf(
				/* translators: %s: news title */
				__( 'Дублировать «%s»', 'tanki-online-news' ),
				get_the_title( $post )
			)
		),
		esc_html__( 'Дублировать', 'tanki-online-news' )
	);

	return $actions;
}
add_filter( 'post_row_actions', 'tanki_news_duplicate_row_action', 10, 2 );

/**
 * Add a duplicate button on the news edit screen.
 *
 * @param WP_Post $post Post being edited.
 */
function tanki_news_duplicate_submitbox_button( $post ) {
	if ( ! $post instanceof WP_Post || 'tanki_news' !== $post->post_type || ! current_user_can( 'edit_post', $post->ID ) ) {
		return;
	}

	// New (unsaved) posts have no ID to clone yet.
	if ( empty( $post->ID ) || 'auto-draft' === $post->post_status ) {
		return;
	}

	$url = wp_nonce_url(
		admin_url( 'admin.php?action=tanki_duplicate_news&post=' . absint( $post->ID ) ),
		'tanki_duplicate_news_' . $post->ID
	);
	?>
	<div class="misc-pub-section tanki-duplicate-news">
		<a class="button" href="<?php echo esc_url( $url ); ?>">
			<?php esc_html_e( 'Дублировать новость', 'tanki-online-news' ); ?>
		</a>
	</div>
	<?php
}
add_action( 'post_submitbox_misc_actions', 'tanki_news_duplicate_submitbox_button' );

/**
 * Handle the duplicate admin action.
 */
function tanki_handle_duplicate_news() {
	$post_id = isset( $_GET['post'] ) ? absint( $_GET['post'] ) : 0; // phpcs:ignore WordPress.Security.NonceVerification.Recommended

	if ( ! $post_id ) {
		wp_die( esc_html__( 'Не указана новость для дублирования.', 'tanki-online-news' ) );
	}

	check_admin_referer( 'tanki_duplicate_news_' . $post_id );

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		wp_die( esc_html__( 'Недостаточно прав для дублирования этой новости.', 'tanki-online-news' ) );
	}

	$original = get_post( $post_id );

	if ( ! $original || 'tanki_news' !== $original->post_type ) {
		wp_die( esc_html__( 'Новость не найдена.', 'tanki-online-news' ) );
	}

	$new_id = tanki_duplicate_news_post( $original );

	if ( is_wp_error( $new_id ) ) {
		wp_die( esc_html( $new_id->get_error_message() ) );
	}

	wp_safe_redirect( get_edit_post_link( $new_id, 'raw' ) );
	exit;
}
add_action( 'admin_action_tanki_duplicate_news', 'tanki_handle_duplicate_news' );

/**
 * Create a draft copy of a news post (content, taxonomies, thumbnail, meta).
 *
 * @param WP_Post $original Source post.
 * @return int|WP_Error New post ID or error.
 */
function tanki_duplicate_news_post( $original ) {
	$title = $original->post_title;
	if ( '' !== $title ) {
		$title = sprintf(
			/* translators: %s: original news title */
			__( '%s (копия)', 'tanki-online-news' ),
			$title
		);
	}

	$new_id = wp_insert_post(
		array(
			'post_type'    => 'tanki_news',
			'post_status'  => 'draft',
			'post_title'   => $title,
			'post_content' => $original->post_content,
			'post_excerpt' => $original->post_excerpt,
			'post_author'  => get_current_user_id(),
			'menu_order'   => $original->menu_order,
			'post_name'    => '',
		),
		true
	);

	if ( is_wp_error( $new_id ) ) {
		return $new_id;
	}

	$taxonomies = get_object_taxonomies( 'tanki_news' );
	foreach ( $taxonomies as $taxonomy ) {
		$terms = wp_get_object_terms( $original->ID, $taxonomy, array( 'fields' => 'ids' ) );
		if ( ! is_wp_error( $terms ) && ! empty( $terms ) ) {
			wp_set_object_terms( $new_id, $terms, $taxonomy );
		}
	}

	$thumbnail_id = get_post_thumbnail_id( $original->ID );
	if ( $thumbnail_id ) {
		set_post_thumbnail( $new_id, $thumbnail_id );
	}

	$meta = get_post_meta( $original->ID );
	foreach ( $meta as $key => $values ) {
		if ( '_edit_lock' === $key || '_edit_last' === $key || '_thumbnail_id' === $key ) {
			continue;
		}

		foreach ( $values as $value ) {
			add_post_meta( $new_id, $key, maybe_unserialize( $value ) );
		}
	}

	return (int) $new_id;
}
