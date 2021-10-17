<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_blog( $wp_customize ) {

	$wp_customize->add_section(
		WEBENERGYTH_SLUG . '_home_blog',
		[
			'title'            => sprintf( '%s - %s', __( 'Главная страница', WEBENERGYTH_TEXTDOMAIN ),  __( 'Блог', WEBENERGYTH_TEXTDOMAIN ) ),
			'priority'         => 60,
			'panel'            => 'template_parts',
		]
	); /**/

	$wp_customize->add_setting(
		'homeblogusedby',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'webenergyth\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'homeblogusedby',
		[
			'section'           => WEBENERGYTH_SLUG . '_home_blog',
			'label'             => __( 'Использовать секцию', WEBENERGYTH_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeblogusedby', [
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeblogtitle',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homeblogtitle',
		[
			'section'           => WEBENERGYTH_SLUG . '_home_blog',
			'label'             => __( 'Заголовок &lt;H2&gt;', WEBENERGYTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeblogtitle', [
		'selector'         => '#blog-title',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homeblogtitle' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeblogtags',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_parse_id_list',
		]
	);
	$wp_customize->add_control(
		new WP_Customize_Control_Terms(
			$wp_customize,
			'homeblogtags',
			[
				'label'         => __( 'Список тегов', WEBENERGYTH_TEXTDOMAIN ),
				'section'       => WEBENERGYTH_SLUG . '_home_blog',
				'type'          => 'control_terms',
				'taxonomy'      => 'post_tag',
			]
		)
	);
	$wp_customize->selective_refresh->add_partial( 'homeblogtags', [
		'selector'         => '#blog-wrap',
		'render_callback'  => function () {
			return customizer_render_parts_element_by_id( 'parts/section', 'blog', [], 'blog-wrap' );
		},
		'container_inclusive' => true,
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'webenergyth\customizer_register_home_blog', 10, 1 );