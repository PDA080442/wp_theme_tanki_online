<?php
/**
 * Single news article — layout aligned with tankionline.com single post.
 *
 * @package Tanki_Online_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$permalink   = get_permalink();
$share_url   = rawurlencode( $permalink );
$thumb_id    = get_post_thumbnail_id();
$thumb_url   = $thumb_id ? wp_get_attachment_image_url( $thumb_id, 'full' ) : '';
$badge       = get_post_meta( get_the_ID(), '_tanki_news_badge', true );
$badge       = is_string( $badge ) ? trim( $badge ) : '';

if ( '' === $badge ) {
	$demo_slug = get_post_meta( get_the_ID(), '_tanki_demo_slug', true );
	if ( is_string( $demo_slug ) && isset( tanki_get_demo_news_content_data()[ $demo_slug ]['badge'] ) ) {
		$badge = tanki_get_demo_news_content_data()[ $demo_slug ]['badge'];
	}
}

$type_label = tanki_get_news_type_label();
$post_ts    = get_post_timestamp();
?>
<section class="post-single">
	<?php if ( $thumb_url ) : ?>
		<div class="background" aria-hidden="true">
			<img src="<?php echo esc_url( $thumb_url ); ?>" alt="">
		</div>
	<?php endif; ?>

	<div class="left-col" aria-hidden="true"></div>

	<div class="right-col">
		<div class="share-links">
			<a href="<?php echo esc_url( 'https://vk.com/share.php?url=' . $share_url ); ?>" target="_blank" rel="noopener noreferrer">
				<img src="<?php echo esc_url( TANKI_THEME_URI . '/assets/img/social-vk.svg' ); ?>" alt="<?php esc_attr_e( 'ВКонтакте', 'tanki-online-news' ); ?>" width="24" height="24" decoding="async">
			</a>
			<a href="<?php echo esc_url( 'https://t.me/share/url?url=' . $share_url ); ?>" target="_blank" rel="noopener noreferrer">
				<img src="<?php echo esc_url( TANKI_THEME_URI . '/assets/img/social-telegram.svg' ); ?>" alt="<?php esc_attr_e( 'Telegram', 'tanki-online-news' ); ?>" width="24" height="24" decoding="async">
			</a>
			<p><?php esc_html_e( 'поделиться:', 'tanki-online-news' ); ?></p>
		</div>
	</div>

	<div class="preview">
		<div class="image">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php
				the_post_thumbnail(
					'news-single',
					array(
						'alt'      => the_title_attribute( array( 'echo' => false ) ),
						'decoding' => 'async',
					)
				);
				?>
			<?php else : ?>
				<span class="post-single__placeholder" aria-hidden="true"></span>
			<?php endif; ?>
		</div>

		<?php if ( '' !== $badge ) : ?>
			<div class="tag">
				<span><?php echo esc_html( $badge ); ?></span>
			</div>
		<?php endif; ?>

		<h1><?php the_title(); ?></h1>

		<div class="info">
			<?php if ( false !== $post_ts ) : ?>
				<time class="post-single__date" datetime="<?php echo esc_attr( wp_date( 'c', $post_ts ) ); ?>">
					<?php echo esc_html( tanki_get_news_date_label() ); ?>
				</time>
			<?php endif; ?>
			<?php if ( '' !== $type_label ) : ?>
				<span class="post-single__type"><?php echo esc_html( $type_label ); ?></span>
			<?php endif; ?>
		</div>
	</div>

	<div class="content entry-content">
		<?php the_content(); ?>
	</div>
</section>

<?php get_template_part( 'template-parts/content', 'related-news' ); ?>
