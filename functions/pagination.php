<?php
// Custom pagination
function custom_pagination() {
    if (!is_single()) {
	    echo '<ul class="pager"><li class="previous">';
        next_posts_link( _x('&larr; Older','Blog/Archive pagination','sleekr') );
        echo '</li><li class="next">';
        previous_posts_link( _x('Newer &rarr;','Blog/Archive pagination','sleekr') );
        echo '</li></ul>';
    } else {
        wp_link_pages( array(
        	'before'            => '<div class="text-center"><ul class="pagination">',
        	'after'             => '</ul></div>',
        	'link_before'       => '',
        	'link_after'        => '',
        	'next_or_number'    => 'number',
        	) );
    }
}
function sleekr_link_pages( $link ) {
    if ( ctype_digit( $link ) ) {
        return '<li class="active"><span>' . $link . '</span></li>';
    } else {
        return '<li>' . $link . '</li>';
    }
    return $link;
}
add_filter( 'wp_link_pages_link', 'sleekr_link_pages' );