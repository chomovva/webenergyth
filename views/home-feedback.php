<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<section class="section section--feedback feedback bg-gray" id="feedback">
	<div class="container">

		<?php if ( isset( $title ) && ! empty( $title ) ) : ?>
			<h2 id="feedback-title"><?php echo $title; ?></h2>
		<?php endif; ?>

		<?php if ( isset( $excerpt ) && ! empty( $excerpt ) ) : ?>
			<p id="feedback-excerpt"><?php echo $excerpt; ?></p>
		<?php endif; ?>

		<?php if ( isset( $shortcode ) && ! empty( $shortcode ) ) : ?>
			<div id="feedback-shortcode"><?php echo do_shortcode( $shortcode, false ); ?></div>
		<?php endif; ?>

	</div>
</section>