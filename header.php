<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<!DOCTYPE html>
<html <?php language_attributes(); ?> >

	<?php get_template_part( 'parts/head' ); ?>

	<body <?php body_class(); ?> >

		<div class="wrapper" id="wrapper">

			<?php get_template_part( 'parts/mobilenav' ); ?>

			<header class="wrapper__item wrapper__item--header header" id="header">
				<div class="container">

					<?php the_custom_logo(); ?>

					<?php wp_nav_menu( [
						'theme_location'  => 'main',
						'menu'            => 'main',
						'container'       => false,
						'menu_id'         => 'menu-main',
						'menu_class'      => 'menu',
						'echo'            => true,
						'depth'           => 1,
						'fallback_cb'     => '__return_empty_string',
					] ); ?>

					<button class="burger" id="burger" data-mobilenav="toggle">
						<span class="bar bar1"></span><span class="bar bar2"></span><span class="bar bar3"></span>
						<span class="sr-only"><?php esc_html_e( 'Меню', WEBENERGYTH_TEXTDOMAIN ); ?></span>
					</button>

				</div>
			</header>

			<main class="wrapper__item wrapper__item--main main" id="main">