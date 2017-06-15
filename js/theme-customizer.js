(function( $ ) {
    "use strict";
 
    wp.customize( 'sleekr_display_breadcrumbs', function( value ) {
        value.bind( function( to ) {
            false === to ? $( '#breadcrumbs' ).hide() : $( '#breadcrumbs' ).show();
        } );
    });
    
    wp.customize( 'sleekr_display_author', function( value ) {
        value.bind( function( to ) {
            false === to ? $( '.display-author' ).hide() : $( '.display-author' ).show();
        } );
    });
    wp.customize( 'sleekr_display_time', function( value ) {
        value.bind( function( to ) {
            false === to ? $( '.display-time' ).hide() : $( '.display-time' ).show();
        } );
    });
    
    wp.customize( 'sleekr_header_image', function( value ) {
    value.bind( function( to ) {
 
        0 === $.trim( to ).length ?
            $( '#header-image' ).text('') :
            $( '#header-image' ).html('<img class="img-responsive" src="' + to + '"><hr>');
 
    });
    });
 
})( jQuery );