<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cali
 */

/*
 
 */
if ( post_password_required() ) {
	return;
}
?>
<div class='post comments-section'>
	<?php 
		if( have_comments() ):
			// We have Comments
	?>
	<h6 class="section-title"><?php echo get_comments_number()?> comments</h6>
	<div class="group">
		
		<?php 
			$arg = array(	
				'style'      => 'div',
				'short_ping' => true,
				'callback'	 => 'ritsu_comment_template',
				'type'=> 'all',
				'reverse_top_level' => '',
				
				
			);
			wp_list_comments($arg); 
		
		?>	
	<!-- </div> -->
		<?php 
			if(!comments_open() && get_comments_number()):
		?>
		<p><?php esc_html_e('Comments are Closed', 'ritsu') ?></p>

		<?php endif; ?>	
	<?php endif; ?>
				
	<?php 
	
	$comment_args = array( 
		'title_reply'			=> 'Leave Us comment',
		'fields' 				=> apply_filters( 'comment_form_default_fields', array(
		'author' 				=> '<p class="comment-form-author">' .
									'<input id="author" class="input" name="author" type="text" placeholder="' . esc_attr__( 'Name', 'cali' ) . ( $req ? ' *' : '' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245"' . $aria_req . $html_req . ' /></p>',
		'email'  				=> '<p class="comment-form-email">' .
		            				'<input id="email" class="input" name="email" type="email" placeholder="' . esc_attr__( 'Email', 'cali' ) . ( $req ? ' *' : '' ) . '" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" maxlength="100" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></p>',
		)),
		'comment_field' 		=> '<p class="comment-form-comment"><textarea id="comment" name="comment" placeholder="' . _x( 'Message', 'noun', 'cali' ) . ' *' . '" cols="45" rows="3" maxlength="65525" aria-required="true" required="required"></textarea></p>',
		'comment_notes_after' 	=> '',
		'label_submit'         	=> esc_attr__( 'Send Message', 'Ritsu' ),
	);

	comment_form($comment_args);
	
	?>
<?php if(get_comments_number()){
	echo '</div>';
} ?>
</div>
<?php ?>