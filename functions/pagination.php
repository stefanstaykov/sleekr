<?php
/**
 * Sleekr Lite Custom Pagination Functions
 *
 * @since 1.0.0
 * @package Sleekr
 */
//Archive Pages Pagination Between Lists of Posts
function sleekr_custom_pagination() {
    if ( !is_singular() ) {
	echo '<ul class="pagination justify-content-center mb-4"><li class="page-item">';
        next_posts_link( esc_html_x('&larr; Older','Blog/Archive pagination','sleekr') );
        echo '</li><li class="page-item">';
        previous_posts_link( esc_html_x('Newer &rarr;','Blog/Archive pagination','sleekr') );
        echo '</li></ul>';
    } else {
	//Single Post Pagination
        wp_link_pages( array(
        	'before'            => '<div><ul class="pagination justify-content-center mb-4">',
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
        return '<li class="active page-item"><span class="page-link">' . $link . '</span></li>';
    } else {
        return '<li class="page-item"><span class="page-link">' . $link . '</span></li>';
    }
    return $link;
}
add_filter( 'wp_link_pages_link', 'sleekr_link_pages' );
