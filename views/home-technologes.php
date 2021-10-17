<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<section class="section section--technologes technologes bg-primary" id="technologes">
	<div class="container">
		
		<?php if ( isset( $title ) && ! empty( $title ) ) : ?>
			<h2 class="sr-only text-center" id="technologes-title"><?php echo $title; ?></h2>
		<?php endif; ?>

		<?php if ( isset( $content ) && ! empty( $content ) ) : ?>
			<div class="text-center" id="technologes-wrap">
				<?php echo $content; ?>
			</div>
		<?php endif; ?>

	</div>
</section>