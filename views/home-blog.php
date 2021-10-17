<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<section class="section section--blog blog bg-gray" id="blog">
	<div class="container">

		<div id="blog-heading">

			<?php if ( isset( $title ) && ! empty( $title ) ) : ?>
				<h2 class="d-inline-block mr-3 pr-3" id="blog-title">
					<?php echo $title; ?>
				</h2>
			<?php endif; ?>
			
			<?php if ( isset( $tags ) && ! empty( $tags ) ) : ?>
				<div class="d-inline-block" id="blog-tags-wrap">
					<p class="d-inline-block mr-3"><?php // echo get_taxonomy_labels( 'post_tag' )[ 'name' ]; ?>:</p>
					<?php get_template_part( 'parts/tags', null, $tags ); ?>
				</div>
			<?php endif; ?>

		</div>

		 <div id="blog-wrap">
		 	
		 	<?php if ( isset( $content ) && ! empty( $content ) ) : ?>
				<div class="list">
					<?php echo $content; ?>
				</div>
			<?php endif; ?>

			<?php if ( isset( $href ) && is_url( $href ) && isset( $label ) && ! empty( $label ) ) : ?>
				<p class="text-center mt-3" id="blog-more-wrap">
					<a class="btn btn-primary btn-lg" href="<?php echo esc_attr( $href ); ?>" id="blog-more"><?php echo $label; ?></a>
				</p>
			<?php endif; ?>

		 </div>

	</div>
</section>