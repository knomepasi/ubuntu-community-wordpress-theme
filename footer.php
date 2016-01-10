	<?php
		if( function_exists( 'dynamic_sidebar' ) ) {
			if( is_active_sidebar( 'widgets_footnote' ) ) {
				?><div id="footnote" class="outside"><div class="inside"><?php
				dynamic_sidebar( 'widgets_footnote' );
				?></div></div><?php
			}
		}
	?>

	<?php
		if( function_exists( 'dynamic_sidebar' ) ) {
			if( is_active_sidebar( 'widgets_footer' ) ) {
				?><div id="footer" class="outside"><div class="inside"><?php
				dynamic_sidebar( 'widgets_footer' );
				?></div></div><?php
			}
		}
	?>
	<?php wp_footer( ); ?>

</body>
</html>