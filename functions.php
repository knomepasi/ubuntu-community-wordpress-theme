<?php

/*
 *  Set the textdomain for translations
 *
 */

add_action( 'after_setup_theme', 'ubuntucommunity_textdomain' );

function ubuntucommunity_textdomain( ) {
	load_theme_textdomain( 'ubuntu-community', get_template_directory( ) . '/languages' );
}

/*
 *  Register widget areas
 *
 */

if( function_exists( 'register_sidebar' ) ) {
	register_sidebar( array(
		'name' => __( 'Footnote widgets', 'ubuntu-community' ),
		'id' => 'widgets_footnote',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
	) );
	register_sidebar( array(
		'name' => __( 'Notifications', 'ubuntu-community' ),
		'id' => 'widgets_notifications',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
	) );
	register_sidebar( array(
		'name' => __( 'Footer widgets', 'ubuntu-community' ),
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
		'header-menu' => __( 'Header Menu', 'ubuntu-community' )
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
	wp_enqueue_style( 'ubuntucommunity-style-common', get_stylesheet_directory_uri( ) . '/style-common.css', array( 'css-reset' ) );
	wp_enqueue_style( 'ubuntucommunity-style', get_stylesheet_directory_uri( ) . '/style.css', array( 'css-reset' ) );

	// Font stylesheets
	wp_enqueue_style( 'font-ubuntu', get_stylesheet_directory_uri( ) . '/style-font-ubuntu.css' );

	// Responsive design
	wp_enqueue_style( 'ubuntucommunity-style-resp-1000', get_stylesheet_directory_uri( ) . '/style-resp-1000.css', array( 'ubuntucommunity-style' ), null, 'only screen and (max-width:1000px)' );
	wp_enqueue_style( 'ubuntucommunity-style-resp-800', get_stylesheet_directory_uri( ) . '/style-resp-800.css', array( 'ubuntucommunity-style', 'ubuntucommunity-style-resp-1000' ), null, 'only screen and (max-width:800px)' );
}

/*
 *  Register editor stylesheets
 *
 */

add_editor_style( 'reset.css' );
add_editor_style( 'style-common.css' );
add_editor_style( 'style-editor.css' );
add_editor_style( 'style-font-ubuntu.css' );

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

/*
 *  Add some customization options for the theme
 *  - Header background color
 *  - Header navigation link color
 *  - Main content area link color
 *  - Footer link color
 *  - Show/hide authors for posts
 *
 */

add_action( 'customize_register', 'ubuntucommunity_customize_register' );

function ubuntucommunity_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'ubuntucommunity', array(
		'title' => 'Ubuntu Community Theme',
		'priority' => 20,
	) );

	$wp_customize->add_setting( 'ubuntucommunity_header_bg_color', array(
		'default'           => '#dd4814',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ubuntucommunity_header_bg_color', array(
		'label'       => __( 'Header Background Color', 'ubuntu-community' ),
		'section'     => 'ubuntucommunity',
	) ) );

	$wp_customize->add_setting( 'ubuntucommunity_header_link_color', array(
		'default'           => '#dd4814',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ubuntucommunity_header_link_color', array(
		'label'       => __( 'Navigation Link Color', 'ubuntu-community' ),
		'description' => __( 'The color for hovered menu items in the header dropdown menu.', 'ubuntu-community' ),
		'section'     => 'ubuntucommunity',
	) ) );

	$wp_customize->add_setting( 'ubuntucommunity_link_color', array(
		'default'           => '#dd4814',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ubuntucommunity_link_color', array(
		'label'       => __( 'Link Color', 'ubuntu-community' ),
		'description' => __( 'The color for links in the main content area.', 'ubuntu-community' ),
		'section'     => 'ubuntucommunity',
	) ) );

	$wp_customize->add_setting( 'ubuntucommunity_footer_link_color', array(
		'default'           => '#dd4814',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ubuntucommunity_footer_link_color', array(
		'label'       => __( 'Footer Link Color', 'ubuntu-community' ),
		'description' => __( 'The color for links in the footer.', 'ubuntu-community' ),
		'section'     => 'ubuntucommunity',
	) ) );

	$wp_customize->add_setting( 'ubuntucommunity_header_logo', array(
		'default'           => null,
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ubuntucommunity_header_logo', array(
		'label'       => __( 'Header logo', 'ubuntu-community' ),
		'description' => __( 'The logo to show in the right side of the header. If an image is not set, a Ubuntu logo is used.', 'ubuntu-community' ),
		'section'     => 'ubuntucommunity',
		'height'      => '25'
	) ) );

	$wp_customize->add_setting( 'ubuntucommunity_showauthor', array(
		'default'           => false,
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ubuntucommunity_showauthor', array(
		'type'        => 'checkbox',
		'label'       => __( 'Show authors for posts?', 'ubuntu-community' ),
		'section'     => 'ubuntucommunity',
	) ) );
}

