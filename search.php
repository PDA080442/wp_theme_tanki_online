<?php
/**
 * Search results page (no-JS fallback + overlay host).
 *
 * @package Tanki_Online_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$search_query = trim( get_search_query() );
$has_query    = '' !== $search_query;
?>

<section class="search-page" data-tanki-auto-search="<?php echo $has_query ? '1' : '0'; ?>">
	<header class="search-page__header">
		<h1 class="search-page__title">
			<?php if ( $has_query ) : ?>
				<?php esc_html_e( 'Результаты поиска', 'tanki-online-news' ); ?>
				<span class="search-results__query">&laquo;<?php echo esc_html( $search_query ); ?>&raquo;</span>
			<?php else : ?>
				<?php esc_html_e( 'Поиск новостей', 'tanki-online-news' ); ?>
			<?php endif; ?>
		</h1>
		<p class="search-page__hint">
			<?php esc_html_e( 'Откройте поиск кнопкой «Найти новость» в шапке.', 'tanki-online-news' ); ?>
		</p>
	</header>

	<noscript>
		<?php if ( ! $has_query ) : ?>
			<section class="no-posts">
				<h2><?php esc_html_e( 'Введите запрос в поле поиска', 'tanki-online-news' ); ?></h2>
			</section>
		<?php elseif ( have_posts() ) : ?>
			<div class="search-page__list">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'search-item' );
				endwhile;
				?>
			</div>
		<?php else : ?>
			<section class="no-posts">
				<h2><?php esc_html_e( 'Ничего не найдено', 'tanki-online-news' ); ?></h2>
			</section>
		<?php endif; ?>
	</noscript>
</section>

<?php
get_footer();
