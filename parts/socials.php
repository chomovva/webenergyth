<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = trim( get_theme_mod( 'socialstitle' ) );
$socials = [];

foreach ( apply_filters( 'socials_list', [] ) as $key => $label ) {
	$url = get_theme_mod( 'socials' . $key . 'hrefattr' );
	if ( ! empty( $url ) ) {
		$socials[] = [
			'url'   => $url,
			'key'   => $key,
			'label' => $label,
		];
	}
}


include get_theme_file_path( 'views/socials.php' );