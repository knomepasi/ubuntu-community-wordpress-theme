<?php if( post_password_required( ) ) { return; } ?>

<div id="comments">
	<?php if( have_comments( ) ) { ?>
		<h2><?php _e( 'Discussion', 'ubuntu-community' ); ?></h2>

		<div class="comment-list">
			<?php $comments = get_comments( array( 'post_id' => $post->ID, 'order' => 'ASC' ) ); ?>
			<?php foreach( $comments as $comment ) { ?>
				<?php if( $comment->user_id > 0 ) { $class = "comment-author-logged"; } else { $class = ""; } ?>
				<div class="comment group <?php echo $class; ?>">
					<div class="comment-meta">
						<span class="comment-author"><?php echo $comment->comment_author; ?></span><br />
						<span class="comment-date"><?php echo date_i18n( get_option( 'date_format' ), strtotime( $comment->comment_date_gmt ) ); ?></span>
					</div>
					<div class="comment-comment">
						<?php echo $comment->comment_content; ?>
					</div>
				</div>
			<?php } ?>
		</div>
	<?php } ?>

	<?php comment_form( ); ?>
</div>
