<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Загрузка "переводов"
 */
function load_textdomain() {
	load_theme_textdomain( WEBENERGYTH_TEXTDOMAIN, WEBENERGYTH_DIR . 'languages/' );
}
add_action( 'after_setup_theme', 'webenergyth\load_textdomain' );
