<?php
/**
 * Footer template.
 *
 * @package Tanki_Online_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$footer_year = (int) gmdate( 'Y' );
?>

</main>

<footer class="site-footer">
	<div class="site-footer__top">
		<div class="site-footer__top-inner">
			<div class="site-footer__support-group">
				<span class="site-footer__support-icon" aria-hidden="true"></span>

				<div class="site-footer__support">
					<div class="site-footer__support-text">
						<span class="site-footer__support-label"><?php esc_html_e( 'Служба поддержки:', 'tanki-online-news' ); ?></span>
						<a class="site-footer__support-email" href="mailto:help@tankionline.com">help@tankionline.com</a>
					</div>

					<div class="site-footer__mascot">
						<?php
						echo tanki_get_footer_image_html(
							'tanki_footer_mascot',
							'assets/img/footer-mascot.png',
							'site-footer__mascot-img',
							__( 'Маскот', 'tanki-online-news' )
						);
						?>
					</div>
				</div>
			</div>

			<a class="site-footer__cta" href="#"><?php esc_html_e( 'Играть в браузере', 'tanki-online-news' ); ?></a>

			<a class="site-footer__partner" href="#" target="_blank" rel="noopener noreferrer">
				<?php
				echo tanki_get_footer_image_html(
					'tanki_footer_partner_logo',
					'assets/img/ag-logo.svg',
					'site-footer__partner-img',
					__( 'Alternativa games', 'tanki-online-news' )
				);
				?>
			</a>
		</div>
	</div>

	<div class="site-footer__bottom">
		<div class="site-footer__bottom-inner">
			<div class="site-footer__legal">
				<img
					class="site-footer__cookie-icon"
					src="<?php echo esc_url( TANKI_THEME_URI . '/assets/img/cookie.png' ); ?>"
					width="40"
					height="40"
					alt=""
					aria-hidden="true"
					decoding="async"
				>
				<p class="site-footer__copy">
					&copy;
					<?php
					printf(
						/* translators: %s: current year */
						esc_html__( 'ООО «Альтернатива Гейм» (ИНН 5906071031) 2010–%s. Все права защищены.', 'tanki-online-news' ),
						esc_html( (string) $footer_year )
					);
					?>
				</p>
			</div>

			<nav class="site-footer__nav" aria-label="<?php esc_attr_e( 'Меню футера', 'tanki-online-news' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'container'      => false,
						'menu_class'     => 'site-footer__menu-list',
						'fallback_cb'    => 'tanki_footer_menu_fallback',
						'depth'          => 1,
					)
				);
				?>
			</nav>

			<img
				class="site-footer__age"
				src="<?php echo esc_url( TANKI_THEME_URI . '/assets/img/rars-12.svg' ); ?>"
				width="40"
				height="44"
				alt="<?php esc_attr_e( '12+', 'tanki-online-news' ); ?>"
				decoding="async"
			>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
