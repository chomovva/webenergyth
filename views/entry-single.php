<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


include get_theme_file_path( 'views/entry-singular.php' );

?>

<p class="text-right">
	<time class="small" datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format', 'j F Y' ) ); ?></time>
</p>

<?php

if ( is_single() ) : get_template_part( 'parts/pager' ); endif;

comments_template();