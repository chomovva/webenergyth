<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry mb-3 d-flex', get_the_ID() ); ?> >

	<a class="thumbnail mt-1 mr-3" href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail( 'post-thumbnail', [ 'class' => 'wp-post-thumbnail' ] ); ?>
		<?php if ( isset( $count ) ) : ?>
			<div class="counter"><?php echo $count; ?></div>
		<?php endif; ?>
	</a>

	<div class="inner">
		<div>
			<h3 class="mb-0 d-inline-block mr-3"><?php the_title( '', '', true ); ?></h3>
			<time class="small d-inline-block" datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format', 'j F Y' ) ); ?></time>
		</div>
		<?php the_excerpt(); ?>
		<a class="btn btn-sm btn-primary" href="<?php the_permalink(); ?>"><?php _e( 'Подробнее', WEBENERGYTH_TEXTDOMAIN ); ?></a>
	</div>

</article>