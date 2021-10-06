<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация "сайдбаров"
 */
function register_sidebars() {
	register_sidebar( [
		'name'             => __( 'Мобильный сайдбар', WEBENERGYTH_TEXTDOMAIN ),
		'id'               => 'mobile',
		'description'      => __( 'Отображается в мобильном меню.', WEBENERGYTH_TEXTDOMAIN ),
		'class'            => '',
		'before_widget'    => '<div id="%1$s" class="widget mb-3 %2$s">',
		'after_widget'     => '</div>',
		'before_title'     => '<h3 class="widget__title title">',
		'after_title'      => '</h3>',
	] );
	register_sidebar( [
		'name'             => __( 'Колонка', WEBENERGYTH_TEXTDOMAIN ),
		'id'               => 'column',
		'description'      => __( 'Отображается на страницах архива (категории) и отдельном шаблоне для постоянных страниц и постов.', WEBENERGYTH_TEXTDOMAIN ),
		'class'            => '',
		'before_widget'    => '<div id="%1$s" class="widget mb-3 %2$s">',
		'after_widget'     => '</div>',
		'before_title'     => '<h3 class="widget__title title">',
		'after_title'      => '</h3>',
	] );
}

add_action( 'widgets_init', 'webenergyth\register_sidebars' );