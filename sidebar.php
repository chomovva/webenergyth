<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<?php if ( is_active_sidebar( 'mobile' ) ) : ?>
	<aside class="mt-3 pt-3 pb-3">

		<h2 class="sr-only">
			<?php echo esc_html( get_theme_mod( 'sidemobiletitle', __( 'Сайдбар', WEBENERGYTH_TEXTDOMAIN ) ) ); ?>
		</h2>
		
		<?php dynamic_sidebar( 'mobile' ) ?>

	</aside>
<?php endif; ?>