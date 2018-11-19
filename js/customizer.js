/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {  
	// title
	wp.customize( 'h1_text', function( value ) {
	  value.bind( function( to ) {
	    $( '.classic .header-page-title h1' ).html( to );
	  } );
	} );
 
	// subtitle
	wp.customize( 'h3_text', function( value ) {
	  value.bind( function( to ) {
	    $( '.classic .header-page-title h3' ).html( to );
	  } );
	} );
	// left button
	wp.customize( 'btn_left', function( value ) {
	  value.bind( function( to ) {
	    $( '.classic .header-page-title .lft-btn' ).html( to );
	  } );
	} );
	// left button link
	wp.customize( 'btn_left_link', function( value ) {
	  value.bind( function( to ) {
	    $( '.classic .header-page-title .lft-btn' ).attr("href", to );
	  } );
	} );
	// right button
	wp.customize( 'btn_right', function( value ) {
	  value.bind( function( to ) {
	    $( '.classic .header-page-title .rht-btn' ).html( to );
	  } );
	} );
 
	// right button link
	wp.customize( 'btn_right_link', function( value ) {
	  value.bind( function( to ) {
	    $( '.classic .header-page-title .rht-btn' ).attr("href", to );
	  } );
	} );

} )( jQuery );
