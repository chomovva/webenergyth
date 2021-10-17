<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


get_header();


do_action( 'theme_container_before' ); ?>
	
	<h1><?php the_archive_title( '', '' ); ?></h1><?php

	if ( ! is_tag() ) :get_template_part( 'parts/breadcrumbs' ); endif;

	the_archive_description( '', '' );

	if ( have_posts() ) : ?>

		<h2 class="sr-only"><?php _e( 'Список постов', WEBENERGYTH_TEXTDOMAIN ); ?></h2>
		
		<div class="list mb-3"> <?php

			while ( have_posts() ) :

				the_post();

				include get_theme_file_path( 'views/entry-archive.php' );

			endwhile; ?>

		</div> <?php

		the_posts_pagination();

	else : include get_theme_file_path( 'views/no-posts.php' ); endif;

do_action( 'theme_container_after' );

get_footer();