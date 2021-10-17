<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_skills( $wp_customize ) {

	$wp_customize->add_section(
		WEBENERGYTH_SLUG . '_home_skills',
		[
			'title'            => sprintf( '%s - %s', __( 'Главная страница', WEBENERGYTH_TEXTDOMAIN ),  __( 'Скилы', WEBENERGYTH_TEXTDOMAIN ) ),
			'priority'         => 50,
			'panel'            => 'template_parts',
		]
	); /**/

	$wp_customize->add_setting(
		'homeskillsusedby',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'webenergyth\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'homeskillsusedby',
		[
			'section'           => WEBENERGYTH_SLUG . '_home_skills',
			'label'             => __( 'Использовать секцию', WEBENERGYTH_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeskillsusedby', [
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeskillstitle',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homeskillstitle',
		[
			'section'           => WEBENERGYTH_SLUG . '_home_skills',
			'label'             => __( 'Заголовок &lt;H2&gt;', WEBENERGYTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeskillstitle', [
		'selector'         => '#skills-title',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homeskillstitle' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeskillsexcerpt',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_textarea_field',
		]
	);
	$wp_customize->add_control(
		'homeskillsexcerpt',
		[
			'section'           => WEBENERGYTH_SLUG . '_home_skills',
			'label'             => __( 'Подзаголовок', WEBENERGYTH_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeskillsexcerpt', [
		'selector'         => '#skills-excerpt',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homeskillsexcerpt' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeskills',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => function ( $data ) {
				$result = array_filter( array_map( function ( $value ) {
					return parse_only_allowed_args(
						[ 'usedby' => '', 'title' => '', 'value' => '' ],
						$value,
						[ 'webenergyth\sanitize_checkbox', 'sanitize_text_field', 'absint' ]
					);
				}, json_decode( $data, true ) ) );
				return ( is_array( $result ) ) ? wp_json_encode( $result, JSON_UNESCAPED_UNICODE ) : '[]';
			},
		]
	);
	$wp_customize->add_control(
		new WP_Customize_Control_list(
			$wp_customize,
			'homeskills',
			[
				'label'      => __( 'Список', WEBENERGYTH_TEXTDOMAIN ),
				'section'    => WEBENERGYTH_SLUG . '_home_skills',
				'type'       => 'list',
				'controls'   => [
					'value'      => [
						'type'     => 'number',
						'label'    => __( 'Значение', WEBENERGYTH_TEXTDOMAIN ),
						'input_atts' => [
							'min'      => '1',
							'max'      => '100',
						],
					],
				],
			]
		)
	);
	$wp_customize->selective_refresh->add_partial( 'homeskills', [
		'selector'         => '#skills-wrap',
		'render_callback'  => function () {
			return customizer_render_parts_element_by_id( 'parts/home', 'skills', [], 'skills-wrap' );
		},
		'container_inclusive' => true,
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeskillsthumbnailsrc',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'esc_url_raw',
		]
	);
	$wp_customize->add_control(
		new \WP_Customize_Image_Control(
			$wp_customize,
			'homeskillsthumbnailsrc',
			[
				'label'         => __( 'Фото', WEBENERGYTH_TEXTDOMAIN ),
				'section'       => WEBENERGYTH_SLUG . '_home_skills',
				'settings'      => 'homeskillsthumbnailsrc',
			]
		)
	);
	$wp_customize->selective_refresh->add_partial( 'homeskillsthumbnailsrc', [
		'selector'         => '#skills-thumbnail-wrap',
		'render_callback'  => function () {
			return customizer_render_parts_element_by_id( 'parts/home', 'skills', [], 'skills-thumbnail-wrap' );
		},
		'container_inclusive' => true,
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'webenergyth\customizer_register_home_skills', 10, 1 );