<?php while( have_posts( ) ) { ?>
	<?php the_post( ); ?>

	<div <?php post_class( 'group' ) ?>>
		<?php if( !is_front_page( ) ) { ?>
			<h1 class="post-title"><?php the_title(); ?></h1>
		<?php } ?>

		<?php /* post itself */ ?>
		<div class="post-post">
			<div class="post-entry entry"><?php the_content( __( 'Read the rest of this article', 'ubuntu-community' ) ); ?></div>
		</div>

		<?php /* post meta data */ ?>
		<?php if( !is_page( ) ) { ?>
			<div class="post-meta">
				<span class="post-date">
					<?php echo date_i18n( get_option( 'date_format' ), get_the_time( 'U' ) ); ?>
				</span>
				<?php if( !is_single() && !is_page() ) { ?>
					<span class="comments">
						&mdash; <?php comments_popup_link( __( 'No comments', 'ubuntu-community' ), __( '1 comment', 'ubuntu-community' ), sprintf( __( '%1$s comments', 'ubuntu-community' ), "%" ) ); ?>
					</span>
				<?php } ?>
				<br />
				<span class="post-cat"><?php the_category( ', ' ); ?></span>
				<?php the_tags( '&mdash; <span class="post-tags">', ', ', '</span>' ); ?>
			</div>
		<?php } ?>
	</div>

	<?php if( !is_page( ) ) { ?>
		<?php comments_template( ); ?>
	<?php } ?>
<?php } ?>
