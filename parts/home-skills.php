<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = trim( get_theme_mod( 'homeskillstitle' ) );
$excerpt = trim( get_theme_mod( 'homeskillsexcerpt' ) );
$entries = get_theme_mod( 'homeskills' );
$content = '';
$thumbnail_src = get_theme_mod( 'homeskillsthumbnailsrc' );
$thumbnail_id = is_url( $thumbnail_src ) ? : 0;

if ( is_string( $entries ) ) {
	$entries = json_decode( $entries, true );
}

if ( is_array( $entries ) && ! empty( $entries ) ) {
	ob_start();
	foreach ( $entries as $entry ) {
		include get_theme_file_path( 'views/entry-skill.php' );
	}
	$content = ob_get_contents();
	ob_end_clean();
}

include get_theme_file_path( 'views/home-skills.php' );