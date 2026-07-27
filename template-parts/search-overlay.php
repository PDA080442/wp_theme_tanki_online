<?php
/**
 * Full-screen search overlay (reference: tankionline.com).
 *
 * @package Tanki_Online_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$order     = isset( $_GET['order'] ) && 'ASC' === strtoupper( wp_unslash( $_GET['order'] ) ) ? 'ASC' : 'DESC'; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
$news_type = isset( $_GET['news_type'] ) ? sanitize_title( wp_unslash( $_GET['news_type'] ) ) : 'all'; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
if ( ! in_array( $news_type, array( 'all', 'novost', 'video' ), true ) ) {
	$news_type = 'all';
}
?>
<div
	class="search-popup"
	id="tanki-search-popup"
	hidden
	aria-hidden="true"
>
	<button
		type="button"
		class="search-popup__close"
		id="tanki-search-close"
		aria-label="<?php esc_attr_e( 'Закрыть поиск', 'tanki-online-news' ); ?>"
	></button>

	<div class="search-popup__dialog" role="dialog" aria-modal="true" aria-labelledby="tanki-search-dialog-title">
		<h2 id="tanki-search-dialog-title" class="screen-reader-text"><?php esc_html_e( 'Поиск новостей', 'tanki-online-news' ); ?></h2>

		<div class="search-popup__container">
			<?php get_search_form(); ?>

			<div class="search-popup__filters">
				<div class="search-popup__date-filter">
					<span class="search-popup__filter-label"><?php esc_html_e( 'Дата:', 'tanki-online-news' ); ?></span>
					<div class="search-popup__date-control" data-order="<?php echo esc_attr( $order ); ?>">
						<button type="button" class="search-popup__date-current" id="tanki-search-order-toggle">
							<?php
							echo esc_html(
								'ASC' === $order
									? __( 'Сначала старые', 'tanki-online-news' )
									: __( 'Сначала новые', 'tanki-online-news' )
							);
							?>
						</button>
						<div class="search-popup__date-menu" id="tanki-search-order-menu" hidden>
							<button type="button" data-order="DESC"><?php esc_html_e( 'Сначала новые', 'tanki-online-news' ); ?></button>
							<button type="button" data-order="ASC"><?php esc_html_e( 'Сначала старые', 'tanki-online-news' ); ?></button>
						</div>
					</div>
				</div>

				<div class="search-popup__type-filter" role="group" aria-label="<?php esc_attr_e( 'Тип анонса', 'tanki-online-news' ); ?>">
					<span class="search-popup__filter-label"><?php esc_html_e( 'Тип анонса:', 'tanki-online-news' ); ?></span>
					<button type="button" class="search-popup__type<?php echo 'all' === $news_type ? ' is-active' : ''; ?>" data-news-type="all"><?php esc_html_e( 'Все', 'tanki-online-news' ); ?></button>
					<button type="button" class="search-popup__type<?php echo 'novost' === $news_type ? ' is-active' : ''; ?>" data-news-type="novost"><?php esc_html_e( 'Новость', 'tanki-online-news' ); ?></button>
					<button type="button" class="search-popup__type<?php echo 'video' === $news_type ? ' is-active' : ''; ?>" data-news-type="video"><?php esc_html_e( 'Видео', 'tanki-online-news' ); ?></button>
				</div>
			</div>

			<div class="search-popup__results" id="tanki-search-results" aria-live="polite"></div>
		</div>
	</div>
</div>
