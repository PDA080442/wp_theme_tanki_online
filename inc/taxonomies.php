<?php
/**
 * Taxonomies for Tanki Online News.
 *
 * @package Tanki_Online_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register the news_type taxonomy (Новость / Видео).
 */
function tanki_register_news_type_taxonomy() {
	$labels = array(
		'name'                       => __( 'Типы', 'tanki-online-news' ),
		'singular_name'              => __( 'Тип', 'tanki-online-news' ),
		'menu_name'                  => __( 'Типы', 'tanki-online-news' ),
		'all_items'                  => __( 'Все типы', 'tanki-online-news' ),
		'edit_item'                  => __( 'Редактировать тип', 'tanki-online-news' ),
		'view_item'                  => __( 'Просмотреть тип', 'tanki-online-news' ),
		'update_item'                => __( 'Обновить тип', 'tanki-online-news' ),
		'add_new_item'               => __( 'Добавить тип', 'tanki-online-news' ),
		'new_item_name'              => __( 'Название нового типа', 'tanki-online-news' ),
		'search_items'               => __( 'Искать типы', 'tanki-online-news' ),
		'popular_items'              => __( 'Популярные типы', 'tanki-online-news' ),
		'separate_items_with_commas' => __( 'Разделяйте типы запятыми', 'tanki-online-news' ),
		'add_or_remove_items'        => __( 'Добавить или удалить типы', 'tanki-online-news' ),
		'choose_from_most_used'      => __( 'Выбрать из часто используемых', 'tanki-online-news' ),
		'not_found'                  => __( 'Типов не найдено.', 'tanki-online-news' ),
		'back_to_items'              => __( '← К типам', 'tanki-online-news' ),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_in_rest'      => true,
		'show_tagcloud'      => false,
		'rewrite'           => array(
			'slug'       => 'news-type',
			'with_front' => false,
		),
	);

	register_taxonomy( 'news_type', array( 'tanki_news' ), $args );
}
add_action( 'init', 'tanki_register_news_type_taxonomy', 11 );

/**
 * Ensure default terms «Новость» and «Видео» exist.
 */
function tanki_ensure_news_type_terms() {
	if ( ! taxonomy_exists( 'news_type' ) ) {
		return;
	}

	$terms = array(
		'novost' => __( 'Новость', 'tanki-online-news' ),
		'video'  => __( 'Видео', 'tanki-online-news' ),
	);

	foreach ( $terms as $slug => $name ) {
		if ( ! term_exists( $slug, 'news_type' ) ) {
			wp_insert_term(
				$name,
				'news_type',
				array(
					'slug' => $slug,
				)
			);
		}
	}
}
add_action( 'init', 'tanki_ensure_news_type_terms', 12 );

/**
 * Return the news type label for a post (first assigned term).
 *
 * @param int $post_id Post ID. Defaults to current post in the Loop.
 * @return string Term name or empty string.
 */
function tanki_get_news_type_label( $post_id = 0 ) {
	$post_id = $post_id ? (int) $post_id : get_the_ID();

	if ( ! $post_id ) {
		return '';
	}

	$terms = get_the_terms( $post_id, 'news_type' );

	if ( empty( $terms ) || is_wp_error( $terms ) ) {
		return '';
	}

	return $terms[0]->name;
}
