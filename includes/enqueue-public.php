<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Подключение скриптов
 *
 * @param string $handle Имя / идентификатор скрипта
 * @param string $src URL на файл скрипта
 * @param array $deps массив зависимостей
 * @param string|bool $ver версия
 * @param bool $in_footer подключать в шапке или подвале
 */
function scripts() {
	$suffix = SCRIPT_DEBUG ? '.min' : '';
	wp_enqueue_script( 'webenergyth-public', get_theme_file_uri( "scripts/public{$suffix}.js" ), [ 'jquery', 'fancybox' ], filemtime( get_theme_file_path( "scripts/public{$suffix}.js" ) ), true );
	wp_enqueue_script( 'fancybox', get_theme_file_uri( "scripts/fancybox{$suffix}.js" ), [ 'jquery' ], '3.3.5', true );
	file_exists( $init_gallery_script_path = get_theme_file_path( 'scripts/init/fancybox-gallery.js' ) ) && wp_add_inline_script( 'fancybox', file_get_contents( $init_gallery_script_path ), 'after' );
	wp_enqueue_script( 'superembed', get_theme_file_uri( "scripts/superembed{$suffix}.js" ), [ 'jquery' ], '3.1', true );
}

add_action( 'wp_enqueue_scripts', 'webenergyth\scripts' );


/**
 * Добавляет предварительную загрузку шрифтов
 * */
function add_preload_resource() {
	foreach ( apply_filters( 'preload_resource_part', [
		// path => font
	] ) as $file_path => $type ) {
		$file_uri = get_theme_file_uri( $file_path );
		if ( $file_uri ) {
			echo '<link rel="preload" href="' . $file_uri . '" as="' . $type . '" crossorigin="anonymous">';
		}
	}
}

add_action( 'head_start', 'webenergyth\add_preload_resource' );


/**
 * Отключение стилей при выводе их в шапке, чтобы подкючить в подвале сайта
 */
function dequeue_style() {
	wp_dequeue_style( 'contact-form-7' );
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wpdiscuz-font-awesome' );
	wp_dequeue_style( 'wpdiscuz-frontend-css' );
	wp_dequeue_style( 'wpdiscuz-user-content-css' );
	wp_dequeue_style( 'exactmetrics-popular-posts-style-css' );
	wp_dequeue_style( 'tablepress-default-css' );
	wp_dequeue_style( 'site-reviews-css' );
	wp_dequeue_style( 'dashicons-css' );
	wp_dequeue_style( 'exactmetrics-vue-frontend-style-css' );
}

add_action( 'wp_print_styles', 'webenergyth\dequeue_style' );


/**
 * Подключение стилей
 *
 * @param string $handle Имя / идентификатор стиля
 * @param string $src URL на файла стиля
 * @param array $deps массив зависимостей
 * @param string|bool $ver версия
 * @param string $media для каких устройств подключать
 */
function print_styles() {
	$suffix = SCRIPT_DEBUG ? '' : '.min';
	wp_enqueue_style( 'webenergyth-fonts', get_theme_file_uri( "styles/fonts{$suffix}.css" ), [], filemtime( get_theme_file_path( "styles/fonts{$suffix}.css" ) ), 'all' );
	wp_enqueue_style( 'webenergyth-public', get_theme_file_uri( "styles/public{$suffix}.css" ), [], filemtime( get_theme_file_path( "styles/public{$suffix}.css" ) ), 'all' );
	wp_enqueue_style( 'fancybox', get_theme_file_uri( "styles/fancybox{$suffix}.css" ), [], '3.3.5', 'all' );
	wp_enqueue_style( 'contact-form-7' );
	wp_enqueue_style( 'wp-block-library' );
	wp_enqueue_style( 'wpdiscuz-font-awesome' );
	wp_enqueue_style( 'wpdiscuz-frontend-css' );
	wp_enqueue_style( 'wpdiscuz-user-content-css' );
	wp_enqueue_style( 'exactmetrics-popular-posts-style-css' );
	wp_enqueue_style( 'tablepress-default-css' );
	wp_enqueue_style( 'dashicons-css' );
	wp_enqueue_style( 'exactmetrics-vue-frontend-style-css' );
}
add_action( 'get_footer', 'webenergyth\print_styles', 10, 0 );


/**
 * Подключение стилей инлайн для более быстрой отрисовки страницы
 * */
function ctitical_styles() {
	$suffix = SCRIPT_DEBUG ? '' : '.min';
	$critical_file_path = get_theme_file_path( "styles/critical{$suffix}.css" );
	if ( file_exists( $critical_file_path ) ) {
		echo '<style type="text/css">' . file_get_contents( $critical_file_path ) . '</style>';
	}
}

add_action( 'wp_head', 'webenergyth\ctitical_styles', 10, 0 );


/**
 * Удаляет аттрибуты для style и script, которые были добавленны в обход wp
 * */
function remove_type_attr_start() {
	ob_start();
}

function remove_type_attr_end() {
    echo preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', ob_get_clean() );
}

add_action( 'get_header', 'webenergyth\remove_type_attr_start', 5, 0 );
add_action( 'wp_footer', 'webenergyth\remove_type_attr_end', 99, 0 );