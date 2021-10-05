<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация меню
 */
function register_theme_nav_menus() {
	register_nav_menus( [
		'main'        => __( 'Главное меню', WEBENERGYTH_TEXTDOMAIN ),
		'mobile'      => __( 'Мобильное меню', WEBENERGYTH_TEXTDOMAIN ),
	] );
}

add_action( 'after_setup_theme', 'webenergyth\register_theme_nav_menus' );