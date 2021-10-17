<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<section class="section section--jumbotron bg-gray" id="jumbotron">
	<div class="container">

		<?php if ( isset( $thumbnail_id ) && $thumbnail_id ) : ?>
			<div id="jumbotron-thumbnail-wrap">
				<?php echo wp_get_attachment_image( $thumbnail_id, 'medium', false, [ 'class' => 'thumbnail', 'id' => 'jumbotron-thumbnail' ] ); ?>
			</div>
		<?php endif; ?>

		<div class="content">

			<?php if ( isset( $title ) && ! empty( $title ) ) : ?>
				<h1 id="jumbotron-title"><?php echo $title; ?></h1>
			<?php endif; ?>

			<?php if ( isset( $description ) && ! empty( $description ) ) : ?>
				<div id="jumbotron-description">
					<?php echo $description; ?>
				</div>
			<?php endif; ?>

			<?php if ( isset( $href ) && is_url( $href ) && isset( $label ) && ! empty( $label ) ) : ?>
				<a class="btn btn-primary mt-3" id="jumbotron-permalink" href="<?php echo esc_attr( $href ); ?>"><?php echo $label; ?></a>
			<?php endif; ?>

		</div>

	</div>
</section>