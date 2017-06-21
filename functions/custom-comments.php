<?php

//Threaded comments after depth 2 function
function sleekr_comment_parent_link( $args = array() ) {

    echo sleekr_get_comment_parent_link( $args );
}

//Constructing the link for threaded comments after depth 2 
function sleekr_get_comment_parent_link( $args = array() ) {

    $link = '';

    $defaults = array(
        'text'   => '%s', // Defaults to comment author.
        'depth'  => 2,    // At what level should the link show.
        'before' => '',   // String to output before link.
        'after'  => ''    // String to output after link.
    );

    $args = wp_parse_args( $args, $defaults );

    if ( $args['depth'] <= $GLOBALS['comment_depth'] ) {

        $parent = get_comment()->comment_parent;

        if ( 0 < $parent ) {

            $url  = esc_url( get_comment_link( $parent ) );
            $text = sprintf( $args['text'], get_comment_author( $parent ) );

            $link = sprintf( '%s<a class="comment-parent-link" href="%s"><span class="fa fa-reply"></span> %s</a>%s', $args['before'], $url, $text, $args['after'] );
        }
    }

    return $link;
}

    //WP List Comment Callback Function
function sleekr_comments($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    $allowed_html = array(
            'strong' => array(),
            'em'     => array(),
            'b'      => array(),
            'i'      => array(),
            's'      => array(),
            'strike' => array(),
            'cite'   => array(),
            'code'   => array(),
            'a'     => array(
                'href' => array(),
                'title'=> array()
            ),
            'abbr' => array(
		        'title' => array()
	        ),
            'acronym' => array(
                'title' => array()
            ),
            'blockquote' => array(
                'cite' => array()
            ),
            'del' => array(
                'datetime' => array()
            ),
            'q' => array(
                'cite' => array()
            )
    );
    switch( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' : ?>
            <li <?php comment_class(); ?> id="comment<?php comment_ID(); ?>">
            <div class="back-link">< ?php comment_author_link(); ?></div>
        <?php break;
        default : ?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? 'media' : 'parent media' ) ?> id="comment-<?php comment_ID() ?>">
    <?php sleekr_comment_parent_link(
    array(
        'depth'  => 3,
        'text'   => __( 'In reply to %s', 'sleekr-lite' ),
        'before' => '<div class="comment-parent">',
        'after'  => '</div>'
    )
    ); ?>
    <div class="pull-left">
        <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'], '', '', array( 'class' => 'media-object' ) ); ?>
    </div>
    <div class="media-body well"><?php echo '<h4 class="media-heading">'.get_comment_author_link().' <small><a href="'; echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); echo'">';
        /* translators: 1: date, 2: time */
        printf( _x('%1$s at %2$s','date and time','sleekr-lite'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)','sleekr-lite' ), '  ', '' );
        ?></small></h4>

        <?php if ( $comment->comment_approved == '0' ) : ?>
             <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.','sleekr-lite' ); ?></em>
              <br />
        <?php endif; ?>

        <?php echo wp_kses( get_comment_text(), $allowed_html ) ?>
        <div class="pull-right">
            <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
        </div>
    </div>
    <?php break; ?>
    <?php endswitch; ?>
    <?php
    }
    
?>
