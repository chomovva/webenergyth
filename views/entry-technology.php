<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


echo wp_get_attachment_image( get_the_ID(), 'medium', false, [
	'class' => 'entry',
] );