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
?>
<section class="news-feed" data-current-page="<?php echo esc_attr( (string) $paged ); ?>" data-max-pages="<?php echo esc_attr( (string) $max_pages ); ?>">
	<header class="news-feed__header">
		<?php /* Reference hides the page title visually (SEO / a11y only). */ ?>
		<h1 class="news-feed__title screen-reader-text"><?php echo esc_html( $feed_title ); ?></h1>
	</header>

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
				>
					<?php esc_html_e( 'Загрузить ещё', 'tanki-online-news' ); ?>
				</button>
			</div>

			<nav class="news-feed__pagination" aria-label="<?php esc_attr_e( 'News pagination', 'tanki-online-news' ); ?>">
				<?php
				the_posts_pagination(
					array(
						'mid_size'  => 1,
						'prev_text' => __( 'Назад', 'tanki-online-news' ),
						'next_text' => __( 'Далее', 'tanki-online-news' ),
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
