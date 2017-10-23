/**
 * File theme-customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * @since 1.0.0
 * @package Sleekr_Lite
 */

(function( $ ) {
    "use strict";
    // Display/hide breadcrumbs.
    wp.customize( 'sleekr_display_breadcrumbs', function( value ) {
        value.bind( function( to ) {
            false === to ? $( '#breadcrumbs' ).hide() : $( '#breadcrumbs' ).show();
        } );
    });
    // Display/hide author.
    wp.customize( 'sleekr_display_author', function( value ) {
        value.bind( function( to ) {
            false === to ? $( '.display-author' ).hide() : $( '.display-author' ).show();
        } );
    });
    // Display/hide date & time.
    wp.customize( 'sleekr_display_time', function( value ) {
        value.bind( function( to ) {
            false === to ? $( '.display-time' ).hide() : $( '.display-time' ).show();
        } );
    });
    // Display Theme Custom Homepage Header Image.
    wp.customize( 'sleekr_header_image', function( value ) {
    value.bind( function( to ) {
 
        0 === $.trim( to ).length ?
            $( '#header-image' ).text('') :
            $( '#header-image' ).html('<img class="img-responsive" src="' + to + '"><hr>');
 
    });
    });
 
})( jQuery );
