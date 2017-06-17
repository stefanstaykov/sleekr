<?php

    //Register Main Sidebar
add_action( 'widgets_init', 'sleekr_widgets_init' );
function sleekr_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Main Sidebar', 'sleekr-lite' ),
        'id'            => 'main',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'sleekr-lite' ),
        'before_widget' => '<div class="list-group well">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
    ) );

	
	
	//Register 404 Sidebars
if ( function_exists('register_sidebars') )
	register_sidebars(3, array(
	    'name'          => __('404 Widget Column %d', 'sleekr-lite'),
        'id'            => 's404',
        'description'   => __( 'Widgets in this area will be shown on the 404 page.', 'sleekr-lite' ),
		'before_widget' => '<div class="list-group">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	));
	
	//Register Footer Sidebars
if ( function_exists('register_sidebars') )
	register_sidebars(3, array(
	    'name'          => __('Footer %d', 'sleekr-lite'),
        'id'            => 'footer',
        'description'   => __( 'Widgets in this area will be shown in the footer.', 'sleekr-lite' ),
		'before_widget' => '<div class="list-group">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	));
}
?>