<?php


namespace webenergyth;


global $post;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = trim( get_theme_mod( 'homeblogtitle' ) );
$description = trim( get_theme_mod( 'homeaboutdescription' ) );
$tags = get_theme_mod( 'homeblogtags' );
$label = trim( get_theme_mod( 'homebloglabel' ) );
$numberposts = absint( get_theme_mod( 'homeblognumberposts' ) );
$category_id = absint( get_theme_mod( 'homeblogcategoryid' ) );
$href = get_category_link( $category_id );
$content = '';
$entries = get_posts( [
	'numberposts' => $numberposts,
	'category'    => $category_id,
	'orderby'     => 'date',
	'order'       => 'DESC',
	'post_type'   => 'post',
	'suppress_filters' => true,
] );

if ( is_array( $entries ) && ! empty( $entries ) ) {
	ob_start();
	foreach ( $entries as $post ) {
		setup_postdata( $post );
		include get_theme_file_path( 'views/entry-archive.php' );
	}
	wp_reset_postdata();
	$content = trim( ob_get_contents() );
	ob_end_clean();

	if ( ! empty( $content ) ) {
		include get_theme_file_path( 'views/home-blog.php' );
	}

}