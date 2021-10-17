<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry', get_the_ID() ); ?> >
	<div class="inner">

		<a class="thumbnail" href="<?php the_permalink(); ?>" >
			<?php the_post_thumbnail( 'medium', [ 'class' => 'wp-post-thumbnail' ] ); ?>
			<time class="small" datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format', 'j F Y' ) ); ?></time>
		</a>

		<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title( '', '', true ); ?></a></h3>
		
		<?php the_tags( '<ul class="tags d-inline-block pl-0 small mt-0 mb-0"><li>', '</li><li>', '</li></ul>' ); ?>
		
		<?php the_excerpt(); ?>
		
		<a class="btn btn-primary" href="<?php the_permalink(); ?>"><?php _e( 'Подробнее', WEBENERGYTH_TEXTDOMAIN ); ?></a>

	</div>
</article>