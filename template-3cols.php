<?php 
/*
 *  Template name: Three columns
 *
 *  Usage:
 *    Attach this template for a page that has three (or more) <div>'s
 *    directly under #main. They will be arranged into three columns.
 *
 */
?>

<?php get_header( ); ?>

	<div id="notifications">
		<?php if( function_exists( 'dynamic_sidebar' ) ) {
			dynamic_sidebar( 'widgets_notifications' );
		} ?>
	</div>

	<div id="main" class="three-columns">
		<?php get_template_part( 'content', get_post_format() ); ?>
	</div>

<?php get_footer( ); ?>