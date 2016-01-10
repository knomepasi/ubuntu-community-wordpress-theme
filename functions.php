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
 *  Register stylesheets
 *
 */

add_action( 'wp_enqueue_scripts', 'ubuntucommunity_scripts' );

function ubuntucommunity_scripts( ) {
	// Eric Meyer: CSS reset | http://meyerweb.com/eric/thoughts/2007/05/01/reset-reloaded/
	wp_enqueue_style( 'css-reset', get_stylesheet_directory_uri( ) . '/reset.css' );

	// Main style sheets
	wp_enqueue_style( 'ubuntucommunity-style-common', get_stylesheet_directory_uri( ) . '/style-common.css' );
	wp_enqueue_style( 'ubuntucommunity-style', get_stylesheet_directory_uri( ) . '/style.css' );

	// Font stylesheet
	// "Ubuntu" from Google
	wp_enqueue_style( 'font-google-ubuntu', '//fonts.googleapis.com/css?family=Ubuntu%3A300%2C400%2C500&#038;ver=1' );
}

/*
 *  Register editor stylesheets
 *
 */

add_editor_style( 'reset.css' );
add_editor_style( 'style-common.css' );
add_editor_style( 'style-editor.css' );
add_editor_style( '//fonts.googleapis.com/css?family=Ubuntu%3A300%2C400%2C500&#038;ver=1' );

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

?>