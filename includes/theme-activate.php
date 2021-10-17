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

		'homejumbotronusedby'       => false,
		'homejumbotrontitle'        => get_bloginfo( 'title' ),
		'homejumbotrondescription'  => get_bloginfo( 'description' ),
		'homejumbotronthumbnailsrc' => '',
		'homejumbotronbtnlabel'     => '',
		'homejumbotronbtnhref'      => '',

		'homeaboutusedby'           => false,
		'homeabouttitle'            => __( 'Обо мне', WEBENERGYTH_TEXTDOMAIN ),
		'homeaboutdescription'      => '',

		'hometechnologesusedby'     => false,
		'hometechnologestitle'      => '',
		'hometechnologes'           => '',

		'homeskillsusedby'          => false,
		'homeskillstitle'           => __( 'Мои навыки', WEBENERGYTH_TEXTDOMAIN ),
		'homeskillsexcerpt'         => '',
		'homeskills'                => '',
		'homeskillsthumbnailsrc'    => '',

		'homefeedbackusedby'        => false,
		'homefeedbacktitle'         => __( 'Связаться со мной', WEBENERGYTH_TEXTDOMAIN ),
		'homefeedbackexcerpt'       => '',
		'homefeedbackshortcode'     => '',

		'homeblogusedby'            => false,
		'homeblogtitle'             => __( 'Мой блог', WEBENERGYTH_TEXTDOMAIN ),
		'homeblogtags'              => [],
		'homebloglabel'             => __( 'Смотреть ещё', WEBENERGYTH_TEXTDOMAIN ),
		'homeblogcategoryid'        => 0,
		'homeblognumberposts'       => 6,

		'additionalscriptswphead'   => '',
		'additionalscriptswpfooter' => '',

		'sidemobiletitle'           => __( 'Сайдбар', WEBENERGYTH_TEXTDOMAIN ),
		'sidecolumntitle'           => __( 'Сайдбар', WEBENERGYTH_TEXTDOMAIN ),

		'footercopyauthor'          => '',
		'footersocialsusedby'       => false,
		'footercopytitle'           => get_bloginfo( 'name', 'raw' ),

		'archivetitleprefix'        => '',

		'error404title'             => __( 'Страница не найдена', WEBENERGYTH_TEXTDOMAIN ),
		'error404description'       => '',

		'socialstitle'              => __( 'Мои профили социальных сетей и на фриланс биржах', WEBENERGYTH_TEXTDOMAIN ),
		'socialslinkedinhrefattr' => '',
		'socialsfacebookhrefattr' => '',
		'socialsinstagramhrefattr' => '',
		'socialsfreelancehunthrefattr' => '',
		'socialskworkhrefattr' => '',

	], $mods ) );
}

add_action( 'after_switch_theme', 'webenergyth\setup_default_mods' );