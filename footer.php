	<?php
		if( function_exists( 'dynamic_sidebar' ) ) {
			if( is_active_sidebar( 'widgets_footnote' ) ) {
				?><div id="footnote"><div id="footnote-wrapper"><?php
				dynamic_sidebar( 'widgets_footnote' );
				?></div></div><?php
			}
		}
	?>

	<?php
		if( function_exists( 'dynamic_sidebar' ) ) {
			if( is_active_sidebar( 'widgets_footer' ) ) {
				?><div id="footer"><div id="footer-wrapper"><?php
				dynamic_sidebar( 'widgets_footer' );
				?></div></div><?php
			}
		}
	?>
	<?php wp_footer( ); ?>

</body>
</html>