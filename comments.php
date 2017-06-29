<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @since 1.0.0
 * @package Sleekr_Lite
 */
?>
		
<div id="comments">
	<?php /*
	       * If the current post is protected by a password and
	       * the visitor has not yet entered the password,
	       * return early without loading the comments.
	       */
	if ( post_password_required() ) : ?>
	    <hr>
		<p class="nopassword"><?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'sleekr-lite' ); ?></p>
		</div><!-- #comments -->
		<?php return;
	endif; ?>
	
	<?php if ( have_comments() ) : ?>
	    <hr>
		<!-- Comments Title -->
		<h4 id="comments-title">
			<?php
				if( get_comments_number() == 1 ){
					echo get_comments_number() .' '. esc_html__('Comment','sleekr-lite');
				} else {
					echo get_comments_number() .' '. esc_html__('Comments','sleekr-lite');
				}
			?>
		</h4>
		<!-- Call to a Custom Comment Display Function -->
		<div class="comment-list">
			<?php wp_list_comments(array(
					'avatar_size' => 64,
					'style'       => 'div',
					'short_ping'  => true,
					'callback'    => 'sleekr_comments',
					'reply_text'  => esc_html__( 'Reply', 'sleekr-lite' ),
				)); ?>
		</div>
		<!-- Comment Pagination -->
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav" class="pager">
			<li class="previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'sleekr-lite' ) ); ?></li>
			<li class="next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'sleekr-lite' ) ); ?></li>
		</nav>
		<?php endif; ?>
	<!-- Closed comments -->
	<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
	    <hr>
		<p class="nocomments"><?php esc_html_e( 'Comments are closed.', 'sleekr-lite' ); ?></p>
	<?php endif; ?>
	<!-- Comment Form -->
	<?php if ( comments_open() ) : ?>
	<hr>
	<!-- Comment Form Custom Code -->
	    <?php
	    //Text for required fields 
	    $required_text = sprintf( ' ' . esc_html__('Required fields are marked with %s','sleekr-lite'), '<span class="required">*</span>' );
	    //Allowed HTML for escaping
	    $allowed_html = array(
		'a' => array(
			'href' => array(),
			'title' => array()
		),
		'abbr' => array(
			'title' => array()
		)
	    );
	    //Styling for Author/Email/Name fields
	    $fields =  array(

		  'author' =>
		    '<p class="comment-form-author">' . esc_html__( 'Name ', 'sleekr-lite' ) .
		    ( $req ? '<span class="required">*</span>' : '' ) .
		    '<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
		    '" size="30" /></p>',

		  'email' =>
		    '<p class="comment-form-email">' . esc_html__( 'Email ', 'sleekr-lite' ) .
		    ( $req ? '<span class="required">*</span>' : '' ) .
		    '<input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
		    '" size="30" /></p>',

		  'url' =>
		    '<p class="comment-form-url">' . esc_html__( 'Website ', 'sleekr-lite' )  .
		    '<input id="url" class="form-control" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
		    '" size="30" /></p>',
		);
		//Comment Form for real now
		comment_form( array(
		'fields'            => $fields,
		'class_form'        => 'form-group well',
		'class_submit'      => 'btn btn-primary',
		'title_reply'       => esc_html__( 'Leave a Comment:','sleekr-lite' ),
		'title_reply_to'    => esc_html__( 'Leave a Reply to %s','sleekr-lite' ),
		'cancel_reply_link' => esc_html__( 'Cancel Reply','sleekr-lite' ),
		'label_submit'      => esc_html__( 'Submit','sleekr-lite' ),

		'comment_field' =>  '<p class="comment-form-comment"><textarea id="comment" class="form-control" name="comment" rows="3" aria-required="true"></textarea></p>',

		'must_log_in' => '<p class="must-log-in">' .
				  sprintf(
				  wp_kses ( __( 'You must be <a href="%s">logged in</a> to post a comment.','sleekr-lite' ), $allowed_html ),
				  wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
				  ) . '</p>',

		'logged_in_as' => '<p class="logged-in-as">' .
				  sprintf(
				  wp_kses ( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>','sleekr-lite' ), $allowed_html ),
				  admin_url( 'profile.php' ),
				  $user_identity,
				  wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
				  ) . '</p>',

		'comment_notes_before' => '<p class="comment-notes">' .
					  esc_html__( 'Your email address will not be published.','sleekr-lite' ) . ( $req ? $required_text : '' ) .
					  '</p>',

		'comment_notes_after' => '<p class="form-allowed-tags">' .
					  sprintf(
					  wp_kses ( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s','sleekr-lite' ), $allowed_html ),
					  ' <code>' . allowed_tags() . '</code>'
					  ) . '</p>' )
	    );
	    ?>
    <?php endif; ?>
</div><!-- #comments -->
