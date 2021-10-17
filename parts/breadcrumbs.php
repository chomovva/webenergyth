<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


echo apply_filters( 'breadcrumbs_before', '<div class="breadcrumbs mb-3 small" id="bredcrumbs">' );

$link_format = apply_filters( 'breadcrumbs_link_format', '<a href="%s">%s</a> » ' );

if ( function_exists( 'yoast_breadcrumb' ) ) {

	yoast_breadcrumb();

} else {

	if ( ! is_front_page() ) {

		printf( $link_format, home_url(), __( 'Главная', WEBENERGYTH_TEXTDOMAIN ) );
		
		if ( is_category() || is_single() ) {
			
				the_category( ' ' );

			}

			if ( is_single() ) {

				echo apply_filters( 'breadcrumbs_default_separator', ' » ' );
				the_title();

			}

		} elseif ( is_page() ) {

			echo the_title();
		
		}

	} else {

		echo __( 'Домашняя страница', WEBENERGYTH_TEXTDOMAIN );

	}
}

echo apply_filters( 'breadcrumbs_after', '</div>' );