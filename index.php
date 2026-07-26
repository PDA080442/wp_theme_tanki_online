<?php
/**
 * Main template (fallback).
 *
 * @package Tanki_Online_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>

		<article <?php post_class( 'post-card' ); ?> id="post-<?php the_ID(); ?>">
			<header class="post-card__header">
				<h2 class="post-card__title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h2>
				<time class="post-card__date" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
					<?php echo esc_html( get_the_date() ); ?>
				</time>
			</header>

			<div class="post-card__excerpt">
				<?php the_excerpt(); ?>
			</div>
		</article>

	<?php endwhile; ?>

	<nav class="posts-navigation" aria-label="<?php esc_attr_e( 'Posts navigation', 'tanki-online-news' ); ?>">
		<?php
		the_posts_navigation(
			array(
				'prev_text' => __( 'Older posts', 'tanki-online-news' ),
				'next_text' => __( 'Newer posts', 'tanki-online-news' ),
			)
		);
		?>
	</nav>

<?php else : ?>

	<section class="no-posts">
		<h2><?php esc_html_e( 'Nothing found', 'tanki-online-news' ); ?></h2>
		<p><?php esc_html_e( 'No posts to display yet.', 'tanki-online-news' ); ?></p>
	</section>

<?php endif; ?>

<?php
get_footer();
