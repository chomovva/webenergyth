<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Перевод настроект блока главной "Скилы"
 * */
function translate_pll_home_skills_list( $value ) {
	return translate_list_strings( $value, [
		'title'                 => 'pll__',
	] );
}


/**
 * Перевод файлов
 * */
function translate_pll_attachments( $value ) {
	if ( pll_is_translated_post_type( 'attachment' ) ) {
		$value = array_map( 'pll_get_post', wp_parse_id_list( $value ) );
	}
	return $value;
}


/**
 * Перевод таксономий
 * */
function translate_pll_terms( $value ) {
	return array_map( 'pll_get_post', wp_parse_id_list( $value ) );
}


/**
 * перевод всех настроек
 * */
function add_translation_string_mods() {
	$mods = apply_filters( 'template_pll_theme_mod_translate', [
		'homejumbotrontitle'        => 'pll__',
		'homejumbotrondescription'  => 'pll__',
		'homejumbotronbtnlabel'     => 'pll__',
		'homejumbotronbtnhref'      => 'pll__',
		'homeabouttitle'            => 'pll__',
		'homeaboutdescription'      => 'pll__',
		'hometechnologestitle'      => 'pll__',
		'hometechnologes'           => 'webenergyth\translate_pll_attachments',
		'homeskillstitle'           => 'pll__',
		'homeskillsexcerpt'         => 'pll__',
		'homeskills'                => 'webenergyth\translate_pll_home_skills_list',
		'homefeedbacktitle'         => 'pll__',
		'homefeedbackexcerpt'       => 'pll__',
		'homefeedbackshortcode'     => 'pll__',
		'homeblogtitle'             => 'pll__',
		'homeblogtags'              => 'webenergyth\translate_pll_terms',
		'homebloglabel'             => 'pll__',
		'homeblogcategoryid'        => 'pll_get_term',
		'sidemobiletitle'           => 'pll__',
		'sidecolumntitle'           => 'pll__',
		'footercopyauthor'          => 'pll__',
		'footercopytitle'           => 'pll__',
		'archivetitleprefix'        => 'pll__',
		'error404title'             => 'pll__',
		'error404description'       => 'pll__',
		'socialstitle'              => 'pll__',
		'socialslinkedinhrefattr'   => 'pll__',
		'socialsfacebookhrefattr'   => 'pll__',
		'socialsinstagramhrefattr'  => 'pll__',
		'socialsfhhrefattr'         => 'pll__',
		'socialskworkhrefattr'      => 'pll__',
	] );
	foreach ( $mods as $name => $func ) {
		add_filter( 'theme_mod_' . $name, $func, 10, 1 );
	}
}

add_action( 'init', 'webenergyth\add_translation_string_mods', 10, 0 );