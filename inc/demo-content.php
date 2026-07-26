<?php
/**
 * Demo news content (16 posts with images from assets/demo/news).
 *
 * @package Tanki_Online_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Demo news definitions matching the public reference feed.
 *
 * @return array<int, array{slug:string,title:string,date:string,type:string,image:string,excerpt:string}>
 */
function tanki_get_demo_news_items() {
	return array(
		array(
			'slug'    => '01-retrofuture',
			'title'   => 'Новый скин «RetroFuture» для Рельсы',
			'date'    => '2026-07-23 12:00:00',
			'type'    => 'novost',
			'image'   => '01-retrofuture.jpg',
			'excerpt' => 'В игре появился новый скин RetroFuture для Рельсы.',
		),
		array(
			'slug'    => '02-cybertank',
			'title'   => 'Мини-игра «Кибертанк 2026»',
			'date'    => '2026-07-20 12:00:00',
			'type'    => 'novost',
			'image'   => '02-cybertank.jpg',
			'excerpt' => 'Запускайте мини-игру «Кибертанк 2026» и собирайте награды.',
		),
		array(
			'slug'    => '03-summer-sport',
			'title'   => 'Summer Sport Games 2026',
			'date'    => '2026-07-16 12:00:00',
			'type'    => 'novost',
			'image'   => '03-summer-sport.jpg',
			'excerpt' => 'Летние спортивные игры возвращаются в Танки Онлайн.',
		),
		array(
			'slug'    => '04-videoblog-551',
			'title'   => 'Видеоблог №551',
			'date'    => '2026-07-15 16:00:00',
			'type'    => 'video',
			'image'   => '04-videoblog-551.jpg',
			'excerpt' => 'Новый выпуск видеоблога с новостями и обновлениями.',
		),
		array(
			'slug'    => '05-challenge-back',
			'title'   => 'Событие «Вызов принят» снова доступно',
			'date'    => '2026-07-13 12:00:00',
			'type'    => 'novost',
			'image'   => '05-challenge-back.jpg',
			'excerpt' => 'Событие «Вызов принят» снова открыто для всех игроков.',
		),
		array(
			'slug'    => '06-referral',
			'title'   => 'Реферальное событие',
			'date'    => '2026-07-09 12:00:00',
			'type'    => 'novost',
			'image'   => '06-referral.jpg',
			'excerpt' => 'Приглашайте друзей и получайте награды за рефералы.',
		),
		array(
			'slug'    => '07-ad-rewards',
			'title'   => 'Награды за просмотр рекламы',
			'date'    => '2026-07-08 12:00:00',
			'type'    => 'novost',
			'image'   => '07-ad-rewards.jpg',
			'excerpt' => 'Смотрите рекламу и получайте дополнительные награды.',
		),
		array(
			'slug'    => '08-winter-major',
			'title'   => 'Winter Major Rankings I 2026',
			'date'    => '2026-07-07 12:00:00',
			'type'    => 'novost',
			'image'   => '08-winter-major.jpg',
			'excerpt' => 'Итоги и рейтинги Winter Major Rankings I 2026.',
		),
		array(
			'slug'    => '09-office-2026',
			'title'   => 'Офис 2026',
			'date'    => '2026-07-02 12:00:00',
			'type'    => 'novost',
			'image'   => '09-office-2026.jpg',
			'excerpt' => 'Обновления офиса и новые возможности для кланов.',
		),
		array(
			'slug'    => '10-tech-issues',
			'title'   => 'Технические неполадки',
			'date'    => '2026-07-01 12:00:00',
			'type'    => 'novost',
			'image'   => '10-tech-issues.jpg',
			'excerpt' => 'Информация о технических работах и восстановлении сервисов.',
		),
		array(
			'slug'    => '11-tankofund',
			'title'   => 'Танкофонд. Розыгрыш',
			'date'    => '2026-06-29 12:00:00',
			'type'    => 'novost',
			'image'   => '11-tankofund.jpg',
			'excerpt' => 'Участвуйте в розыгрыше Танкофонда и выигрывайте призы.',
		),
		array(
			'slug'    => '12-videoblog-550',
			'title'   => 'Видеоблог №550',
			'date'    => '2026-06-25 18:00:00',
			'type'    => 'video',
			'image'   => '12-videoblog-550.jpg',
			'excerpt' => 'Юбилейный выпуск видеоблога №550.',
		),
		array(
			'slug'    => '13-ufo-day',
			'title'   => 'День НЛО',
			'date'    => '2026-06-25 12:00:00',
			'type'    => 'novost',
			'image'   => '13-ufo-day.jpg',
			'excerpt' => 'Тематическое событие «День НЛО» уже в игре.',
		),
		array(
			'slug'    => '14-challenge-cancel',
			'title'   => 'Отмена события «Вызов принят»',
			'date'    => '2026-06-16 12:00:00',
			'type'    => 'novost',
			'image'   => '14-challenge-cancel.jpg',
			'excerpt' => 'Событие «Вызов принят» временно отменено.',
		),
		array(
			'slug'    => '15-calendar',
			'title'   => 'Подписка на календарь событий',
			'date'    => '2026-06-05 12:00:00',
			'type'    => 'novost',
			'image'   => '15-calendar.jpg',
			'excerpt' => 'Подпишитесь на календарь событий и не пропускайте обновления.',
		),
		array(
			'slug'    => '16-videoblog-549',
			'title'   => 'Видеоблог №549',
			'date'    => '2026-06-04 16:00:00',
			'type'    => 'video',
			'image'   => '16-videoblog-549.jpg',
			'excerpt' => 'Свежий выпуск видеоблога с обзором событий.',
		),
	);
}

