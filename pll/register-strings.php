<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * 
 * */
function add_register_strings() {
	$strings = apply_filters( 'template_pll_register_strings', [
		'homejumbotrontitle'        => false,
		'homejumbotrondescription'  => true,
		'homejumbotronbtnlabel'     => false,
		'homejumbotronbtnhref'      => false,
		'homeabouttitle'            => false,
		'homeaboutdescription'      => true,
		'hometechnologestitle'      => false,
		'homeskillstitle'           => false,
		'homeskillsexcerpt'         => true,
		'homefeedbacktitle'         => false,
		'homefeedbackexcerpt'       => true,
		'homefeedbackshortcode'     => false,
		'homeblogtitle'             => false,
		'homebloglabel'             => false,
		'sidemobiletitle'           => false,
		'sidecolumntitle'           => false,
		'footercopyauthor'          => false,
		'footercopytitle'           => false,
		'archivetitleprefix'        => false,
		'error404title'             => false,
		'error404description'       => true,
		'socialstitle'              => false,
		'socialslinkedinhrefattr'   => false,
		'socialsfacebookhrefattr'   => false,
		'socialsinstagramhrefattr'  => false,
		'socialsfhhrefattr'         => false,
		'socialskworkhrefattr'      => false,
	] );
	foreach ( $strings as $name => $multiline ) {
		$string = get_theme_mod( $name );
		if ( ! empty( $string ) ) {
			pll_register_string( $name, $string, WEBENERGYTH_TEXTDOMAIN, $multiline );
		}
	}
}

add_action( 'init', 'webenergyth\add_register_strings', 10, 0 );


/**
 * 
 * */
function add_register_strings_home_skills() {
	$skills = get_theme_mod( 'homeskills' );
	if ( is_string( $skills ) ) {
		$skills = json_decode( $skills, true );
	}
	if ( is_array( $skills ) && ! empty( $skills ) ) {
		foreach ( $skills as $index => $entry ) {
			foreach ( [
				'title'   => false,
			] as $key => $multiline ) {
				if ( array_key_exists( $key, $entry ) && is_string( $entry[ $key ] ) && ! empty( trim( $entry[ $key ] ) ) ) {
					pll_register_string( 'skills' . $index . $key, $entry[ $key ], WEBENERGYTH_TEXTDOMAIN, $multiline );
				}
			}
		}
	}
}

add_action( 'init', 'webenergyth\add_register_strings_home_skills', 10, 0 );