<?php

/*
 *  Register widget areas
 *
 */

if( function_exists( 'register_sidebar' ) ) {
	register_sidebar( array(
		'name' => __( 'Footnote widgets', 'ubuntu-teams' ),
		'id' => 'widgets_footnote',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
	) );
	register_sidebar( array(
		'name' => __( 'Notifications', 'ubuntu-teams' ),
		'id' => 'widgets_notifications',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
	) );
	register_sidebar( array(
		'name' => __( 'Footer widgets', 'ubuntu-teams' ),
		'id' => 'widgets_footer',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
	) );
}

/*
 *  Register menus
 *
 */

if( function_exists( 'register_nav_menu' ) ) {
	register_nav_menus( array(
		'header-menu' => __( 'Header Menu', 'ubuntu-teams' )
		/* Add more menus here if needed */
	) );
}

/*
 *  Shortcodes for simple columns
 *
 */

add_option( 'ubuntucommunity_columns_separator', '///' );
add_shortcode( 'cols', 'ubuntucommunity_columns' );

function ubuntucommunity_columns( $atts, $content, $code ) {
	$separator = get_option( 'ubuntucommunity_columns_separator' );
	$separator_p = '<p>' . $separator . '</p>';
	$columns = substr_count( $content, $separator ) + 1;

	/* This reverts the failing auto-paragraphing for shortcodes */
	if( substr( $content, 0, 4 ) == '</p>' ) {
		$content = substr( $content, 4 );
	}
	if( substr( $content, strlen( $content ) - 3 ) == '<p>' ) {
		$content = substr( $content, 0, strlen( $content ) - 3 );
	}

	$out = '<div class="sc_columns flex cols-' . $columns . '">';
	$out .= '<div class="item">';
	$out .= str_replace( $separator_p, '</div><div class="item">', $content );
	$out .= '</div>';
	$out .= '</div>';

	return $out;
}

function ubuntucommunity_pages( ) {

}

?>