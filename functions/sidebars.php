<?php
/**
 * Sleekr Sidebar Functions
 *
 * @since 1.0.0
 * @package Sleekr
 */

    //Register Main Sidebar
add_action( 'widgets_init', 'sleekr_widgets_init' );
function sleekr_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Main Sidebar', 'sleekr' ),
        'id'            => 'main',
        'description'   => esc_html__( 'Widgets in this area will be shown on all posts and pages.', 'sleekr' ),
        'before_widget' => '<div class="list-group well">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
    ) );

	
	
	//Register 404 Sidebars
if ( function_exists('register_sidebars') )
	register_sidebars(3, array(
	    'name'          => esc_html__('404 Widget Column %d', 'sleekr'),
        'id'            => 's404',
        'description'   => esc_html__( 'Widgets in this area will be shown on the 404 page.', 'sleekr' ),
		'before_widget' => '<div class="list-group">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	));
	
	//Register Footer Sidebars
if ( function_exists('register_sidebars') )
	register_sidebars(3, array(
	    'name'          => esc_html__('Footer %d', 'sleekr'),
        'id'            => 'footer',
        'description'   => esc_html__( 'Widgets in this area will be shown in the footer.', 'sleekr' ),
		'before_widget' => '<div class="list-group">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	));
}
?>
