<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" xml:lang="en-US">
<head>
	<title><?php wp_title( '&laquo;', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<meta name="copyright" content="&copy; Pasi Lallinaho and Canonical Ltd." />
	<meta name="description" content="<?php bloginfo( 'name' ); ?><?php if( strlen( get_bloginfo( 'description' ) ) > 0 ) { ?> – <?php bloginfo( 'description' ); } ?>" />

<!--	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri( ); ?>/images/favicon.png"> -->
	<?php wp_head( ); ?>
</head>

<body <?php body_class( ); ?>>

	<div id="header">
		<div id="header-wrapper">
			<div id="header-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
			</div>
			<div id="header-logo">
				<a href="//ubuntu.com/">
					<img src="<?php echo get_stylesheet_directory_uri( ); ?>/images/ubuntu-logo.png" alt="Ubuntu">
				</a>
			</div>
		</div>
	</div>