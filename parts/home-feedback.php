<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = trim( get_theme_mod( 'homefeedbacktitle' ) );
$excerpt = trim( get_theme_mod( 'homefeedbackexcerpt' ) );
$shortcode = trim( get_theme_mod( 'homefeedbackshortcode' ) );


include get_theme_file_path( 'views/home-feedback.php' );