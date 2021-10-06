<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<form class="searchform form" role="search" method="get" action="<?php echo home_url( '/' ); ?>"> 
	<input class="form-control" type="text" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php esc_attr_e( 'Поиск по сайту', WEBENERGYTH_TEXTDOMAIN ); ?>">
	<button class="searchsubmit" type="submit"><span class="sr-only"><?php esc_html_e( 'Найти', WEBENERGYTH_TEXTDOMAIN ); ?></span></button>
</form>