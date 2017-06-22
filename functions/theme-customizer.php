<?php
/**
 * Sleekr Lite Theme Customizer Functions
 *
 * @since 1.0.0
 * @package Sleekr_Lite
 */

function sleekr_register_theme_customizer( $wp_customize ) {
    //Add Sleekr Customizer Section
    $wp_customize->add_section(
    'sleekr_theme_options',
    array(
        'title'     => esc_html__('Sleekr Theme Options','sleekr-lite'),
        'priority'  => 1
    )
    );
    //Add Sleekr Homepage Header Setting
    $wp_customize->add_setting(
    'sleekr_header_image',
    array(
        'default'           => THEME_URI . '/sleekr-header.png',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'esc_url_raw'
    )
    );
    //Add Sleekr Homepage Header Control
    $wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'sleekr_header_image',
        array(
            'label'    => esc_html__('Homepage Header Image (1920px x 630px)','sleekr-lite'),
            'settings' => 'sleekr_header_image',
            'section'  => 'sleekr_theme_options'
        )
    )
    );
    //Add Sleekr Display Breadcrumbs Setting
    $wp_customize->add_setting(
    'sleekr_display_breadcrumbs',
    array(
        'default'           =>  'true',
        'transport'         =>  'postMessage',
        'sanitize_callback' => 'sleekr_sanitize_checkbox'
    )
    );
    //Add Sleekr Display Breadcrumbs Control
    $wp_customize->add_control(
    'sleekr_display_breadcrumbs',
    array(
        'section'   => 'sleekr_theme_options',
        'label'     => esc_html__('Display Breadcrumbs?','sleekr-lite'),
        'type'      => 'checkbox'
    )
    );
    //Add Sleekr Display Author Setting
    $wp_customize->add_setting(
    'sleekr_display_author',
    array(
        'default'           =>  'true',
        'transport'         =>  'postMessage',
        'sanitize_callback' => 'sleekr_sanitize_checkbox'
    )
    );
    //Add Sleekr Display Author Control
    $wp_customize->add_control(
    'sleekr_display_author',
    array(
        'section'   => 'sleekr_theme_options',
        'label'     => esc_html__('Display Author Link?','sleekr-lite'),
        'type'      => 'checkbox'
    )
    );
    //Add Sleekr Display Date&Time Setting
    $wp_customize->add_setting(
    'sleekr_display_time',
    array(
        'default'           => 'true',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sleekr_sanitize_checkbox'
    )
    );
    //Add Sleekr Display Date&Time Control
    $wp_customize->add_control(
    'sleekr_display_time',
    array(
        'section'   => 'sleekr_theme_options',
        'label'     => esc_html__('Display Time Meta?','sleekr-lite'),
        'type'      => 'checkbox'
    )
    );
}
add_action( 'customize_register', 'sleekr_register_theme_customizer' );

//Display/hide the Checkbox Options
function sleekr_customizer_css() {
    ?>
    <style type="text/css">
        <?php if( false === get_theme_mod( 'sleekr_display_breadcrumbs' ) && get_theme_mod( 'sleekr_display_breadcrumbs') != '' ) { ?>
            #breadcrumbs { display: none; }
        <?php }?>
        <?php if( false === get_theme_mod( 'sleekr_display_author' ) && get_theme_mod( 'sleekr_display_author') != '' ) { ?>
            .display-author { display: none; }
        <?php }?>
        <?php if( false === get_theme_mod( 'sleekr_display_time' ) && get_theme_mod( 'sleekr_display_time') != '' ) { ?>
            .display-time { display: none; }
        <?php }?>
    </style>
    <?php
}
add_action( 'wp_head', 'sleekr_customizer_css' );

//Call the Customizer JS for Display in the WP Customizer
function sleekr_customizer_live_preview() {
 
    wp_enqueue_script(
        'sleekr-theme-customizer',
        get_template_directory_uri() . '/js/theme-customizer.js',
        array( 'jquery', 'customize-preview' ),
        '0.3.0',
        true
    );
 
}
add_action( 'customize_preview_init', 'sleekr_customizer_live_preview' );

//Checkbox Sanitize Function
function sleekr_sanitize_checkbox( $checked ) {
  // Boolean check.
  return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

?>
