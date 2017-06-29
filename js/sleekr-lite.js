/**
 * File sleekr-lite.js.
 * 
 * File for general theme javascript use.
 *
 * @since 1.0.0
 * @package Sleekr_Lite
 */

//Move the static menu bar bellow the WordPress admin bar.
(function( $ ) {
    "use strict";
 
    $(function() {
        if ( $( "#wpadminbar" ).length ) {
            $( ".navbar" ).addClass('admin-bar');
        }
        $( "table" ).addClass('table');
    });
 
})( jQuery );

