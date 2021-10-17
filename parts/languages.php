<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$languages = apply_filters( 'languages_list', [] );

if ( is_array( $languages ) && ! empty( $languages ) ) {

	$format_current_language = apply_filters( 'format_current_language', '<li class="current">%1$s</li>' );
	$format_other_language = apply_filters( 'format_other_language', '<li><a href="%2$s">%1$s</a></li>' );

	echo apply_filters( 'language_switcher_before', '<ul class="languages">' );

	foreach( $languages as $language ) {

		printf(
			$language[ 'current_lang' ] ? $format_current_language : $format_other_language,
			$language[ 'name' ],
			$language[ 'url' ],
			$language[ 'flag' ],
			$language[ 'slug' ]
		);

	}

	echo apply_filters( 'language_switcher_after', '</ul>' );

}