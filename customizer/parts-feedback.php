<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_feedback( $wp_customize ) {

	$wp_customize->add_section(
		WEBENERGYTH_SLUG . '_home_feedback',
		[
			'title'            => sprintf( '%s - %s', __( 'Главная страница', WEBENERGYTH_TEXTDOMAIN ),  __( 'Обратная связь', WEBENERGYTH_TEXTDOMAIN ) ),
			'priority'         => 70,
			'panel'            => 'template_parts',
		]
	); /**/

	$wp_customize->add_setting(
		'homefeedbackusedby',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'webenergyth\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'homefeedbackusedby',
		[
			'section'           => WEBENERGYTH_SLUG . '_home_feedback',
			'label'             => __( 'Использовать секцию', WEBENERGYTH_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homefeedbackusedby', [
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homefeedbacktitle',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homefeedbacktitle',
		[
			'section'           => WEBENERGYTH_SLUG . '_home_feedback',
			'label'             => __( 'Заголовок &lt;H2&gt;', WEBENERGYTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homefeedbacktitle', [
		'selector'         => '#feedback-title',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homefeedbacktitle' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homefeedbackexcerpt',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_textarea_field',
		]
	);
	$wp_customize->add_control(
		'homefeedbackexcerpt',
		[
			'section'           => WEBENERGYTH_SLUG . '_home_feedback',
			'label'             => __( 'Подзаголовок', WEBENERGYTH_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homefeedbackexcerpt', [
		'selector'         => '#feedback-excerpt',
		'render_callback'  => function () { return customizer_get_editor_theme_mod( 'homefeedbackexcerpt' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homefeedbackshortcode',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homefeedbackshortcode',
		[
			'section'           => WEBENERGYTH_SLUG . '_home_feedback',
			'label'             => __( 'Шорткод формы', WEBENERGYTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homefeedbackshortcode', [
		'selector'         => '#feedback-shortcode',
		'render_callback'  => function () {
			return customizer_render_parts_element_by_id( 'parts/home', 'feedback', [], 'feedback-shortcode' );
		},
		'container_inclusive' => true,
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'webenergyth\customizer_register_home_feedback', 10, 1 );