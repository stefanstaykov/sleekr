<?php
/**
 * Sleekr Custom Pagination Functions
 *
 * @since 1.0.0
 * @package Sleekr
 */
//Archive Pages Pagination Between Lists of Posts
function sleekr_custom_pagination() {
    if ( !is_single() ) {
	    echo '<ul class="pager"><li class="previous">';
        next_posts_link( esc_html_x('&larr; Older','Blog/Archive pagination','sleekr') );
        echo '</li><li class="next">';
        previous_posts_link( esc_html_x('Newer &rarr;','Blog/Archive pagination','sleekr') );
        echo '</li></ul>';
    } else {
	//Single Post Pagination
        wp_link_pages( array(
        	'before'            => '<div class="text-center"><ul class="pagination">',
        	'after'             => '</ul></div>',
        	'link_before'       => '',
        	'link_after'        => '',
        	'next_or_number'    => 'number',
        	) );
    }
}
//Styling the Active Link in Post Pagination
function sleekr_link_pages( $link ) {
    if ( ctype_digit( $link ) ) {
        return '<li class="active"><span>' . $link . '</span></li>';
    } else {
        return '<li>' . $link . '</li>';
    }
    return $link;
}
add_filter( 'wp_link_pages_link', 'sleekr_link_pages' );
