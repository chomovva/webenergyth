<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


echo wpautop( apply_filters( 'no_posts_text', __( 'Ничего не найдено', WEBENERGYTH_TEXTDOMAIN ) ), true );