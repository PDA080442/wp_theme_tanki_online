<?php
/**
 * Header template — layout aligned with tankionline.com/ru/news.
 *
 * @package Tanki_Online_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="site-header">
	<div class="site-header__bar">
		<div class="site-header__bar-inner">
			<div class="site-header__brand-wrap">
				<?php if ( has_custom_logo() ) : ?>
					<?php the_custom_logo(); ?>
				<?php else : ?>
					<a class="site-header__brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
						<img
							class="site-header__logo"
							src="<?php echo esc_url( TANKI_THEME_URI . '/assets/img/logo.svg' ); ?>"
							width="44"
							height="44"
							alt=""
							aria-hidden="true"
							decoding="async"
						>
					</a>
				<?php endif; ?>
			</div>

			<nav class="site-nav site-nav--primary" id="site-nav" aria-label="<?php esc_attr_e( 'Главное меню', 'tanki-online-news' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'site-nav__list',
						'fallback_cb'    => 'tanki_primary_menu_fallback',
						'depth'          => 1,
					)
				);
				?>
			</nav>

			<nav class="site-nav site-nav--external" id="site-nav-external" aria-label="<?php esc_attr_e( 'Внешние ссылки', 'tanki-online-news' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'external',
						'container'      => false,
						'menu_class'     => 'site-nav__list site-nav__list--external',
						'fallback_cb'    => 'tanki_external_menu_fallback',
						'depth'          => 1,
					)
				);
				?>
			</nav>

			<div class="site-header__promo" aria-hidden="true">
				<span class="site-header__promo-icon">4</span>
				<span class="site-header__promo-text"><?php esc_html_e( 'Подписка на календарь событий', 'tanki-online-news' ); ?></span>
				<span class="site-header__promo-progress"><i></i></span>
			</div>

			<div class="site-header__actions">
				<a class="site-header__help" href="#" aria-label="<?php esc_attr_e( 'Help', 'tanki-online-news' ); ?>"></a>

				<button
					type="button"
					class="site-header__menu-toggle"
					id="site-menu-toggle"
					aria-controls="site-nav site-nav-external"
					aria-expanded="false"
					aria-label="<?php esc_attr_e( 'Открыть меню', 'tanki-online-news' ); ?>"
					data-label-open="<?php esc_attr_e( 'Открыть меню', 'tanki-online-news' ); ?>"
					data-label-close="<?php esc_attr_e( 'Закрыть меню', 'tanki-online-news' ); ?>"
				>
					<span class="site-header__icon site-header__icon--menu" aria-hidden="true"></span>
				</button>
			</div>
		</div>
	</div>

	<?php if ( ! is_singular( 'tanki_news' ) ) : ?>
	<div class="site-header__search-row">
		<button
			type="button"
			class="site-header__open-search"
			id="tanki-open-search"
			aria-controls="tanki-search-popup"
			aria-expanded="false"
		>
			<span class="site-header__open-search-label"><?php esc_html_e( 'Найти новость', 'tanki-online-news' ); ?></span>
		</button>
	</div>
	<?php endif; ?>
</header>

<?php get_template_part( 'template-parts/search', 'overlay' ); ?>

<main class="site-main" id="main">
