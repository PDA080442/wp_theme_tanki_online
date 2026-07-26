<?php
/**
 * Search form — white modal input (opened from «Найти новость»).
 *
 * @package Tanki_Online_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<form role="search" method="get" class="search-form search-form--modal" action="<?php echo esc_url( home_url( '/' ) ); ?>" id="tanki-search-form">
	<label class="screen-reader-text" for="tanki-search-field">
		<?php esc_html_e( 'Найти новость', 'tanki-online-news' ); ?>
	</label>
	<input
		type="search"
		id="tanki-search-field"
		class="search-field"
		placeholder="<?php esc_attr_e( 'Поиск', 'tanki-online-news' ); ?>"
		value="<?php echo esc_attr( get_search_query() ); ?>"
		name="s"
		autocomplete="off"
	/>
	<input type="hidden" name="order" id="tanki-search-order" value="<?php echo esc_attr( isset( $_GET['order'] ) && 'ASC' === strtoupper( wp_unslash( $_GET['order'] ) ) ? 'ASC' : 'DESC' ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended ?>" />
	<input type="hidden" name="news_type" id="tanki-search-type" value="<?php echo esc_attr( isset( $_GET['news_type'] ) ? sanitize_title( wp_unslash( $_GET['news_type'] ) ) : 'all' ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended ?>" />
	<button type="submit" class="search-submit" aria-label="<?php esc_attr_e( 'Найти', 'tanki-online-news' ); ?>">
		<span class="screen-reader-text"><?php esc_html_e( 'Найти', 'tanki-online-news' ); ?></span>
	</button>
</form>
