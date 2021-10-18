<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function theme_supports() {
	add_theme_support( 'menus' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', [ 'script', 'style' ] );
	add_filter( 'widget_text', 'do_shortcode' );
}

add_action( 'after_setup_theme', 'webenergyth\theme_supports' );


/**
 * Возвращает список социальных сетей для кнопок "поделиться"
 * */
function get_list_of_socials( $items = [] ) {
	return array_merge( $items, [
		'linkedin'      => __( 'linkedIn', WEBENERGYTH_TEXTDOMAIN ),
		'facebook'      => __( 'Facebook', WEBENERGYTH_TEXTDOMAIN ),
		'instagram'     => __( 'instaram', WEBENERGYTH_TEXTDOMAIN ),
		'fh'            => __( 'freelancehunt', WEBENERGYTH_TEXTDOMAIN ),
		'kwork'         => __( 'Kwork', WEBENERGYTH_TEXTDOMAIN ),
	] );
}

add_filter( 'socials_list', 'webenergyth\get_list_of_socials', 10, 1 );