<?php
/**
 * The template for displaying Comments.
 */
?>
		
<div id="comments">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'sleekr' ); ?></p>
		</div>
		<?php return;
	endif; ?>

	<?php if ( have_comments() ) : ?>
		<h4 id="comments-title">
			<?php
				if( get_comments_number() == 1 ){
					echo get_comments_number() .' '. __('Comment','sleekr');
				} else {
					echo get_comments_number() .' '. __('Comments','sleekr');
				}
			?>
		</h4>

		<div class="comment-list">
			<?php wp_list_comments(array(
					'avatar_size' => 64,
					'style'       => 'div',
					'short_ping'  => true,
					'callback'    => 'sleekr_comments',
					'reply_text'  => __( 'Reply', 'sleekr' ),
				)); ?>
		</div>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav" class="pager">
			<li class="previous"><?php previous_comments_link( __( '&larr; Older Comments', 'sleekr' ) ); ?></li>
			<li class="next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'sleekr' ) ); ?></li>
		</nav>
		<?php endif; ?>

	<?php
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'sleekr' ); ?></p>
	<?php endif; ?>
	<?php if ( comments_open() ) : ?>
	<hr>
	<!-- Comment Form Custom Code -->
	<div class="well">
    <?php
    $required_text = sprintf( ' ' . __('Required fields are marked with %s','sleekr'), '<span class="required">*</span>' );
    $fields =  array(

  'author' =>
    '<p class="comment-form-author">' . __( 'Name ', 'sleekr' ) .
    ( $req ? '<span class="required">*</span>' : '' ) .
    '<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
    '" size="30" /></p>',

  'email' =>
    '<p class="comment-form-email">' . __( 'Email ', 'sleekr' ) .
    ( $req ? '<span class="required">*</span>' : '' ) .
    '<input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '" size="30" /></p>',

  'url' =>
    '<p class="comment-form-url">' . __( 'Website ', 'sleekr' )  .
    '<input id="url" class="form-control" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
    '" size="30" /></p>',
);
	comment_form( array(
	    'fields'            => $fields,
        'class_form'        => 'form-group',
        'class_submit'      => 'btn btn-primary',
        'title_reply'       => __( 'Leave a Comment:','sleekr' ),
        'title_reply_to'    => __( 'Leave a Reply to %s','sleekr' ),
        'cancel_reply_link' => __( 'Cancel Reply','sleekr' ),
        'label_submit'      => __( 'Submit','sleekr' ),

        'comment_field' =>  '<p class="comment-form-comment"><textarea id="comment" class="form-control" name="comment" rows="3" aria-required="true"></textarea></p>',

        'must_log_in' => '<p class="must-log-in">' .
                          sprintf(
                          __( 'You must be <a href="%s">logged in</a> to post a comment.','sleekr' ),
                          wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
                          ) . '</p>',

        'logged_in_as' => '<p class="logged-in-as">' .
                          sprintf(
                          __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>','sleekr' ),
                          admin_url( 'profile.php' ),
                          $user_identity,
                          wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
                          ) . '</p>',

        'comment_notes_before' => '<p class="comment-notes">' .
                                  __( 'Your email address will not be published.','sleekr' ) . ( $req ? $required_text : '' ) .
                                  '</p>',

        'comment_notes_after' => '<p class="form-allowed-tags">' .
                                  sprintf(
                                  __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s','sleekr' ),
                                  ' <code>' . allowed_tags() . '</code>'
                                  ) . '</p>' )
    );
    ?>
    </div><!-- end comment form -->
    <?php endif; ?>
</div><!-- #comments -->
