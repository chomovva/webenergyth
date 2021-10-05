<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry', get_the_ID() ); ?> >
	<div class="inner">
		<a class="thumbnail" href="<?php the_permalink(); ?>" >
			<?php the_post_thumbnail( 'medium', [ 'class' => 'wp-post-thumbnail' ] ); ?>
			<time class="small" datetime="2001-05-15 19:00">15 мая 2021</time>
		</a>
		<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title( '', '', true ); ?></a></h3>
		<?php if ( $tags = wp_get_object_terms( get_the_ID(), 'post_tag', [] ) && is_array( $tags ) && ! empty( $tags ) ) : ?>
			<ul class="tags d-inline-block pl-0 small mt-0 mb-0">
				<?php foreach ( $tags as $tag ) : ?>
					<li>
						<a href="<?php echo get_term_link( $tag, 'post_tag' ); ?>">
							<span class="label"><?php echo esc_html( $tag->name ); ?></span>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
		<?php the_excerpt(); ?>
		<a class="btn btn-primary" href="<?php the_permalink(); ?>"><?php _e( 'Подробнее', WEBENERGYTH_TEXTDOMAIN ); ?></a>
	</div>
</article>