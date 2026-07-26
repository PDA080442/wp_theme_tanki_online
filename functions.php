<?php
/**
 * Tanki Online News — functions and definitions.
 *
 * @package Tanki_Online_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'TANKI_THEME_VERSION', '1.0.0' );
define( 'TANKI_THEME_DIR', get_template_directory() );
define( 'TANKI_THEME_URI', get_template_directory_uri() );

/**
 * Return file modification time for cache-friendly asset versioning.
 *
 * @param string $relative_path Path relative to theme root.
 * @return string
 */
function tanki_asset_version( $relative_path ) {
	$file_path = TANKI_THEME_DIR . '/' . ltrim( $relative_path, '/' );

	if ( file_exists( $file_path ) ) {
		return (string) filemtime( $file_path );
	}

	return TANKI_THEME_VERSION;
}

/**
 * Theme setup.
 */
function tanki_setup() {
	load_theme_textdomain( 'tanki-online-news', TANKI_THEME_DIR . '/languages' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 80,
			'width'       => 240,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	set_post_thumbnail_size( 1200, 675, true );
	add_image_size( 'news-card', 960, 540, true );
	add_image_size( 'news-single', 1200, 675, true );

	register_nav_menus(
		array(
			'primary'  => __( 'Главное меню (слева)', 'tanki-online-news' ),
			'external' => __( 'Внешние ссылки (справа)', 'tanki-online-news' ),
			'footer'   => __( 'Меню футера', 'tanki-online-news' ),
		)
	);
}
add_action( 'after_setup_theme', 'tanki_setup' );

/**
 * Fallback for the primary menu location (Новости / Скины / Медиа).
 * Used only when no menu is assigned in Appearance → Menus.
 */
function tanki_primary_menu_fallback() {
	$news_url = get_post_type_archive_link( 'tanki_news' );
	if ( ! $news_url ) {
		$news_url = home_url( '/' );
	}

	$is_news = is_post_type_archive( 'tanki_news' ) || is_singular( 'tanki_news' ) || is_home() || is_front_page();

	$items = array(
		array(
			'label'   => __( 'Новости', 'tanki-online-news' ),
			'url'     => $news_url,
			'current' => $is_news,
		),
		array(
			'label'   => __( 'Скины', 'tanki-online-news' ),
			'url'     => '#',
			'current' => false,
		),
		array(
			'label'   => __( 'Медиа', 'tanki-online-news' ),
			'url'     => '#',
			'current' => false,
		),
	);
	?>
	<ul class="site-nav__list">
		<?php foreach ( $items as $item ) : ?>
			<li class="site-nav__item<?php echo $item['current'] ? ' current-menu-item' : ''; ?>">
				<a class="site-nav__link" href="<?php echo esc_url( $item['url'] ); ?>"<?php echo $item['current'] ? ' aria-current="page"' : ''; ?>>
					<?php echo esc_html( $item['label'] ); ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
	<?php
}

/**
 * Fallback for the external menu location (Киберспорт / Вики / Форум).
 * Used only when no menu is assigned in Appearance → Menus.
 */
function tanki_external_menu_fallback() {
	$items = array(
		__( 'Киберспорт', 'tanki-online-news' ),
		__( 'Вики', 'tanki-online-news' ),
		__( 'Форум', 'tanki-online-news' ),
	);
	?>
	<ul class="site-nav__list site-nav__list--external">
		<?php foreach ( $items as $label ) : ?>
			<li class="site-nav__item">
				<a class="site-nav__link site-nav__link--external" href="#">
					<?php echo esc_html( $label ); ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
	<?php
}

/**
 * Fallback for the footer menu location.
 * Used only when no menu is assigned in Appearance → Menus.
 */
function tanki_footer_menu_fallback() {
	$items = array(
		__( 'Скачать игру', 'tanki-online-news' ),
		__( 'Правила игры', 'tanki-online-news' ),
		__( 'Лицензионное соглашение', 'tanki-online-news' ),
		__( 'Политика конфиденциальности и cookies', 'tanki-online-news' ),
		__( 'Документация', 'tanki-online-news' ),
	);
	?>
	<ul class="site-footer__menu-list">
		<?php foreach ( $items as $label ) : ?>
			<li class="site-footer__menu-item">
				<a class="site-footer__menu-link" href="#"><?php echo esc_html( $label ); ?></a>
			</li>
		<?php endforeach; ?>
	</ul>
	<?php
}

/**
 * Format a post date like the reference: «23 ИЮЛЯ, 2026».
 *
 * @param int|null $post_id Post ID.
 * @return string
 */
function tanki_get_news_date_label( $post_id = null ) {
	$post_id = $post_id ? (int) $post_id : get_the_ID();

	if ( ! $post_id ) {
		return '';
	}

	$timestamp = get_post_timestamp( $post_id );

	if ( false === $timestamp ) {
		return '';
	}

	// Like reference: «23 июля, 2026» / «09 июля, 2026» (day padded), then CSS uppercases.
	return wp_date( 'd F, Y', $timestamp );
}

/**
 * Uppercase helper with mbstring fallback.
 *
 * @param string $text Text to transform.
 * @return string
 */
function tanki_uppercase( $text ) {
	if ( function_exists( 'mb_strtoupper' ) ) {
		return mb_strtoupper( $text, 'UTF-8' );
	}

	return strtoupper( $text );
}

/**
 * Preconnect to Google Fonts (Rubik).
 *
 * @param array  $urls          URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array
 */
function tanki_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' !== $relation_type ) {
		return $urls;
	}

	$urls[] = array(
		'href' => 'https://fonts.googleapis.com',
	);

	$urls[] = array(
		'href'        => 'https://fonts.gstatic.com',
		'crossorigin' => 'anonymous',
	);

	return $urls;
}
add_filter( 'wp_resource_hints', 'tanki_resource_hints', 10, 2 );

