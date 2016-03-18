jQuery( function( ) {
	var style = jQuery( '#ubuntucommunity-customizer' );

	if( ! style.length ) {
		style = jQuery( 'head' ).append( '<style type="text/css" id="ubuntucommunity-customizer" />' ).find( '#ubuntucommunity-customizer' );
	}

	// Header logo
	wp.customize( 'ubuntucommunity_header_logo', function( value ) {
		value.bind( function( to ) {
			jQuery( '#header #header-logo img' ).attr( 'src', to );
		} );
	} );
	

	// Header BG
	wp.customize( 'ubuntucommunity_header_bg_color', function( value ) {
		value.bind( function( to ) {
			jQuery( '#header' ).css( 'background-color', to );
		} );
	} );

	// Header links
	wp.customize( 'ubuntucommunity_header_link_color', function( value ) {
		value.bind( function( to ) {
			style.append( '#header-menu ul.children li a:hover, #header-menu ul.sub-menu li a:hover { color: ' + to + '; }' );
		} );
	} );

	// Main content area links
	wp.customize( 'ubuntucommunity_link_color', function( value ) {
		value.bind( function( to ) {
			style.append( '#main a, a:link, #main a:active, #main a:hover, #main a:active, #main a:focus { color: ' + to + '; }' );
		} );
	} );

	// Sidebar links
	wp.customize( 'ubuntucommunity_sidebar_link_color', function( value ) {
		value.bind( function( to ) {
			style.append( '#sidebar a, a:link, #sidebar a:active, #sidebar a:hover, #sidebar a:active, #sidebar a:focus { color: ' + to + '; }' );
		} );
	} );

	// Footer links
	wp.customize( 'ubuntucommunity_footer_link_color', function( value ) {
		value.bind( function( to ) {
			style.append( '#footnote a:hover, #footnote a:active, #footnote a:focus, #footer a:hover, #footer a:active, #footer a:focus { color: ' + to + '; }' );
		} );
	} );


} );