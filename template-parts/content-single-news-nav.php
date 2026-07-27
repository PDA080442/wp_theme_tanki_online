<?php
/**
 * Prev/next navigation and archive CTA on single news post.
 *
 * @package Tanki_Online_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$prev_post = get_previous_post();
$next_post = get_next_post();

if ( $prev_post || $next_post ) :
	?>
	<nav class="post-single-nav" aria-label="<?php esc_attr_e( 'Навигация по новостям', 'tanki-online-news' ); ?>">
		<?php
		the_post_navigation(
			array(
				'prev_text' => '<span class="post-single-nav__label">' . esc_html__( 'Предыдущая новость', 'tanki-online-news' ) . '</span><span class="post-single-nav__title">%title</span>',
				'next_text' => '<span class="post-single-nav__label">' . esc_html__( 'Следующая новость', 'tanki-online-news' ) . '</span><span class="post-single-nav__title">%title</span>',
			)
		);
		?>
	</nav>
	<?php
endif;

$archive_url = get_post_type_archive_link( 'tanki_news' );

if ( $archive_url ) :
	?>
	<div class="post-single__archive-wrap">
		<a class="post-single__archive-cta" href="<?php echo esc_url( $archive_url ); ?>">
			<?php esc_html_e( 'Все новости', 'tanki-online-news' ); ?>
		</a>
	</div>
	<?php
endif;
