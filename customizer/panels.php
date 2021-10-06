<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_panels( $wp_customize ) {
	
	/**
	 * Настройки блоков темы
	 **/
	$wp_customize->add_panel(
		'template_parts',
		[
			'capability'      => 'edit_theme_options',
			'title'           => __( 'Блоки темы', WEBENERGYTH_TEXTDOMAIN ),
		]
	);

	/**
	 * Настройки шаблонов страниц
	 **/
	$wp_customize->add_panel(
		'page_templates',
		[
			'capability'      => 'edit_theme_options',
			'title'           => __( 'Шаблоны страниц', WEBENERGYTH_TEXTDOMAIN ),
		]
	);

}

add_action( 'customize_register', 'webenergyth\customizer_register_panels', 10, 1 );


/**
 * 
 * */
function customizer_decor_panels() {
	?>

		<style>
			#accordion-panel-template_parts .accordion-section-title::before {
				content: "\f11b";
				display: inline;
				font: normal 20px/1 dashicons;
				vertical-align: middle;
			}
			#accordion-panel-page_templates .accordion-section-title::before {
				content: "\f105";
				display: inline;
				font: normal 20px/1 dashicons;
				vertical-align: middle;
			}
		</style>

	<?php
}

add_action( 'customize_controls_print_styles', 'webenergyth\customizer_decor_panels' );