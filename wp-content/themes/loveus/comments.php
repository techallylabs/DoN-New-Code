<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package loveus
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
	<?php
		// You can start editing here -- including this comment!
	if ( have_comments() ) :
		$comment_close = '';
		if ( ! comments_open() ) :
			$comment_close = 'comment-close';
			endif;
		?>
			<div id="comments" class="comments-area <?php echo esc_attr( $comment_close ); ?>">
				<div class="group-title">
					<h3>
					<?php
					$loveus_comment_count = get_comments_number();
					if ( '1' === $loveus_comment_count ) {
						printf(
								/* translators: 1: title. */
							esc_html__( 'One Comment', 'loveus' )
						);
					} else {
						printf(// WPCS: XSS OK.
								/* translators: 1: comment count number, 2: title. */
							esc_html( _nx( '%1$s Comment', '%1$s Comments ', $loveus_comment_count, 'comments title', 'loveus' ), 'loveus' ),
							number_format_i18n( $loveus_comment_count )
						);
					}
					?>
					</h3>
				</div>
				<?php
				if ( have_comments() ) :
					the_comments_navigation();
					?>
					<?php
						wp_list_comments(
							array(
								'style'      => 'ol',
								'callback'   => 'loveus_comments',
								'short_ping' => true,
							)
						);
					?>
					<?php
					the_comments_navigation();
					// If comments are closed and there are comments, let's leave a little note, shall we?
					if ( ! comments_open() ) :
						?>
							<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'loveus' ); ?></p>
							<?php
						endif;
					endif;
				?>
			</div>
		<?php
		endif; // Check for have_comments().

	$is_no_post_thumb = '';
	if ( ! have_comments() ) {
		$is_no_post_thumb = 'no-comment';
	}


	if ( comments_open() ) :
		?>

<div class="comment-form-area default-form <?php echo esc_attr( $is_no_post_thumb ); ?>">

		<?php
			$user                 = wp_get_current_user();
			$loveus_user_identity = $user->display_name;
			$req                  = get_option( 'require_name_email' );
			$aria_req             = $req ? " aria-required='true'" : '';
			$formargs             = array(
				'id_submit'            => 'submit',
				'title_reply'          => esc_html__( 'Leave a Reply', 'loveus' ),
				'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'loveus' ),
				'cancel_reply_link'    => esc_html__( 'Cancel Reply', 'loveus' ),
				'label_submit'         => esc_html__( 'Post Comment', 'loveus' ),
				'comment_notes_before' => '<p class="email-not-publish">' .
				esc_html__( 'Your email address will not be published.', 'loveus' ) . ( $req ? '<span class="required">*</span>' : '' ) .
				'</p>',
				'submit_button'        => '<button type="submit" name="%1$s" id="%2$s" class="%3$s theme-btn btn-style-one"><span class="btn-title">%4$s</span></button>',
				'comment_field'        => '<div class="row clearfix"><div class="col-lg-12 col-md-12 col-sm-12 form-group"><textarea id="comment" name="comment" placeholder="' . esc_attr__( 'Your Comments *', 'loveus' ) . '"  >' .
				'</textarea></div></div>',
				'must_log_in'          => '<div>' .
				sprintf(
					wp_kses( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'loveus' ), array( 'a' => array( 'href' => array() ) ) ),
					wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
				) . '</div>',
				'logged_in_as'         => '<div class="logged-in-as">' .
				sprintf(
					wp_kses( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="%4$s">Log out?</a>', 'loveus' ), array( 'a' => array( 'href' => array() ) ) ),
					esc_url( admin_url( 'profile.php' ) ),
					$loveus_user_identity,
					wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ),
					esc_attr__( 'Log out of this account', 'loveus' )
				) . '</div>',

				'comment_notes_after'  => '',
				'fields'               => apply_filters(
					'comment_form_default_fields',
					array(
						'author' =>
						'<div class="row clearfix"><div class="col-lg-6 col-md-6 col-sm-12  form-group">'
						. '<input id="author"  name="author" placeholder="' . esc_attr__( 'Your Name *', 'loveus' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
						'" size="30"' . $aria_req . ' /></div>',
						'email'  =>
						'<div class="col-lg-6 form-group">'
						. '<input id="email" name="email" type="text"  placeholder="' . esc_attr__( 'Your Email *', 'loveus' ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) .
						'" size="30"' . $aria_req . ' /></div></div>',
					)
				),
			);
			?>

		
		<?php
			comment_form( $formargs );
		?>

</div>
<?php endif; ?>
