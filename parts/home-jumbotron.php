<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = trim( get_theme_mod( 'homejumbotrontitle' ) );
$description = trim( get_theme_mod( 'homejumbotrondescription' ) );
$thumbnail_src = get_theme_mod( 'homejumbotronthumbnailsrc' );
$thumbnail_id = is_url( $thumbnail_src ) ? attachment_url_to_postid( removing_image_size_from_url( $thumbnail_src ) ) : 0;
$label = trim( get_theme_mod( 'homejumbotronbtnlabel' ) );
$href = trim( get_theme_mod( 'homejumbotronbtnhref' ) );


include get_theme_file_path( 'views/home-jumbotron.php' );