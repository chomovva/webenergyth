<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_socials( $wp_customize ) {

	$wp_customize->add_section(
		WEBENERGYTH_SLUG . '_socials',
		[
			'title'            => __( 'Социальные сети и контакты', WEBENERGYTH_TEXTDOMAIN ),
			'description'      => __( 'Используются в шапке и подвале сайта. В полях вводятся значения атрибут href.', WEBENERGYTH_TEXTDOMAIN ),
			'priority'         => 20,
		]
	); /**/

	$wp_customize->add_setting(
		'socialstitle',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'socialstitle',
		[
			'section'           => WEBENERGYTH_SLUG . '_socials',
			'label'             => __( 'Заголовок', WEBENERGYTH_TEXTDOMAIN ),
			'description'       => __( 'Скрыт, тег &lt;P&gt;', WEBENERGYTH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'socialstitle', [
		'selector'         => '#socials-title',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'socialstitle' ); },
		'fallback_refresh' => true,
	] ); /**/

	foreach ( apply_filters( 'socials_list', [] ) as $key => $label ) {
		$wp_customize->add_setting(
			'socials' . $key . 'hrefattr',
			[
				'transport'         => 'postMessage',
				'sanitize_callback' => 'esc_url_raw',
			]
		);
		$wp_customize->add_control(
			'socials' . $key . 'hrefattr',
			[
				'section'           => WEBENERGYTH_SLUG . '_socials',
				'label'             => $label,
				'type'              => 'text',
			]
		);
		$wp_customize->selective_refresh->add_partial( 'socials' . $key . 'hrefattr', [
			'selector'         => '.socials',
			'render_callback'  => '__return_false',
			'fallback_refresh' => true,
		] ); /**/
	}

}

add_action( 'customize_register', 'webenergyth\customizer_register_socials', 10, 1 );


/**
 * 
 * */
function customizer_decor_socials() {
	?>

		<style>
			#accordion-section-<?php echo WEBENERGYTH_SLUG; ?>_socials .accordion-section-title::before {
				content: "\f237";
				display: inline;
				font: normal 20px/1 dashicons;
				vertical-align: middle;
			}
		</style>

	<?php
}

add_action( 'customize_controls_print_styles', 'webenergyth\customizer_decor_socials' );