/**
 * Enqueue theme styles and scripts on the frontend.
 */
function tanki_enqueue_assets() {
	wp_enqueue_style(
		'tanki-fonts',
		'https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'tanki-style',
		get_stylesheet_uri(),
		array( 'tanki-fonts' ),
		tanki_asset_version( 'style.css' )
	);

	$main_css_path = TANKI_THEME_DIR . '/assets/css/main.css';

	if ( file_exists( $main_css_path ) ) {
		wp_enqueue_style(
			'tanki-main',
			TANKI_THEME_URI . '/assets/css/main.css',
			array( 'tanki-style' ),
			tanki_asset_version( 'assets/css/main.css' )
		);
	}

	$single_css_path = TANKI_THEME_DIR . '/assets/css/single.css';

	if ( file_exists( $single_css_path ) && is_singular( 'tanki_news' ) ) {
		wp_enqueue_style(
			'tanki-single',
			TANKI_THEME_URI . '/assets/css/single.css',
			array( 'tanki-main' ),
			tanki_asset_version( 'assets/css/single.css' )
		);
	}

	$main_js_path = TANKI_THEME_DIR . '/assets/js/main.js';

	if ( file_exists( $main_js_path ) ) {
		wp_enqueue_script(
			'tanki-main',
			TANKI_THEME_URI . '/assets/js/main.js',
			array(),
			tanki_asset_version( 'assets/js/main.js' ),
			true
		);

		wp_localize_script(
			'tanki-main',
			'tankiSearch',
			array(
				'ajaxUrl' => admin_url( 'admin-ajax.php' ),
				'i18n'    => array(
					'newest'  => __( 'Сначала новые', 'tanki-online-news' ),
					'oldest'  => __( 'Сначала старые', 'tanki-online-news' ),
					'empty'   => __( 'Введите запрос в поле поиска', 'tanki-online-news' ),
					'nothing' => __( 'Ничего не найдено', 'tanki-online-news' ),
				),
			)
		);

		$load_more = array(
			'ajaxUrl'     => admin_url( 'admin-ajax.php' ),
			'nonce'       => wp_create_nonce( 'tanki_load_more' ),
			'currentPage' => 1,
			'maxPages'    => 1,
			'i18n'        => array(
				'loadMore' => __( 'Загрузить ещё', 'tanki-online-news' ),
				'loading'  => __( 'Загрузка…', 'tanki-online-news' ),
			),
		);

		if ( ! is_admin() && ( is_home() || is_post_type_archive( 'tanki_news' ) ) ) {
			global $wp_query;
			$load_more['currentPage'] = max( 1, (int) get_query_var( 'paged' ), (int) get_query_var( 'page' ) );
			$load_more['maxPages']    = isset( $wp_query->max_num_pages ) ? (int) $wp_query->max_num_pages : 1;
			$load_more['newsType']    = tanki_get_feed_news_type_filter();
		}

		wp_localize_script( 'tanki-main', 'tankiLoadMore', $load_more );
	}
}
add_action( 'wp_enqueue_scripts', 'tanki_enqueue_assets' );

require_once TANKI_THEME_DIR . '/inc/cpt.php';
require_once TANKI_THEME_DIR . '/inc/taxonomies.php';
require_once TANKI_THEME_DIR . '/inc/query.php';
require_once TANKI_THEME_DIR . '/inc/search.php';
require_once TANKI_THEME_DIR . '/inc/customizer.php';
require_once TANKI_THEME_DIR . '/inc/admin-duplicate.php';
require_once TANKI_THEME_DIR . '/inc/demo-content.php';
require_once TANKI_THEME_DIR . '/inc/wp-cli.php';
require_once TANKI_THEME_DIR . '/inc/ajax-load-more.php';
