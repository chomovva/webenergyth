<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_technologes( $wp_customize ) {

	$wp_customize->add_section(
		WEBENERGYTH_SLUG . '_home_technologes',
		[
			'title'            => sprintf( '%s - %s', __( 'Главная страница', WEBENERGYTH_TEXTDOMAIN ),  __( 'Технологии', WEBENERGYTH_TEXTDOMAIN ) ),
			'priority'         => 40,
			'panel'            => 'template_parts',
		]
	); /**/

	$wp_customize->add_setting(
		'hometechnologesusedby',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'webenergyth\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'hometechnologesusedby',
		[
			'section'           => WEBENERGYTH_SLUG . '_home_technologes',
			'label'             => __( 'Использовать секцию', WEBENERGYTH_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'hometechnologesusedby', [
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'hometechnologestitle',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'hometechnologestitle',
		[
			'section'           => WEBENERGYTH_SLUG . '_home_technologes',
			'label'             => __( 'Заголовок &lt;H2&gt;', WEBENERGYTH_TEXTDOMAIN ),
			'description'       => __( 'Заголовок скрыт', WEBENERGYTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'hometechnologestitle', [
		'selector'         => '#technologes-title',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'hometechnologestitle' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'hometechnologes',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_parse_id_list',
		]
	);
	$wp_customize->add_control(
		new WP_Customize_Control_Gallery(
			$wp_customize,
			'hometechnologes',
			[
				'label'      => __( 'Логотипы', WEBENERGYTH_TEXTDOMAIN ),
				'section'    => WEBENERGYTH_SLUG . '_home_technologes',
			]
		)
	);
	$wp_customize->selective_refresh->add_partial( 'hometechnologes', [
		'selector'         => '#technologes-wrap',
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'webenergyth\customizer_register_home_technologes', 10, 1 );