/**
 * Import a local demo image into the Media Library (or reuse existing).
 *
 * @param string $filename File name inside assets/demo/news/.
 * @param int    $post_id  Attachment parent post ID.
 * @return int Attachment ID or 0.
 */
function tanki_import_demo_news_image( $filename, $post_id = 0 ) {
	$filename = sanitize_file_name( $filename );
	$source   = TANKI_THEME_DIR . '/assets/demo/news/' . $filename;

	if ( ! file_exists( $source ) ) {
		return 0;
	}

	$existing = get_posts(
		array(
			'post_type'      => 'attachment',
			'post_status'    => 'inherit',
			'posts_per_page' => 1,
			'fields'         => 'ids',
			'meta_key'       => '_tanki_demo_image',
			'meta_value'     => $filename,
		)
	);

	if ( ! empty( $existing ) ) {
		$attachment_id = (int) $existing[0];
		if ( $post_id ) {
			wp_update_post(
				array(
					'ID'          => $attachment_id,
					'post_parent' => $post_id,
				)
			);
		}
		return $attachment_id;
	}

	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/media.php';
	require_once ABSPATH . 'wp-admin/includes/image.php';

	$upload_dir = wp_upload_dir();
	if ( ! empty( $upload_dir['error'] ) ) {
		return 0;
	}

	$dest = trailingslashit( $upload_dir['path'] ) . $filename;
	if ( ! copy( $source, $dest ) ) {
		return 0;
	}

	$filetype   = wp_check_filetype( $filename, null );
	$attachment = array(
		'post_mime_type' => $filetype['type'],
		'post_title'     => preg_replace( '/\.[^.]+$/', '', $filename ),
		'post_content'   => '',
		'post_status'    => 'inherit',
		'post_parent'    => $post_id,
	);

	$attachment_id = wp_insert_attachment( $attachment, $dest, $post_id );
	if ( is_wp_error( $attachment_id ) || ! $attachment_id ) {
		return 0;
	}

	$metadata = wp_generate_attachment_metadata( $attachment_id, $dest );
	wp_update_attachment_metadata( $attachment_id, $metadata );
	update_post_meta( $attachment_id, '_tanki_demo_image', $filename );

	return (int) $attachment_id;
}

/**
 * Create or refresh 16 demo tanki_news posts with featured images.
 *
 * @param bool $replace_all Delete existing tanki_news before seeding.
 * @return array{created:int,updated:int,skipped:int}
 */
