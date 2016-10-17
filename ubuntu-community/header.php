<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" xml:lang="en-US">
<head>
	<title><?php wp_title( '&laquo;', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<meta name="copyright" content="&copy; Pasi Lallinaho and Canonical Ltd." />
	<meta name="description" content="<?php bloginfo( 'name' ); ?><?php if( strlen( get_bloginfo( 'description' ) ) > 0 ) { ?> – <?php bloginfo( 'description' ); } ?>" />
	<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1" />

	<?php wp_head( ); ?>
</head>

<?php
	$classes = array( );

	if( is_active_sidebar( 'widgets_sidebar_right' ) ) {
		$classes[] = 'has-sidebar';
	}
	if( get_theme_mod( 'ubuntucommunity_floatheader' ) == true ) {
		$classes[] = 'float-header';
	}
?>

<body <?php body_class( implode( ' ', $classes ) ); ?>>

	<div id="header" class="outside"><div class="inside">
		<div id="header-logo">
			<a href="<?php echo home_url( '/' ); ?>">
				<?php if( get_theme_mod( 'ubuntucommunity_header_logo' ) ) { ?>
					<img src="<?php echo get_theme_mod( 'ubuntucommunity_header_logo' ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
				<?php } else { ?>
					<img src="<?php echo get_template_directory_uri( ); ?>/images/ubuntu-logo.png" alt="Ubuntu">
				<?php } ?>
			</a>
		</div>
		<div id="header-menu" class="nojs">
			<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
		</div>
	</div></div>