<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


get_header();

$sections_keys = apply_filters( 'home_section_list', [
	'jumbotron',
	'about',
	'technologes',
	'skills',
	'blog',
	'feedback',
] );

if ( is_array( $sections_keys ) && ! empty( $sections_keys ) ) {

	foreach ( $sections_keys as $key ) {
		if ( get_theme_mod( 'home' . $key . 'usedby' ) ) {
			get_template_part( 'parts/home', $key );
		}
	}

} else {

	include get_theme_file_path( 'index.php' );

}

get_footer();