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

	<div id="main" class="inside group"><div class="pad">
		<div id="content">
			<?php
				if( have_posts( ) ) {
					if( is_archive( ) || is_search( ) || ( isset( $_GET['s'] ) && strlen( $_GET['s'] ) > 0 ) ) {
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
		</div>
		<?php if( function_exists( 'dynamic_sidebar' ) && is_active_sidebar( 'widgets_sidebar_right' ) ) { ?>
			<div id="sidebar">
				<?php dynamic_sidebar( 'widgets_sidebar_right' ); ?>
			</div>
		<?php } ?>
	</div></div>

<?php get_footer( ); ?>