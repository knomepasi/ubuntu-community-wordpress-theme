<div class="group uc-content-block">
	<?php
		if( is_archive( ) ) {
			$target = '';
			if( is_author( ) ) { $target = get_the_author( ); }
			if( is_date( ) ) { $target = single_month_title( ' ', false ); }
			if( is_category( ) ) { $target = single_cat_title( null, false ); }
			if( is_tag( ) ) { $target = single_tag_title( null, false ); }
	
			if( strlen( $target ) > 0 ) {
				?><h1 class="post-title"><?php printf( __( 'All articles for %s', 'ubuntu-community' ), $target ); ?></h1><?php
			} else {
				?><h1 class="post-title"><?php _e( 'Archive', 'ubuntu-community' ); ?></h1><?php
			}
		}
		if( is_search( ) ) {
			?><h1 class="post-title"><?php printf( __( 'Search results for "%s"', 'ubuntu-community' ), $_GET['s'] ); ?></h1><?php
		}
	?>
	<ul class="uc-archive-list">
		<?php while( have_posts( ) ) { ?>
			<?php the_post( ); ?>
			<li>
				<span class="post-title"><a href="<?php the_permalink( ); ?>"><?php the_title( ); ?></a></span><br />
				<span class="post-date"><?php echo date_i18n( get_option( 'date_format' ), get_the_time( 'U' ) ); ?></span>
			</li>
		<?php } ?>
	</ul>
</div>
