<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" xml:lang="en-US">
<head>
	<title><?php wp_title( '&laquo;', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<meta name="copyright" content="&copy; Pasi Lallinaho and Canonical Ltd." />
	<meta name="description" content="<?php bloginfo( 'name' ); ?><?php if( strlen( get_bloginfo( 'description' ) ) > 0 ) { ?> – <?php bloginfo( 'description' ); } ?>" />

	<?php wp_head( ); ?>
</head>

<body <?php body_class( ); ?>>

	<div id="header" class="outside"><div class="inside">
		<div id="header-menu">
			<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
		</div>
		<div id="header-logo">
			<?php if( get_theme_mod( 'ubuntucommunity_header_logo' ) ) { ?>
				<img src="<?php echo get_theme_mod( 'ubuntucommunity_header_logo' ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
			<?php } else { ?>
				<a href="//ubuntu.com/">
					<img src="<?php echo get_stylesheet_directory_uri( ); ?>/images/ubuntu-logo.png" alt="Ubuntu">
				</a>
			<?php } ?>
		</div>
	</div></div>