<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function get_pll_languages_list( $default ) {
	$args = apply_filters( 'get_pll_languages_list_args', [
		'raw'              => 1,
		'display_names_as' => 'slug',
	] );
	$languages = pll_the_languages( $args );
	return array_merge( $default, ( is_array( $languages ) && count( $languages ) > 1 ) ? $languages : [] );
}

add_filter( 'languages_list', 'webenergyth\get_pll_languages_list', 10, 1 );