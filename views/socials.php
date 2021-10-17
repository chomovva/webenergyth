<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<?php if ( isset( $socials ) && is_array( $socials ) && ! empty( $socials ) ) : ?>
	<div class="socials">

		<?php if ( isset( $title ) && ! empty( $title ) ) : ?>
			<p id="socials-title" class="sr-only text-center"><?php echo $title; ?></p>
		<?php endif; ?>
		
		<ul>
			<?php foreach ( $socials as $item ) : ?>
				<?php if ( is_array( $item ) && array_key_exists( 'key', $item ) && array_key_exists( 'url', $item ) && is_url( $item[ 'url' ] ) && array_key_exists( 'label', $item ) ) : ?>
					<li>
						<a class="<?php echo esc_attr( $item[ 'key' ] ); ?>" href="<?php echo esc_attr( $item[ 'url' ] ); ?>">
							<span class="sr-only"><?php echo esc_html( $item[ 'label' ] ); ?></span>
						</a>
					</li>
				<?php endif; ?>
			<?php endforeach; ?>
		</ul>

	</div>
<?php endif; ?>