/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function( $ ) {
    $( document )
        .ready( function() {
            $( '.ui.dropdown' )
                .dropdown();
            // fix menu when passed
            $( '.masthead' )
                .visibility( {
                    once: false,
                    onBottomPassed: function() {
                        $( '.fixed.menu' )
                            .transition( 'fade in' );
                    },
                    onBottomPassedReverse: function() {
                        $( '.fixed.menu' )
                            .transition( 'fade out' );
                    }
                } );
            // create sidebar and attach to menu open
            $( '.ui.sidebar' )
                .sidebar( 'attach events', '.toc.item' );
        } );


} )( jQuery );