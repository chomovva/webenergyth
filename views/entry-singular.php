<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<h1><?php the_title( '', '', true ); ?></h1>

<?php get_template_part( 'parts/breadcrumbs' ); ?>

<div class="content">
	<?php the_content( null, false ); ?>
</div>

<?php

get_template_part( 'parts/pager' );

comments_template();