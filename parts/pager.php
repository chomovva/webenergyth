<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


global $post;


echo apply_filters( 'pager_before', '<nav class="pager clearfix mt-3 mb-3" aria-label="...">' );


foreach ( [
	'previous'  => [
		'entry'     => get_previous_post(),
		'label'     => __( 'Смотреть предыдущий пост', WEBENERGYTH_TEXTDOMAIN ),
	],
	'next'      => [
		'entry'     => get_next_post(),
		'label'     => __( 'Смотреть следующий пост', WEBENERGYTH_TEXTDOMAIN ),
	],
] as $key => $value ) {
	extract( $value );
	if ( $entry && ! is_wp_error( $entry ) ) {
		$post = $entry;
		setup_postdata( $post );
		include get_theme_file_path( 'views/adjacent-post.php' );
	}
}

wp_reset_postdata();


echo apply_filters( 'pager_after', '</nav>' );