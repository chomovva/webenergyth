<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<div class="wrapper__item wrapper__item--mobilenav mobilenav" id="mobilenav">

	<button class="close" data-mobilenav="toggle">
		<span class="sr-only"><?php esc_html_e( 'Закрыть меню', WEBENERGYTH_TEXTDOMAIN ); ?></span>
	</button>

	<?php if ( has_custom_logo() ) : ?>
		<div class="text-center">
			<?php the_custom_logo(); ?>
		</div>
	<?php endif; ?>

	<?php wp_nav_menu( [
		'theme_location'  => 'main',
		'menu'            => 'main',
		'container'       => false,
		'menu_id'         => 'menu-mobilenav',
		'menu_class'      => 'menu mb-3 pb-3',
		'echo'            => true,
		'depth'           => 1,
		'fallback_cb'     => 'wp_page_menu',
	] ); ?>
	
	<?php get_search_form( true ); ?>

	<?php get_sidebar(); ?>

</div>