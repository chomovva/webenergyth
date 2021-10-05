<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Добавляет опции темы по умолчанию при её активации
 **/
function setup_default_mods( $old_name ) {
	$theme_slug = get_option( 'stylesheet' );
	$mods = get_theme_mods();
	if ( ! is_array( $mods ) ) {
		$mods = [];
	}
	update_option( 'theme_mods_' . $theme_slug, array_merge( [

		// настройки шаблона Архива
		'archivetitleprefix'         => '',

		// страница ошибки 404
		'error404title'              => 'Страница не найдена',
		'error404description'        => '',

	], $mods ) );
}

add_action( 'after_switch_theme', 'webenergyth\setup_default_mods' );