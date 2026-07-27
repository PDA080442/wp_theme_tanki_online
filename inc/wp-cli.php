<?php
/**
 * WP-CLI commands for Tanki Online News theme.
 *
 * @package Tanki_Online_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'WP_CLI' ) || ! WP_CLI ) {
	return;
}

/**
 * Seed demo tanki_news posts from theme assets.
 */
class Tanki_Seed_Demo_News_Command {

	/**
	 * Create or refresh 18 demo news posts (CPT, taxonomy, featured images).
	 *
	 * ## OPTIONS
	 *
	 * [--replace-all]
	 * : Delete ALL tanki_news posts before seeding (including non-demo entries).
	 *
	 * ## EXAMPLES
	 *
	 *     wp tanki seed-demo-news
	 *     wp tanki seed-demo-news --replace-all
	 *
	 * @param array $args       Positional args.
	 * @param array $assoc_args Associative args.
	 */
	public function __invoke( $args, $assoc_args ) {
		$replace_all = ! empty( $assoc_args['replace-all'] );

		if ( $replace_all ) {
			WP_CLI::warning(
				'--replace-all: all tanki_news posts will be permanently deleted before seeding.'
			);
		}

		if ( ! function_exists( 'tanki_seed_demo_news' ) ) {
			WP_CLI::error( 'tanki_seed_demo_news() is not available. Is the theme active?' );
		}

		$stats = tanki_seed_demo_news( $replace_all );

		WP_CLI::success(
			sprintf(
				'Demo news seeded: created %d, updated %d, skipped %d.',
				(int) $stats['created'],
				(int) $stats['updated'],
				(int) $stats['skipped']
			)
		);
	}
}

WP_CLI::add_command( 'tanki seed-demo-news', 'Tanki_Seed_Demo_News_Command' );
