/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
    jQuery( document )
        .ready( function() {
            jQuery( '.ui.dropdown' )
                .dropdown();
        } );
} )();