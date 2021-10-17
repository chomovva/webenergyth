<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<section class="section section--about about" id="about">
	<div class="container">

		<?php if ( isset( $title ) && ! empty( $title ) ) : ?>
			<h2 class="text-center" id="about-title"><?php echo $title; ?></h2>
		<?php endif; ?>
		
		<?php if ( isset( $desctiption ) && ! empty( $desctiption ) ) : ?>
			<div class="description" id="about-desctiption">
				<?php echo $desctiption; ?>
			</div>
		<?php endif; ?>

		
	</div>
</section>