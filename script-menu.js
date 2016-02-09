jQuery( function( ) {
	jQuery( '.nojs' ).removeClass( 'nojs' );

	// TODO: Remove the event when not using the small menu
	jQuery( '#header-logo a' ).click( function( e ) {
		jQuery( '#header' ).toggleClass( 'menu-open' );
		e.preventDefault( );
	} );

	ubuntucommunity_menu_width( );
} );

function ubuntucommunity_menu_width( ) {
	// Remove the responsive CSS for a while to simulate a large screen
	css = jQuery( 'head link[media^="only screen"]' );
	prev = css.first( ).prev( ); 
	css.detach( );

	// Check menu and logo widths
	menu_width = jQuery( '#header-menu' ).outerWidth( true );
	logo_width = jQuery( '#header-logo' ).outerWidth( true );

	// Simulate a medium sized screen
	jQuery( 'head' ).append( '<link rel="stylesheet" id="menu-js" href="' + ubuntucommunity.theme_url + '/style-resp-menu-small.css" type="text/css" media="only screen" />' );
	menu_small_width = jQuery( '#header-menu' ).outerWidth( true );
	jQuery( '#menu-js' ).remove( );

	// Put the CSS files back
	css.insertAfter( prev );

	var padding = determine_em_width( ) * 2;
	var menu_full_min = menu_width + logo_width + padding;
	var menu_small_min = menu_small_width + logo_width + padding;

	jQuery( 'head' ).append( '<link rel="stylesheet" class="menu-js" id="menu-js-small" href="' + ubuntucommunity.theme_url + '/style-resp-menu-small.css" type="text/css" media="only screen and (max-width:' + menu_full_min + 'px)" />' );
	jQuery( 'head' ).append( '<link rel="stylesheet" class="menu-js" id="menu-js-tiny" href="' + ubuntucommunity.theme_url + '/style-resp-menu-tiny.css" type="text/css" media="only screen and (max-width:' + menu_small_min + 'px)" />' );
}

function determine_em_width( ) {
	var div = jQuery( '<div style="width: 1em;"></div>' ).appendTo( 'body' );
	var em = div.width( );
	div.remove( );
	return em;
}