function tanki_seed_demo_news( $replace_all = false ) {
	$stats = array(
		'created' => 0,
		'updated' => 0,
		'skipped' => 0,
	);

	if ( $replace_all ) {
		$old = get_posts(
			array(
				'post_type'      => 'tanki_news',
				'post_status'    => 'any',
				'posts_per_page' => -1,
				'fields'         => 'ids',
			)
		);
		foreach ( $old as $old_id ) {
			wp_delete_post( (int) $old_id, true );
		}
	}

	if ( function_exists( 'tanki_ensure_news_type_terms' ) ) {
		tanki_ensure_news_type_terms();
	}

	foreach ( tanki_get_demo_news_items() as $item ) {
		$existing = get_posts(
			array(
				'post_type'      => 'tanki_news',
				'post_status'    => 'any',
				'posts_per_page' => 1,
				'fields'         => 'ids',
				'meta_key'       => '_tanki_demo_slug',
				'meta_value'     => $item['slug'],
			)
		);

		$content = sprintf(
			"<!-- wp:paragraph -->\n<p>%s</p>\n<!-- /wp:paragraph -->",
			esc_html( $item['excerpt'] )
		);

		$postarr = array(
			'post_type'    => 'tanki_news',
			'post_status'  => 'publish',
			'post_title'   => $item['title'],
			'post_excerpt' => $item['excerpt'],
			'post_content' => $content,
			'post_date'    => $item['date'],
			'post_date_gmt'=> get_gmt_from_date( $item['date'] ),
		);

		if ( ! empty( $existing ) ) {
			$post_id = (int) $existing[0];
			$postarr['ID'] = $post_id;
			wp_update_post( $postarr );
			++$stats['updated'];
		} else {
			$post_id = wp_insert_post( $postarr, true );
			if ( is_wp_error( $post_id ) ) {
				++$stats['skipped'];
				continue;
			}
			++$stats['created'];
		}

		update_post_meta( $post_id, '_tanki_demo_slug', $item['slug'] );
		wp_set_object_terms( $post_id, $item['type'], 'news_type' );

		$thumb_id = tanki_import_demo_news_image( $item['image'], $post_id );
		if ( $thumb_id ) {
			set_post_thumbnail( $post_id, $thumb_id );
		}
	}

	return $stats;
}

/**
 * Admin Tools page: seed demo news.
 */
function tanki_register_demo_news_tools_page() {
	add_management_page(
		__( 'Демо-новости', 'tanki-online-news' ),
		__( 'Демо-новости', 'tanki-online-news' ),
		'manage_options',
		'tanki-demo-news',
		'tanki_render_demo_news_tools_page'
	);
}
add_action( 'admin_menu', 'tanki_register_demo_news_tools_page' );

/**
 * Render Tools → Демо-новости.
 */
function tanki_render_demo_news_tools_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$message = '';
	if ( isset( $_POST['tanki_seed_demo_news'] ) ) {
		check_admin_referer( 'tanki_seed_demo_news' );
		$replace = ! empty( $_POST['tanki_replace_all'] );
		$stats   = tanki_seed_demo_news( $replace );
		$message = sprintf(
			/* translators: 1: created count, 2: updated count */
			__( 'Готово: создано %1$d, обновлено %2$d.', 'tanki-online-news' ),
			(int) $stats['created'],
			(int) $stats['updated']
		);
	}
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Демо-новости', 'tanki-online-news' ); ?></h1>
		<p><?php esc_html_e( 'Загружает 16 новостей с обложками из assets/demo/news (как на референсе).', 'tanki-online-news' ); ?></p>
		<?php if ( $message ) : ?>
			<div class="notice notice-success is-dismissible"><p><?php echo esc_html( $message ); ?></p></div>
		<?php endif; ?>
		<form method="post">
			<?php wp_nonce_field( 'tanki_seed_demo_news' ); ?>
			<p>
				<label>
					<input type="checkbox" name="tanki_replace_all" value="1" />
					<?php esc_html_e( 'Удалить все текущие новости перед загрузкой', 'tanki-online-news' ); ?>
				</label>
			</p>
			<?php submit_button( __( 'Загрузить 16 демо-новостей', 'tanki-online-news' ), 'primary', 'tanki_seed_demo_news' ); ?>
		</form>
	</div>
	<?php
}
