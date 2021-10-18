<?php


get_header( '404' );


$title = trim( get_theme_mod( 'error404title' ) );
$description = trim( get_theme_mod( 'error404description' ) );


?>


<div class="container text-center pt-3 pb-3">

	<img class="logo lazy center-block" src="<?php echo esc_attr( get_theme_file_uri( 'images/error404.png' ) ); ?>" alt="<?php echo esc_attr( $title ); ?>">
	
	<?php if ( ! empty( $title ) ) : ?>
		<h1 id="error404-title" class="title">
			<?php echo $title; ?>
		</h1>
	<?php endif; ?>
	
	<?php if ( ! empty( $description ) ) : ?>
		<div id="error404-description">
			<?php echo $description; ?>
		</div>
	<?php endif; ?>

</div>


<?php

get_footer( '404' );