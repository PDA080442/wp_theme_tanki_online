<?php
/**
 * Custom post type: News (tanki_news).
 *
 * @package Tanki_Online_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register the News custom post type.
 */
function tanki_register_news_post_type() {
	$labels = array(
		'name'                  => __( 'Новости', 'tanki-online-news' ),
		'singular_name'         => __( 'Новость', 'tanki-online-news' ),
		'menu_name'             => __( 'Новости', 'tanki-online-news' ),
		'name_admin_bar'        => __( 'Новость', 'tanki-online-news' ),
		'add_new'               => __( 'Добавить', 'tanki-online-news' ),
		'add_new_item'          => __( 'Добавить новость', 'tanki-online-news' ),
		'new_item'              => __( 'Новая новость', 'tanki-online-news' ),
		'edit_item'             => __( 'Редактировать новость', 'tanki-online-news' ),
		'view_item'             => __( 'Просмотреть новость', 'tanki-online-news' ),
		'view_items'            => __( 'Просмотреть новости', 'tanki-online-news' ),
		'all_items'             => __( 'Все новости', 'tanki-online-news' ),
		'search_items'          => __( 'Искать новости', 'tanki-online-news' ),
		'parent_item_colon'     => __( 'Родительская новость:', 'tanki-online-news' ),
		'not_found'             => __( 'Новостей не найдено.', 'tanki-online-news' ),
		'not_found_in_trash'    => __( 'В корзине новостей не найдено.', 'tanki-online-news' ),
		'featured_image'        => __( 'Обложка новости', 'tanki-online-news' ),
		'set_featured_image'    => __( 'Установить обложку', 'tanki-online-news' ),
		'remove_featured_image' => __( 'Удалить обложку', 'tanki-online-news' ),
		'use_featured_image'    => __( 'Использовать как обложку', 'tanki-online-news' ),
		'archives'              => __( 'Архив новостей', 'tanki-online-news' ),
		'insert_into_item'      => __( 'Вставить в новость', 'tanki-online-news' ),
		'uploaded_to_this_item' => __( 'Загружено для этой новости', 'tanki-online-news' ),
		'filter_items_list'     => __( 'Фильтровать список новостей', 'tanki-online-news' ),
		'items_list_navigation' => __( 'Навигация по списку новостей', 'tanki-online-news' ),
		'items_list'            => __( 'Список новостей', 'tanki-online-news' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_nav_menus'  => true,
		'show_in_admin_bar'  => true,
		'show_in_rest'       => true,
		'has_archive'        => true,
		'exclude_from_search'=> false,
		'menu_position'      => 5,
		'menu_icon'          => 'dashicons-megaphone',
		'capability_type'    => 'post',
		'hierarchical'       => false,
		'rewrite'            => array(
			'slug'       => 'news',
			'with_front' => false,
		),
		'supports'           => array(
			'title',
			'editor',
			'thumbnail',
			'excerpt',
			'revisions',
		),
	);

	register_post_type( 'tanki_news', $args );
}
add_action( 'init', 'tanki_register_news_post_type' );

/**
 * Flush rewrite rules when this theme is activated.
 */
function tanki_flush_rewrite_rules_on_switch() {
	tanki_register_news_post_type();

	if ( function_exists( 'tanki_register_news_type_taxonomy' ) ) {
		tanki_register_news_type_taxonomy();
	}

	if ( function_exists( 'tanki_ensure_news_type_terms' ) ) {
		tanki_ensure_news_type_terms();
	}

	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'tanki_flush_rewrite_rules_on_switch' );

/**
 * Flush rewrite rules when switching away from this theme.
 */
function tanki_flush_rewrite_rules_on_deactivate() {
	flush_rewrite_rules();
}
add_action( 'switch_theme', 'tanki_flush_rewrite_rules_on_deactivate' );
