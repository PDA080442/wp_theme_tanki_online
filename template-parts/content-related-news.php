<?php
/**
 * Related news carousel on single post (reference: «Новости и события»).
 *
 * @package Tanki_Online_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$archive_url = get_post_type_archive_link( 'tanki_news' );
if ( ! $archive_url ) {
	$archive_url = home_url( '/' );
}

$related = new WP_Query(
	array(
		'post_type'           => 'tanki_news',
		'post_status'         => 'publish',
		'posts_per_page'      => 6,
		'post__not_in'        => array( get_the_ID() ),
		'ignore_sticky_posts' => true,
		'orderby'             => 'date',
		'order'               => 'DESC',
		'has_password'        => false,
	)
);

if ( ! $related->have_posts() ) {
	return;
}
?>
<section class="post-related">
	<h2 class="post-related__title"><?php esc_html_e( 'Новости и события', 'tanki-online-news' ); ?></h2>
	<div class="post-related__scroller">
		<div class="post-related__inner">
			<?php
			while ( $related->have_posts() ) :
				$related->the_post();
				get_template_part( 'template-parts/content', 'news-card' );
			endwhile;
			wp_reset_postdata();
			?>
			<a class="news-card news-card--all" href="<?php echo esc_url( $archive_url ); ?>" target="_blank" rel="noopener noreferrer">
				<div class="news-card__image">
					<div class="news-card__filler" aria-hidden="true"></div>
					<div class="news-card__image-wrap">
						<span class="news-card__all-title"><?php esc_html_e( 'Все новости', 'tanki-online-news' ); ?></span>
					</div>
				</div>
			</a>
		</div>
	</div>
</section>
