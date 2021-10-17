<?php


namespace webenergyth;


global $post;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = trim( get_theme_mod( 'hometechnologestitle' ) );
$entries = wp_parse_id_list( get_theme_mod( 'hometechnologes' ) );
$content = '';


if ( is_array( $entries ) && ! empty( $entries ) ) {

	ob_start();

	foreach ( $entries as $post ) {

		setup_postdata( $post );

		include get_theme_file_path( 'views/entry-technology.php' );

	}

	wp_reset_postdata();

	$content = ob_get_contents();

	ob_end_clean();

}


include get_theme_file_path( 'views/home-technologes.php' );