/**
 * Fondation LONA — sélecteurs de médias (galeries des fiches, logo clair).
 */
( function ( $ ) {
	'use strict';

	var i18n = window.lonaAdmin || {};

	// Galerie (champ « Galerie photos »).
	$( document ).on( 'click', '.lona-gallery-button', function ( e ) {
		e.preventDefault();
		var $input = $( '#' + $( this ).data( 'target' ) );
		var $preview = $( this ).siblings( '.lona-gallery-preview' );
		var ids = ( $input.val() || '' ).split( ',' ).filter( Boolean );
		var frame = wp.media( { title: i18n.choose, button: { text: i18n.use }, multiple: 'add', library: { type: 'image' } } );
		frame.on( 'open', function () {
			var selection = frame.state().get( 'selection' );
			ids.forEach( function ( id ) {
				var attachment = wp.media.attachment( id );
				attachment.fetch();
				selection.add( attachment );
			} );
		} );
		frame.on( 'select', function () {
			var chosen = frame.state().get( 'selection' ).toJSON();
			$input.val( chosen.map( function ( a ) { return a.id; } ).join( ',' ) );
			$preview.empty();
			chosen.forEach( function ( a ) {
				var src = a.sizes && a.sizes.thumbnail ? a.sizes.thumbnail.url : a.url;
				$preview.append( $( '<li/>' ).append( $( '<img/>' ).attr( { src: src, alt: '' } ) ) );
			} );
		} );
		frame.open();
	} );

	// Image unique (réglages : logo clair).
	$( document ).on( 'click', '.lona-image-button', function ( e ) {
		e.preventDefault();
		var $input = $( '#' + $( this ).data( 'target' ) );
		var $preview = $( this ).siblings( '.lona-image-preview' );
		var frame = wp.media( { title: i18n.chooseOne, button: { text: i18n.use }, multiple: false, library: { type: 'image' } } );
		frame.on( 'select', function () {
			var a = frame.state().get( 'selection' ).first().toJSON();
			$input.val( a.id );
			var src = a.sizes && a.sizes.medium ? a.sizes.medium.url : a.url;
			$preview.html( $( '<img/>' ).attr( { src: src, alt: '' } ) );
		} );
		frame.open();
	} );
	$( document ).on( 'click', '.lona-image-remove', function ( e ) {
		e.preventDefault();
		$( '#' + $( this ).data( 'target' ) ).val( '' );
		$( this ).siblings( '.lona-image-preview' ).empty();
	} );
} )( jQuery );
