<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_scripts( $wp_customize ) {

	$wp_customize->add_section(
		WEBENERGYTH_SLUG . '_scripts',
		[
			'title'            => __( 'Дополнительные скрипты', WEBENERGYTH_TEXTDOMAIN ),
			'priority'         => 10,
		]
	); /**/

	$wp_customize->add_setting(
		'additionalscriptswphead',
		[
			'transport'         => 'postMessage',
		]
	);
	$wp_customize->add_control(
		'additionalscriptswphead',
		[
			'section'           => WEBENERGYTH_SLUG . '_scripts',
			'label'             => __( 'Выводится перед закрывающим тегом HEAD', 'diamondlaser' ),
			'type'              => 'textarea',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'scriptswphead', [
		'render_callback'       => '__return_false',
		'fallback_refresh'      => true,
	] ); /**/

	$wp_customize->add_setting(
		'additionalscriptswpfooter',
		[
			'transport'         => 'postMessage',
		]
	);
	$wp_customize->add_control(
		'additionalscriptswpfooter',
		[
			'section'           => WEBENERGYTH_SLUG . '_scripts',
			'label'             => __( 'Выводится в подвале сайта перед закрывающим тегом BODY', 'diamondlaser' ),
			'type'              => 'textarea',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'scriptswpfooter', [
		'render_callback'       => '__return_false',
		'fallback_refresh'      => true,
	] ); /**/

}

add_action( 'customize_register', 'webenergyth\customizer_register_scripts', 10, 1 );


/**
 * 
 * */
function customizer_decor_scripts() {
	?>

		<style>
			#accordion-section-<?php echo WEBENERGYTH_SLUG; ?>_scripts .accordion-section-title::before {
				content: "\f14b";
				display: inline;
				font: normal 20px/1 dashicons;
				vertical-align: middle;
			}
		</style>

	<?php
}

add_action( 'customize_controls_print_styles', 'webenergyth\customizer_decor_scripts' );