<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


get_header();


?>


<div class="container">
	
	<h1><?php the_archive_title( '', '' ); ?></h1>

	<?php get_template_part( 'parts/breadcrumbs' ); ?>

	<?php if ( have_posts() ) : ?>

		<h2 class="sr-only"><?php _e( 'Список постов', WEBENERGYTH_TEXTDOMAIN ); ?></h2>
		
		<div class="list">

			<?php include get_theme_file_path( 'views/entry-archive.php' ); ?>

		</div>
		
		<?php the_posts_pagination(); ?>

	<?php else : include get_theme_file_path( 'views/no-posts.php' ); endif; ?>

</div>

<?php get_footer();