add_action( 'customize_preview_init', 'ubuntucommunity_customize_preview_js' );

function ubuntucommunity_customize_preview_js( ) {
	wp_enqueue_script( 'ubuntucommunity-customize-preview', get_template_directory_uri( ) . '/js/customizer.js', array( 'jquery', 'customize-preview' ), '1', true );
}

add_action( 'wp_head', 'ubuntucommunity_customizer_css' );

function ubuntucommunity_customizer_css( ) {
	$mods = array(
		'ubuntucommunity_header_bg_color' => '#header { background-color: %s; }',
		'ubuntucommunity_header_link_color' => '#header-menu ul.children li a:hover, #header-menu ul.sub-menu li a:hover { color: %s; }',
		'ubuntucommunity_link_color' => '#main a, a:link, #main a:active, #main a:hover, #main a:active, #main a:focus { color: %s; }',
		'ubuntucommunity_footer_link_color' => '#footnote a:hover, #footnote a:active, #footnote a:focus, #footer a:hover, #footer a:active, #footer a:focus { color: %s; }'
	);

	foreach( $mods as $mod => $css_template ) {
		if( get_theme_mod( $mod ) ) {
			$css[] = sprintf( $css_template, get_theme_mod( $mod ) );
		}
	}

	if( is_array( $css ) ) {
		echo '<style type="text/css">' . "\n";
		echo '/* custom colors from customizer */';
		foreach( $css as $line ) {
			echo $line . "\n";
		}
		echo '</style>' . "\n";
	}
}

add_action( 'admin_enqueue_scripts', 'ubuntucommunity_admin_scripts' );

function ubuntucommunity_admin_scripts( ) {
	wp_enqueue_style( 'ubuntucommunity-style-admin', get_stylesheet_directory_uri( ) . '/style-admin.css' );
}

/*
 *  Add functions to show all categories and tags sorted alphabetically
 *
 */

function ubuntucommunity_alphabetical_terms( ) {
	$tags = get_the_tags( );
	$cats = get_the_category( );

	if( is_array( $tags ) && is_array( $cats ) ) {
		$terms = array_merge( $tags, $cats );
		usort( $terms, 'ubuntucommunity_sort_terms' );
	} elseif( is_array( $tags ) ) {
		$terms = $tags;
	} elseif( is_array( $cats ) ) {
		$terms = $cats;
	}

	if( is_array( $terms ) && count( $terms ) > 0 ) {
		foreach( $terms as $term ) {
			$out[] = '<a href="' . get_term_link( $term ) . '">' . $term->name . '</a>';
		}

		print implode( ', ', $out );
	}
}

function ubuntucommunity_sort_terms( $a, $b ) {
	return strcasecmp( $a->name, $b->name );
}

/*
 *  Small changes to the comment form output format
 *
 */

add_action( 'comment_form_before_fields', 'ubuntucommunity_comment_form_before_fields' );

function ubuntucommunity_comment_form_before_fields( ) {
	echo '<div class="comment-meta">';
}

add_action( 'comment_form_after_fields', 'ubuntucommunity_comment_form_after_fields' );

function ubuntucommunity_comment_form_after_fields( ) {
	echo '</div>';
}

add_filter( 'comment_form_logged_in', 'ubuntucommunity_comment_form_logged_in' );

function ubuntucommunity_comment_form_logged_in( $logged_in_text ) {
	return '<div class="comment-meta">' . $logged_in_text . '</div>';
}

/*
 *  Always show all posts on archive pages
 *
 */

add_action( 'pre_get_posts', 'ubuntucommunity_articles_filters' );

function ubuntucommunity_articles_filters( $query ) {
	if( is_archive( ) && $query->is_main_query( ) ) {
		$query->set( 'posts_per_page', -1 );
		return;
	}
}

?>