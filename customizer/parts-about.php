<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_about( $wp_customize ) {

	$wp_customize->add_section(
		WEBENERGYTH_SLUG . '_home_about',
		[
			'title'            => sprintf( '%s - %s', __( 'Главная страница', WEBENERGYTH_TEXTDOMAIN ),  __( 'Об авторе', WEBENERGYTH_TEXTDOMAIN ) ),
			'priority'         => 30,
			'panel'            => 'template_parts',
		]
	); /**/

	$wp_customize->add_setting(
		'homeaboutusedby',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'webenergyth\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'homeaboutusedby',
		[
			'section'           => WEBENERGYTH_SLUG . '_home_about',
			'label'             => __( 'Использовать секцию', WEBENERGYTH_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeaboutusedby', [
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeabouttitle',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homeabouttitle',
		[
			'section'           => WEBENERGYTH_SLUG . '_home_about',
			'label'             => __( 'Заголовок &lt;H2&gt;', WEBENERGYTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeabouttitle', [
		'selector'         => '#about-title',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homeabouttitle' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeaboutdescription',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post',
		]
	);
	$wp_customize->add_control(
		new WP_Customize_Control_Tinymce_Editor(
			$wp_customize,
			'homeaboutdescription',
			[
				'label'                 => __( 'Описание', WEBENERGYTH_TEXTDOMAIN ),
				'section'               => WEBENERGYTH_SLUG . '_home_about',
				'settings'              => 'homeaboutdescription'
			]
		)
	);
	$wp_customize->selective_refresh->add_partial( 'homeaboutdescription', [
		'selector'         => '#about-description',
		'render_callback'  => function () { return customizer_get_editor_theme_mod( 'homeaboutdescription' ); },
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'webenergyth\customizer_register_home_about', 10, 1 );