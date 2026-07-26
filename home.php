<?php
/**
 * Home / blog posts index — news feed.
 *
 * @package Tanki_Online_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<section class="news-feed">
	<header class="news-feed__header">
		<h1 class="news-feed__title screen-reader-text"><?php esc_html_e( 'Новости', 'tanki-online-news' ); ?></h1>
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
	<?php else : ?>
		<section class="no-posts">
			<h2><?php esc_html_e( 'Новостей пока нет', 'tanki-online-news' ); ?></h2>
			<p><?php esc_html_e( 'Как только появятся публикации, они отобразятся здесь.', 'tanki-online-news' ); ?></p>
		</section>
	<?php endif; ?>
</section>

<?php
get_footer();
