
<?php
function ritsu_comment_template($comment, $args, $depth) {

	?>

	<div class="post-comment-group" id="comment-<?php comment_ID(); ?> <?php comment_class( $comment->has_children ? 'parent' : '' ); ?>">
						
		<div class='border-bottom'>
			<figure class="comment-avatar">
				<?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
			</figure>
			<div class="post-comment-text">
				<p class="person-name"><?php printf( get_comment_author() ) ; ?></p>
				<p class="post-date"><?php printf(get_comment_time('M j , Y') );?></p>
				<div class="body-text-comment">
					<?php comment_text(); ?>
				</div>
				<?php
					comment_reply_link( array_merge( $args, array(
					'add_below' => 'div-comment',
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
					'before'    => '<span class="reply-text">',
					'after'     => '</span>'
					) ) );
				?>
								
			</div>
		</div>

	<?php
}