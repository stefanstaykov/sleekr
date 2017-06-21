/**
 * File sleekr-lite.js.
 *
 * Move the static menu bar bellow the WordPress admin bar.
 */
(function( $ ) {
    "use strict";
 
    $(function() {
        if ( $( "#wpadminbar" ).length ) {
            $( ".navbar" ).addClass('admin-bar');
        }
    });
 
})( jQuery );

