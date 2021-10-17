<?php


namespace webenergyth;


use WP_Term;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<?php if ( isset( $args ) && ! empty( wp_parse_id_list( $args ) ) ) : ?>
	<ul class="tags d-inline-block pl-0 small">
		<?php foreach ( $args as $term_id ) : $tag = get_term( $term_id, 'post_tag', OBJECT, 'raw' ); ?>
			<?php if ( $tag instanceof WP_Term ) : ?>
				<li class="d-inline-block mr-3">
					<a href="<?php echo get_term_link( $tag, 'post_tag' ); ?>"><?php echo $tag->name; ?></a>
				</li>
			<?php endif; ?>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>