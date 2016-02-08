jQuery( function( ) {
	jQuery( '#header-logo a' ).click( function( e ) {
		jQuery( '#header' ).toggleClass( 'menu-open' );
		e.preventDefault( );
	} );

	ubuntucommunity_menu_width( );
} );

function ubuntucommunity_menu_width( ) {
	// Create a clone of the menu to figure out the minimum menu widths with different setups
	header_clone = jQuery( '#header' ).clone( );
	header_clone.removeClass( 'src' );
	header_clone.css( 'width', '1500px' );
	header_clone.css( 'height', '0' );
	header_clone.css( 'padding', '0' );
	header_clone.css( 'margin', '0' );
	header_clone.css( 'overflow', 'hidden' );
	header_clone.css( 'visibility', 'hidden' );
	header_clone.find( '#header-menu' ).css( 'padding-left', '0.5em' );
	header_clone.find( '#header-logo' ).css( 'padding-right', '0.5em' );
	header_clone.prependTo( 'body' );

	menu_width = header_clone.find( '#header-menu' ).outerWidth( true );
	logo_width = header_clone.find( '#header-logo' ).outerWidth( true );

	menu_full_min = menu_width + logo_width;

	header_clone.css( 'width', '799px' );
	header_clone.find( '#header-menu a' ).css( 'font-size', '90%' );
	header_clone.find( '#header-menu a' ).css( 'padding', '0.5em' );
	menu_small_width = header_clone.find( '#header-menu' ).outerWidth( true );
	header_clone.remove( );

	menu_small_min = menu_small_width + logo_width;

	jQuery( 'head' ).append( '<link rel="stylesheet" class="menu-js" id="menu-js-small" href="' + ubuntucommunity.theme_url + '/style-resp-menu-small.css" type="text/css" media="only screen and (max-width:' + menu_full_min + 'px)" />' );
	jQuery( 'head' ).append( '<link rel="stylesheet" class="menu-js" id="menu-js-tiny" href="' + ubuntucommunity.theme_url + '/style-resp-menu-tiny.css" type="text/css" media="only screen and (max-width:' + menu_small_min + 'px)" />' );
}