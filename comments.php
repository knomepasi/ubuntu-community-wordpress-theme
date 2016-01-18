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

	<div id="reply" class="comment group">
		<?php
			comment_form( array(
				'comment_field' => '<textarea id="comment" name="comment" cols="45" rows="5" aria-required="true" placeholder="' . _x( 'Comment', 'noun' ) . '"></textarea>',
				'comment_notes_before' => null,
				'comment_notes_after' => '<div style="clear: both;"></div>',
				'fields' => array(
					'author' => '<span class="comment-author"><input id="author" name="author" type="text" size="30" aria-required="true" required="required" placeholder="' . __( 'Name', 'domainreference' ) . '" /></span><br />',
					'email' => '<span class="comment-email"><input id="email" name="email" type="text" value="" size="30" aria-describedby="email-notes" aria-required="true" required="required" placeholder="' . __( 'Email', 'domainreference' ) . '" /></span><br />',
					'noform-description' => '<span class="comment-description">' . __( 'All fields are required. Your email address will not be published.', 'ubuntu-community' ) . '</span>',
				),
			) );
		?>
	</div>
</div>
