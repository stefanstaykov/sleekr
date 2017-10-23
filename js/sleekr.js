/**
 * File sleekr.js.
 * 
 * File for general theme javascript use.
 *
 * @since 1.0.0
 * @package Sleekr
 */

//Move the static menu bar bellow the WordPress admin bar.
(function( $ ) {
    "use strict";
 
    $(function() {
        if ( $( "#wpadminbar" ).length ) {
            $( ".navbar" ).addClass('admin-bar');
        }
    });
 
})( jQuery );

