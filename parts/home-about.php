<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = trim( get_theme_mod( 'homeabouttitle' ) );
$description = trim( get_theme_mod( 'homeaboutdescription' ) );


include get_theme_file_path( 'views/home-about.php' );