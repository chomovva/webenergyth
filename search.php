<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


global $wp_query;


get_header();


do_action( 'theme_container_before' ); ?>

	<div class="heading">
		<h1><?php _e( 'Результаты поиска', WEBENERGYTH_TEXTDOMAIN ); ?></h1>
		<div class="result">
			<span class="label"><?php esc_html_e( 'Всего найдено:', WEBENERGYTH_TEXTDOMAIN ); ?></span>
			<span class="value"><?php echo absint( $wp_query->post_count ); ?></span>
		</div>
	</div> <?php

	get_search_form( true );

	if ( have_posts() ) : $count = 1; ?>

		<h2 class="sr-only"><?php _e( 'Список постов', WEBENERGYTH_TEXTDOMAIN ); ?></h2>

		<div class="wrap mt-3"> <?php

			while ( have_posts() ) :

				the_post();

				include get_theme_file_path( 'views/entry-archive.php' );

				$count++;

			endwhile; ?>

		</div> <?php

		the_posts_pagination( [] );

	else : include get_theme_file_path( 'views/no-posts.php' ); endif;
	
do_action( 'theme_container_after' );

get_footer();