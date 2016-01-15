<?php while( have_posts( ) ) { ?>
	<?php the_post( ); ?>

	<div <?php post_class( 'group uc-article' ) ?>>
		<?php if( !is_front_page( ) ) { ?>
			<?php if( is_singular( ) ) { ?>
				<h1 class="post-title"><?php the_title( ); ?></h1>
			<?php } else { ?>
				<h1 class="post-title non-single"><a href="<?php the_permalink( ); ?>"><?php the_title( ); ?></a></h1>
			<?php } ?>
		<?php } ?>

		<?php if( !is_page( ) ) { ?>
			<div class="post-meta">
				<?php $post_date_format = date_i18n( get_option( 'date_format' ), get_the_time( 'U' ) );?>
				<?php if( get_theme_mod( 'ubuntucommunity_showauthor' ) == true ) { ?>
					<span class="post-author-date"><?php printf( _x( 'By %s on %s', 'post meta: author, formatted date', 'ubuntu-community' ), get_the_author_posts_link( ), $post_date_format ); ?></span>
				<?php } else { ?>
					<span class="post-date"><?php echo $post_date_format; ?></span>
				<?php } ?>
			</div>
		<?php } ?>

		<div class="post-post">
			<div class="post-entry entry"><?php the_content( __( 'Read the rest of this article', 'ubuntu-community' ) ); ?></div>
		</div>

		<?php if( !is_page( ) ) { ?>
			<div class="post-meta">
				<span class="post-terms"><?php ubuntucommunity_alphabetical_terms( ); ?></span>
				<?php if( !is_single( ) ) { ?>
					<br /><span class="comments">
						<?php comments_popup_link( __( 'No comments', 'ubuntu-community' ), __( '1 comment', 'ubuntu-community' ), sprintf( __( '%1$s comments', 'ubuntu-community' ), "%" ) ); ?>
					</span>
				<?php } ?>
			</div>
		<?php } ?>
	</div>

	<?php if( !is_page( ) ) { ?>
		<?php comments_template( ); ?>
	<?php } ?>
<?php } ?>
