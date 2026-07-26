<?php
/**
 * Single template for tanki_news CPT.
 *
 * @package Tanki_Online_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/content', 'single-news' );
endwhile;

get_footer();
