<?php
/**
 * News card for the feed grid (markup aligned with tankionline.com/ru/news).
 *
 * @package Tanki_Online_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$type_label = tanki_get_news_type_label();
if ( '' === $type_label ) {
	$type_label = __( 'Новость', 'tanki-online-news' );
}

$is_video = has_term( 'video', 'news_type' );
$card_class = $is_video ? 'news-card news-card--video' : 'news-card';
?>
<article <?php post_class( $card_class ); ?> id="post-<?php the_ID(); ?>">
	<a class="news-card__link" href="<?php echo esc_url( get_permalink() ); ?>">
		<div class="news-card__image">
			<div class="news-card__filler" aria-hidden="true"></div>
			<div class="news-card__image-wrap">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php
					the_post_thumbnail(
						'news-card',
						array(
							'class'   => 'news-card__img',
							'loading' => 'lazy',
							'alt'     => the_title_attribute( array( 'echo' => false ) ),
						)
					);
					?>
				<?php else : ?>
					<span class="news-card__placeholder" aria-hidden="true"></span>
				<?php endif; ?>
			</div>
		</div>

		<div class="news-card__meta">
			<time class="news-card__date" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
				<?php echo esc_html( tanki_get_news_date_label() ); ?>
			</time>
			<span class="news-card__type"><?php echo esc_html( $type_label ); ?></span>
		</div>

		<h2 class="news-card__title"><?php the_title(); ?></h2>
	</a>
</article>
