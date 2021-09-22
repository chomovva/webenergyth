( function () {

	var $mobilenav = jQuery( '#mobilenav' );
	var $body = jQuery( 'body' );
	var $wrapper = jQuery( '#wrapper' );

	function Toggle() {
		if ( $mobilenav.hasClass( 'active' ) ) {
			$body.css( 'overflow', 'auto' );
			$mobilenav.removeClass( 'active' );
		} else {
			$body.css( 'overflow', 'hidden' );
			$mobilenav.addClass( 'active' );
		}
	}

	$wrapper.on( 'click', '[data-mobilenav=toggle]', Toggle );

} )();