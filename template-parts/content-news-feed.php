<?php
/**
 * Shared news feed loop: grid, load more, pagination fallback, empty state.
 *
 * Expects optional $args['title'] for the section heading.
 *
 * @package Tanki_Online_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $wp_query;

$feed_title = isset( $args['title'] ) ? (string) $args['title'] : __( 'Новости', 'tanki-online-news' );
$max_pages  = isset( $wp_query->max_num_pages ) ? (int) $wp_query->max_num_pages : 1;
$paged      = max( 1, (int) get_query_var( 'paged' ), (int) get_query_var( 'page' ) );
$news_type  = tanki_get_feed_news_type_filter();
$filter_base = tanki_get_feed_filter_base_url();

$filter_links = array(
	'all'    => array(
		'label' => __( 'Все', 'tanki-online-news' ),
		'url'   => remove_query_arg( 'news_type', $filter_base ),
	),
	'novost' => array(
		'label' => __( 'Новость', 'tanki-online-news' ),
		'url'   => add_query_arg( 'news_type', 'novost', $filter_base ),
	),
	'video'  => array(
		'label' => __( 'Видео', 'tanki-online-news' ),
		'url'   => add_query_arg( 'news_type', 'video', $filter_base ),
	),
);
?>
<section class="news-feed" data-current-page="<?php echo esc_attr( (string) $paged ); ?>" data-max-pages="<?php echo esc_attr( (string) $max_pages ); ?>" data-news-type="<?php echo esc_attr( $news_type ); ?>">
	<header class="news-feed__header">
		<?php /* Reference hides the page title visually (SEO / a11y only). */ ?>
		<h1 class="news-feed__title screen-reader-text"><?php echo esc_html( $feed_title ); ?></h1>
	</header>

	<nav class="news-feed__filters screen-reader-text" aria-label="<?php esc_attr_e( 'Фильтр по типу новости', 'tanki-online-news' ); ?>">
		<?php foreach ( $filter_links as $slug => $link ) : ?>
			<a
				class="news-feed__filter<?php echo $news_type === $slug ? ' is-active' : ''; ?>"
				href="<?php echo esc_url( $link['url'] ); ?>"
				<?php echo $news_type === $slug ? ' aria-current="page"' : ''; ?>
			>
				<?php echo esc_html( $link['label'] ); ?>
			</a>
		<?php endforeach; ?>
	</nav>

	<?php if ( have_posts() ) : ?>
		<div class="news-feed__grid">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', 'news-card' );
			endwhile;
			?>
		</div>

		<?php if ( $max_pages > 1 ) : ?>
			<div class="news-feed__load-more">
				<button
					type="button"
					class="news-feed__load-more-btn"
					id="tanki-load-more"
					data-page="<?php echo esc_attr( (string) $paged ); ?>"
					data-max-pages="<?php echo esc_attr( (string) $max_pages ); ?>"
					data-news-type="<?php echo esc_attr( $news_type ); ?>"
				>
					<?php esc_html_e( 'Загрузить ещё', 'tanki-online-news' ); ?>
				</button>
			</div>

			<nav class="news-feed__pagination" aria-label="<?php esc_attr_e( 'News pagination', 'tanki-online-news' ); ?>">
				<?php
				echo wp_kses_post(
					paginate_links(
						array(
							'total'     => $max_pages,
							'current'   => $paged,
							'mid_size'  => 1,
							'prev_text' => __( 'Назад', 'tanki-online-news' ),
							'next_text' => __( 'Далее', 'tanki-online-news' ),
							'type'      => 'list',
							'add_args'  => ( 'all' !== $news_type ) ? array( 'news_type' => $news_type ) : false,
						)
					)
				);
				?>
			</nav>
		<?php endif; ?>
	<?php else : ?>
		<section class="no-posts">
			<h2><?php esc_html_e( 'Новостей пока нет', 'tanki-online-news' ); ?></h2>
			<p><?php esc_html_e( 'Как только появятся публикации, они отобразятся здесь.', 'tanki-online-news' ); ?></p>
		</section>
	<?php endif; ?>
</section>
