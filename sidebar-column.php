<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<?php if ( is_active_sidebar( 'column' ) ) : ?>
	<aside class="mt-3 pt-3 pb-3">

		<h2 id="side-column-title" class="sr-only">
			<?php echo esc_html( get_theme_mod( 'sidecolumntitle', __( 'Сайдбар', WEBENERGYTH_TEXTDOMAIN ) ) ); ?>
		</h2>
		
		<?php dynamic_sidebar( 'column' ) ?>

	</aside>
<?php endif; ?>