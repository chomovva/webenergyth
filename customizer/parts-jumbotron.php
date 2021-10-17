<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_jumbotron( $wp_customize ) {

	$wp_customize->add_section(
		WEBENERGYTH_SLUG . '_home_jumbotron',
		[
			'title'            => sprintf( '%s - %s', __( 'Главная страница', WEBENERGYTH_TEXTDOMAIN ),  __( 'Первый экран', WEBENERGYTH_TEXTDOMAIN ) ),
			'priority'         => 20,
			'panel'            => 'template_parts',
		]
	); /**/

	$wp_customize->add_setting(
		'homejumbotronusedby',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'webenergyth\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'homejumbotronusedby',
		[
			'section'           => WEBENERGYTH_SLUG . '_home_jumbotron',
			'label'             => __( 'Использовать секцию', WEBENERGYTH_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homejumbotronusedby', [
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homejumbotrontitle',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homejumbotrontitle',
		[
			'section'           => WEBENERGYTH_SLUG . '_home_jumbotron',
			'label'             => __( 'Заголовок &lt;H1&gt;', WEBENERGYTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homejumbotrontitle', [
		'selector'         => '#jumbotron-title',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homejumbotrontitle' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homejumbotronbtnlabel',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homejumbotronbtnlabel',
		[
			'section'           => WEBENERGYTH_SLUG . '_home_jumbotron',
			'label'             => __( 'Подпись кнопки;', WEBENERGYTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homejumbotronbtnlabel', [
		'selector'         => '#jumbotron-permalink',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homejumbotronbtnlabel' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homejumbotronbtnhref',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homejumbotronbtnhref',
		[
			'section'           => WEBENERGYTH_SLUG . '_home_jumbotron',
			'label'             => __( 'Атрибут HREF кнопки', WEBENERGYTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homejumbotronbtnhref', [
		'render_callback'  => function () {
			return customizer_render_parts_element_by_id( 'parts/home', 'jumbotron', [], 'jumbotron-permalink' );
		},
		'container_inclusive' => true,
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homejumbotrondescription',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post',
		]
	);
	$wp_customize->add_control(
		new WP_Customize_Control_Tinymce_Editor(
			$wp_customize,
			'homejumbotrondescription',
			[
				'label'                 => __( 'Описание', WEBENERGYTH_TEXTDOMAIN ),
				'section'               => WEBENERGYTH_SLUG . '_home_jumbotron',
				'settings'              => 'homejumbotrondescription'
			]
		)
	);
	$wp_customize->selective_refresh->add_partial( 'homejumbotrondescription', [
		'selector'         => '#jumbotron-description',
		'render_callback'  => function () { return customizer_get_editor_theme_mod( 'homejumbotrondescription' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homejumbotronthumbnailsrc',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'esc_url_raw',
		]
	);
	$wp_customize->add_control(
		new \WP_Customize_Image_Control(
			$wp_customize,
			'homejumbotronthumbnailsrc',
			[
				'label'         => __( 'Превью', WEBENERGYTH_TEXTDOMAIN ),
				'section'       => WEBENERGYTH_SLUG . '_home_jumbotron',
				'settings'      => 'homejumbotronthumbnailsrc',
			]
		)
	);
	$wp_customize->selective_refresh->add_partial( 'homejumbotronthumbnailsrc', [
		'selector'         => '#jumbotron-thumbnail-wrap',
		'render_callback'  => function () {
			return customizer_render_parts_element_by_id( 'parts/home', 'jumbotron', [], 'jumbotron-thumbnail-wrap' );
		},
		'container_inclusive' => true,
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'webenergyth\customizer_register_home_jumbotron', 10, 1 );