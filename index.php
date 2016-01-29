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

	<div id="main" class="inside"><div class="pad">
		<?php
			if( have_posts( ) ) {
				if( is_archive( ) ) {
					get_template_part( 'content', 'archive' );
				} else {
					get_template_part( 'content' );
				}
			} else {
				?><div class="notfound">
					<h3><?php _e( 'Page not found.', 'ubuntu-community' ); ?></h3>
					<p><?php _e( 'The page you were looking for was not found.', 'ubuntu-community' ); ?></p>
				</div><?php
			}
		?>
	</div></div>

<?php get_footer( ); ?>