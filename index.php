<?php get_header( ); ?>

	<?php
		if( function_exists( 'dynamic_sidebar' ) ) { 
			if( is_active_sidebar( 'widgets_notifications' ) ) {
				?><div id="notifications" class="inside"><div class="pad"><?php
				dynamic_sidebar( 'widgets_notifications' );
				?></div></div><?php
			}
		}
	?>
	</div>

	<div id="main" class="inside"><div class="pad">
		<?php get_template_part( 'content', get_post_format() ); ?>
	</div></div></div>

<?php get_footer( ); ?>