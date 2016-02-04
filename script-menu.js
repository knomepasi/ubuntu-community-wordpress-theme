jQuery( function( ) {
	jQuery( '#header-logo a' ).click( function( e ) {
		jQuery( '#header' ).toggleClass( 'menu-open' );
		e.preventDefault( );
	} );
} );