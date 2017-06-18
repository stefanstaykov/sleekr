<?php 

define( 'THEME_DIR', get_template_directory() );
define( 'THEME_URI', get_template_directory_uri() );
define( 'LANG_DIR', THEME_DIR. '/languages' );

define( 'THEME_NAME', 'sleekr-lite' );
define( 'THEME_VERSION', '1.0.0' );

define( 'LIBS_DIR', THEME_DIR. '/functions' );
define( 'LIBS_URI', THEME_URI. '/functions' );

function sleekr_main_css()
{
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css');
    wp_enqueue_style( 'jquery-lightbox', get_template_directory_uri() . '/css/jquery.fancybox.min.css');
}
add_action( 'wp_enqueue_scripts', 'sleekr_main_css' );

function sleekr_scripts_with_jquery()
{
	// Register the script like this for a theme:
	wp_enqueue_script( 'bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ) );
    wp_enqueue_script( 'jqBootstrapValidation', get_template_directory_uri() . '/js/jqBootstrapValidation.js', array( 'jquery' ) );
    wp_enqueue_script( 'sleekr', get_template_directory_uri() . '/js/sleekr-lite.js', array( 'jquery' ) );
    wp_enqueue_script( 'jquery-lightbox', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array( 'jquery' ) );

}
add_action( 'wp_enqueue_scripts', 'sleekr_scripts_with_jquery' );


if ( ! function_exists( 'sleekr_setup' ) ) :
function sleekr_setup() {

    // For translating options
    load_theme_textdomain('sleekr-lite', LANG_DIR);
    
    // Register Custom Navigation Walker
    require_once( LIBS_DIR .'/wp-bootstrap-navwalker.php');
    
    //Breadcrumbs function
    require_once( LIBS_DIR .'/breadcrumbs.php');
    
    //Pagination function
    require_once( LIBS_DIR .'/pagination.php');
    
    //Custom Comments functions
    require_once( LIBS_DIR .'/custom-comments.php');
    
    //Sidebars functions
    require_once( LIBS_DIR .'/sidebars.php');
    
    //Galery function
    require_once( LIBS_DIR .'/gallery-shortcode.php');
    
    //Theme Customizer
    require_once( LIBS_DIR .'/theme-customizer.php');
    
    //Enable support for custom title tag.
    add_theme_support( 'title-tag' );
    
    
    add_theme_support( 'automatic-feed-links' );
    add_editor_style( 'css/editor-style.css' );

	//Enable support for custom logo.
	add_theme_support( 'custom-logo', array(
		'height'      => 48,
		'width'       => 240,
		'flex-width' => true,
	) );
	
	//Enable support for custom background image.
	add_theme_support( 'custom-background' );
	
	//Enable support for custom header image.
	add_theme_support( 'custom-header', array(
	    'width'         => 1920,
	    'height'        => 630,
	    'default-image' => THEME_URI . '/sleekr-header.png',
	    'flex-height'   => true
	) );
	
	//Thumbnail support
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'sleekr-featured-image', 750, 250, true );
	add_image_size( 'sleekr-thumbnail-avatar', 900, 300, true );

	//Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	
	//Content width
	if ( ! isset( $content_width ) ) {
	    $content_width = 1200;
    }

    // This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'sleekr-lite' ),
		'footer' => __( 'Footer menu', 'sleekr-lite' ),
	) );
	
}
endif; // sleekr_setup
add_action( 'after_setup_theme', 'sleekr_setup' );
	
	//Custom logo
function sleekr_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
		the_custom_logo();
    } elseif ( function_exists( 'the_custom_logo' ) && !has_custom_logo() ) { echo '<a class="navbar-brand" href="' .home_url(). '">'; echo bloginfo('name'); echo '</a>'; }
}

    //Custom Attachment Image Class
function sleekr_image_class($class) {
    $class .= ' img-responsive';
    return $class;
}
add_filter('get_image_tag_class', 'sleekr_image_class' );

?>