<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация "сайдбаров"
 */
function register_sidebars() {
	//-
}

add_action( 'widgets_init', 'webenergyth\register_sidebars' );