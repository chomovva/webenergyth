<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Устанавливает префикс для архивов
 * */
function get_custom_archive_title_prefix( $prefix ){
	return get_theme_mod( 'archivetitleprefix' );
}

add_filter( 'get_the_archive_title_prefix', 'webenergyth\get_custom_archive_title_prefix' );


/**
 * Добавляет обёртку для основного контента
 * */
function add_theme_container_wrap_start() {
	include get_theme_file_path( 'views/container-before.php' );
}

add_action( 'theme_container_before', 'webenergyth\add_theme_container_wrap_start', 10, 0 );


/**
 * Закрывает обёртку для основного контента
 * */
function add_theme_container_wrap_end() {
	include get_theme_file_path( 'views/container-after.php' );
}

add_action( 'theme_container_after', 'webenergyth\add_theme_container_wrap_end', 10, 0 );


/**
 * 
 * */
function print_scripts_head() {
    echo force_balance_tags( get_theme_mod( 'additionalscriptswphead' ) );
}

add_action( 'wp_head', 'webenergyth\print_scripts_head', 99, 0 );


/**
 * 
 * */
function print_scripts_footer() {
    echo force_balance_tags( get_theme_mod( 'additionalscriptswpfooter' ) );
}

add_action( 'wp_footer', 'webenergyth\print_scripts_footer', 99, 0 );