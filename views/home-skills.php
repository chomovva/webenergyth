<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<section class="section section--skills skills" id="skills">
	<div class="container">
		<div class="content">

			<?php if ( isset( $title ) && ! empty( $title ) ) : ?>
				<h2 class="title" id="skills-title"><?php echo $title; ?></h2>
			<?php endif; ?>
			
			<?php if ( isset( $excerpt ) && ! empty( $excerpt ) ) : ?>
				<p id="skills-excerpt"><?php echo $excerpt; ?></p>
			<?php endif; ?>
			
			<?php if ( isset( $content ) && ! empty( $content ) ) : ?>
				<div id="skills-wrap">
					<?php echo $content; ?>
				</div>
			<?php endif; ?>

		</div>

		<?php if ( isset( $thumbnail_id ) && $thumbnail_id ) : ?>
			<div id="skills-thumbnail-wrap">
				<?php echo wp_get_attachment_image( $thumbnail_id, wp_is_mobile() ? 'medium' : 'large', false, [ 'class' => 'thumbnail' ] ); ?>
			</div>
		<?php endif; ?>

	</div>
</section>