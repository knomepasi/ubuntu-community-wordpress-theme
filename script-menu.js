var menu_full, menu_small;

jQuery( function( ) {
	jQuery( '#header-logo a' ).click( function( e ) {
		jQuery( '#header' ).toggleClass( 'menu-open' );
		e.preventDefault( );
	} );

	ubuntucommunity_menu_width( );
	ubuntucommunity_check_menu( );
	jQuery( window ).resize( ubuntucommunity_check_menu );
} );

function ubuntucommunity_menu_width( ) {
	menu_width = jQuery( '#header-menu' ).outerWidth( true );
	logo_width = jQuery( '#header-logo' ).outerWidth( true );

	menu_full = menu_width + logo_width;

	// Create a clone of the menu to figure out the "small" menu width
	header_clone = jQuery( '#header' ).clone( );
	header_clone.find( '#header-menu a' ).css( 'font-size', '90%' );
	header_clone.find( '#header-menu a' ).css( 'padding', '0.5em' );
	header_clone.css( 'height', '0' );
	header_clone.css( 'padding', '0' );
	header_clone.css( 'margin', '0' );
	header_clone.css( 'overflow', 'hidden' );
	header_clone.css( 'visibility', 'hidden' );
	header_clone.appendTo( 'body' );
	menu_small_width = header_clone.find( '#header-menu' ).outerWidth( true );
	header_clone.remove( );

	menu_small = menu_small_width + logo_width;
}

function ubuntucommunity_check_menu( ) {
	content_width = jQuery( '#header .inside' ).outerWidth( true );

	if( content_width < menu_small ) {
		jQuery( 'head' ).append( '<link rel="stylesheet" class="menu-js" id="menu-js-tiny" href="' + ubuntucommunity.theme_url + '/style-resp-menu-tiny.css" type="text/css" media="all" />' );
	} else if ( content_width < menu_full ) {
		jQuery( 'head' ).append( '<link rel="stylesheet" class="menu-js" id="menu-js-small" href="' + ubuntucommunity.theme_url + '/style-resp-menu-small.css" type="text/css" media="all" />' );
		jQuery( 'head link#menu-js-tiny' ).remove( );
	} else {
		jQuery( 'head link.menu-js' ).remove( );
	}
}
