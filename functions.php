<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


global $pagenow;


define( 'WEBENERGYTH_URL', get_template_directory_uri() . '/' );
define( 'WEBENERGYTH_DIR', get_template_directory() . '/' );
define( 'WEBENERGYTH_TEXTDOMAIN', 'webenergyth' );
define( 'WEBENERGYTH_SLUG', 'webenergyth' );


get_template_part( 'includes/textdomain' );
get_template_part( 'includes/theme-functions' );
get_template_part( 'includes/brand' );
get_template_part( 'includes/sidebars' );
get_template_part( 'includes/theme-supports' );
get_template_part( 'includes/menus' );


if ( in_array( 'polylang/polylang.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	get_template_part( 'pll/language-switcher' );
	get_template_part( 'pll/register-strings' );
	get_template_part( 'pll/translation-mods' );
}


if ( is_admin() ) {
	isset( $_GET[ 'activated' ] ) && 'themes.php' == $pagenow && get_template_part( 'includes/theme-activate' );
} else {
	get_template_part( 'includes/hooks-public' );
	get_template_part( 'includes/enqueue-public' );
	get_template_part( 'includes/search-result' );
}


if ( is_customize_preview() ) {
	get_template_part( 'customizer/control', 'separator' );
	get_template_part( 'customizer/control', 'list' );
	get_template_part( 'customizer/control', 'gallery' );
	get_template_part( 'customizer/control', 'editor' );
	get_template_part( 'customizer/control', 'terms' );
	get_template_part( 'customizer/panels' );
	get_template_part( 'customizer/scripts' );
	get_template_part( 'customizer/socials' );
	get_template_part( 'customizer/template', 'archive' );
	get_template_part( 'customizer/template', '404' );
	get_template_part( 'customizer/parts', 'jumbotron' );
	get_template_part( 'customizer/parts', 'about' );
	get_template_part( 'customizer/parts', 'technologes' );
	get_template_part( 'customizer/parts', 'skills' );
	get_template_part( 'customizer/parts', 'blog' );
	get_template_part( 'customizer/parts', 'feedback' );
	get_template_part( 'customizer/parts', 'footer' );	
}