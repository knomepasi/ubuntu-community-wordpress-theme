<?php get_header( ); ?>

	<?php
		if( function_exists( 'dynamic_sidebar' ) ) { 
			if( is_active_sidebar( 'widgets_notifications' ) ) {
				?><div id="notifications"><?php
				dynamic_sidebar( 'widgets_notifications' );
				?></div><?php
			}
		}
	?>
	</div>

	<div id="main">
		<?php get_template_part( 'content', get_post_format() ); ?>
	</div>

<?php get_footer( ); ?>