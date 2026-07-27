<?php
/**
 * Single search result row (overlay / search.php list).
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

$excerpt = get_the_excerpt();
if ( '' === trim( wp_strip_all_tags( $excerpt ) ) ) {
	$excerpt = wp_trim_words( wp_strip_all_tags( get_the_content( null, false ) ), 28 );
}
?>
<article <?php post_class( 'search-item' ); ?> id="search-item-<?php the_ID(); ?>">
	<div class="search-item__meta">
		<time class="search-item__date" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
			<?php echo esc_html( tanki_get_news_date_label() ); ?>
		</time>
		<span class="search-item__type"><?php echo esc_html( tanki_uppercase( $type_label ) ); ?></span>
	</div>
	<a class="search-item__link" href="<?php the_permalink(); ?>" target="_blank" rel="noopener noreferrer">
		<h2 class="search-item__title"><?php the_title(); ?></h2>
	</a>
	<?php if ( $excerpt ) : ?>
		<p class="search-item__excerpt"><?php echo esc_html( wp_strip_all_tags( $excerpt ) ); ?></p>
	<?php endif; ?>
</article>
