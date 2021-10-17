<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_parts_footer2( $wp_customize ) {

	$wp_customize->add_section(
		WEBENERGYTH_SLUG . '_parts_footer',
		[
			'title'            => __( 'Подвал сайта', WEBENERGYTH_TEXTDOMAIN ),
			'priority'         => 80,
			'panel'            => 'template_parts',
		]
	); /**/

	$wp_customize->add_setting(
		'footercopyauthor',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'footercopyauthor',
		[
			'section'           => WEBENERGYTH_SLUG . '_parts_footer',
			'label'             => __( 'Копирайт (автор)', WEBENERGYTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'footercopyauthor', [
		'selector'         => '#footer-copy-author',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'footercopyauthor' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'footercopytitle',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'footercopytitle',
		[
			'section'           => WEBENERGYTH_SLUG . '_parts_footer',
			'label'             => __( 'Копирайт (описание)', WEBENERGYTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'footercopytitle', [
		'selector'         => '#footer-copy-title',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'footercopytitle' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'footersocialsusedby',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'webenergyth\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'footersocialsusedby',
		[
			'section'           => WEBENERGYTH_SLUG . '_parts_footer',
			'label'             => __( 'Блок социальных сетей', WEBENERGYTH_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'footersocialsusedby', [
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'webenergyth\customizer_register_parts_footer2', 10, 1 );