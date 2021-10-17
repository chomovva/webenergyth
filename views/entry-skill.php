<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<?php if ( isset( $entry ) && is_entry_usedby( $entry ) && array_key_exists( 'value', $entry ) ) : $entry[ 'value' ] = absint( $entry[ 'value' ] ); ?>
	<div class="entry">

		<?php if ( ! empty( trim( $entry[ 'title' ] ) ) ) : ?>
			<strong class="title"><?php echo $entry[ 'title' ] ?></strong>
		<?php endif; ?>
		
		<?php if ( $entry[ 'value' ] <= 100 ) : ?>
			<div class="progress">
				<div class="progress-bar" role="progressbar" style="width: <?php echo esc_attr( $entry[ 'value' ] ); ?>%" aria-valuenow="<?php echo esc_attr( $entry[ 'value' ] ); ?>%" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
		<?php endif; ?>

	</div>
<?php endif; ?>