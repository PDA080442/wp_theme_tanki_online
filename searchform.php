<?php
/**
 * Search form — «Найти новость» pill like the reference.
 *
 * @package Tanki_Online_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="tanki-search-field">
		<?php esc_html_e( 'Найти новость', 'tanki-online-news' ); ?>
	</label>
	<span class="search-form__icon" aria-hidden="true"></span>
	<input
		type="search"
		id="tanki-search-field"
		class="search-field"
		placeholder="<?php esc_attr_e( 'Найти новость', 'tanki-online-news' ); ?>"
		value="<?php echo esc_attr( get_search_query() ); ?>"
		name="s"
	/>
	<button type="submit" class="search-submit">
		<span class="screen-reader-text"><?php esc_html_e( 'Найти', 'tanki-online-news' ); ?></span>
	</button>
</form>
