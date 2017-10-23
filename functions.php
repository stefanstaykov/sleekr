<?php 
/**
 * Sleekr functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @since 1.0.0
 * @package Sleekr
 */

define( 'SLEEKR_THEME_URI', get_template_directory_uri() );
define( 'SLEEKR_LANG_DIR', get_template_directory(). '/languages' );
define( 'SLEEKR_LIBS_DIR', get_template_directory(). '/functions' );

//Enqueue styles and fonts.
function sleekr_main_css()
{
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css');
    wp_enqueue_style( 'jquery-lightbox', get_template_directory_uri() . '/css/jquery.fancybox.min.css');
    wp_enqueue_style( 'sleekr-style', get_stylesheet_uri() );
    wp_enqueue_style( 'sleekr-google-fonts', 'https://fonts.googleapis.com/css?family=Exo+2:400,400i,700,700i&amp;subset=cyrillic', false );
}
add_action( 'wp_enqueue_scripts', 'sleekr_main_css' );

//Enqueue scripts with jquery.
function sleekr_scripts_with_jquery()
{
    wp_enqueue_script( 'popper', get_template_directory_uri() . '/js/popper.min.js', array( 'jquery' ) );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ) );
    wp_enqueue_script( 'jqBootstrapValidation', get_template_directory_uri() . '/js/jqBootstrapValidation.js', array( 'jquery' ) );
    wp_enqueue_script( 'sleekr', get_template_directory_uri() . '/js/sleekr.js', array( 'jquery' ) );
    wp_enqueue_script( 'jquery-lightbox', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array( 'jquery' ) );

}
add_action( 'wp_enqueue_scripts', 'sleekr_scripts_with_jquery' );

//Enable Threaded Comments support
function sleekr_thread_comment_js(){
if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') ) { wp_enqueue_script( 'comment-reply' ); }
}
add_action('wp_print_scripts', 'sleekr_thread_comment_js');


if ( ! function_exists( 'sleekr_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function sleekr_setup() {

    // Translation textdomain and dir
    load_theme_textdomain('sleekr', SLEEKR_LANG_DIR);
    
    // Register Custom Navigation Walker
    require_once( SLEEKR_LIBS_DIR .'/bootstrap-navwalker.php');
    
    //Breadcrumbs function
    require_once( SLEEKR_LIBS_DIR .'/breadcrumbs.php');
    
    //Pagination function
    require_once( SLEEKR_LIBS_DIR .'/pagination.php');
    
    //Custom Comments functions
    require_once( SLEEKR_LIBS_DIR .'/custom-comments.php');
    
    //Sidebars functions
    require_once( SLEEKR_LIBS_DIR .'/sidebars.php');
    
    //Galery shorcode function
    require_once( SLEEKR_LIBS_DIR .'/gallery-shortcode.php');
    
    //Theme Customizer functions
    require_once( SLEEKR_LIBS_DIR .'/theme-customizer.php');
    
    //Initialize the update checker.
    require_once ( SLEEKR_LIBS_DIR .'/theme-update-checker.php');
    $example_update_checker = new ThemeUpdateChecker(
    'sleekr',
    'https://www.webhostface.com/wordpress-themes/sleekr/theme-update.json'
    );
    
    //Let WordPress manage the document title.
    add_theme_support( 'title-tag' );
    
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
	
    // Add Editor Style styles.
    add_editor_style( 'css/editor-style.css' );

    //Enable support for custom logo.
    add_theme_support( 'custom-logo', array(
	'height'        => 48,
	'width'         => 240,
	'flex-width'    => true,
    ) );
	
    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', array('default-color' => 'fff') );
	
    //Enable support for custom header image.
    add_theme_support( 'custom-header', array(
        'width'         => 1920,
        'height'        => 630,
        'default-image' => SLEEKR_THEME_URI . '/sleekr-main-header.png',
        'flex-height'   => true,
        'header-text'	=> false
    ) );
	
    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
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
    $GLOBALS['content_width'] = 770;

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus( array(
    	'primary'   => esc_html__( 'Top primary menu', 'sleekr' ),
	'footer'    => esc_html__( 'Footer menu', 'sleekr' ),
    ) );
	
    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );
	
}
endif; // sleekr_setup
add_action( 'after_setup_theme', 'sleekr_setup' );
	
//Custom logo function
function sleekr_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
		the_custom_logo();
    } elseif ( function_exists( 'the_custom_logo' ) && !has_custom_logo() ) { echo '<a class="navbar-brand" href="' .home_url(). '">'; echo bloginfo('name'); echo '</a>'; }
}

//Default Favicon if non selected
function sleekr_favicon() { ?>
<link rel="shortcut icon" href="<?php echo SLEEKR_THEME_URI. '/favicon.png'?>" />
<?php }
add_action('wp_head', 'sleekr_favicon');

//Translatable strings for .sticky & .bypostauthor
function sleekr_translatable_css() {
    ?>
    <style type="text/css">
        .sticky:before {content: "<?php echo esc_html_x('Featured','Sticky Post','sleekr') ?>"}
        .bypostauthor > .card-body > .float-left::after {content: "<?php echo esc_html_x('Author','Comment by Post Author','sleekr') ?>"}
    </style>
    <?php
}
add_action( 'wp_head', 'sleekr_translatable_css' );

//Adding style to the pagination links
add_filter('next_posts_link_attributes', 'sleekr_pagination_link_attributes');
add_filter('previous_posts_link_attributes', 'sleekr_pagination_link_attributes');
add_filter('next_comments_link_attributes', 'sleekr_pagination_link_attributes');
add_filter('previous_comments_link_attributes', 'sleekr_pagination_link_attributes');

function sleekr_pagination_link_attributes() {
    return 'class="page-link"';
}
    
?>
