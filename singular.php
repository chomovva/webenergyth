<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


get_header();

do_action( 'theme_container_before' );

if ( have_posts() ) {

	while ( have_posts() ) {

		the_post();

		include get_theme_file_path( 'views/entry-' . ( is_single() ? 'single' : 'page' ) . '.php' );

	}

}

if ( 'singular-column.php' == get_page_template_slug( get_the_ID() ) ) {
	get_sidebar( 'column' );
}

do_action( 'theme_container_after' );

get_footer();