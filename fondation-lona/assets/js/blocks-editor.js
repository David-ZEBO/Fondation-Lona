/**
 * Fondation LONA — enregistrement des blocs dynamiques dans l'éditeur.
 * Aperçu serveur (ServerSideRender) + réglages générés depuis block.json.
 * Aucun build nécessaire.
 */
( function ( wp ) {
	'use strict';

	var el = wp.element.createElement;
	var Fragment = wp.element.Fragment;
	var InspectorControls = wp.blockEditor.InspectorControls;
	var useBlockProps = wp.blockEditor.useBlockProps;
	var PanelBody = wp.components.PanelBody;
	var SelectControl = wp.components.SelectControl;
	var RangeControl = wp.components.RangeControl;
	var ToggleControl = wp.components.ToggleControl;
	var TextControl = wp.components.TextControl;
	var ServerSideRender = wp.serverSideRender;
	var __ = wp.i18n.__;

	var domains = ( window.lonaBlocks && window.lonaBlocks.domains ) || {};

	var LABELS = {
		count: 'Nombre d’éléments',
		domain: 'Domaine d’intervention',
		layout: 'Mise en page',
		tone: 'Couleur',
		featuredOnly: 'Uniquement les partenaires mis en avant',
		showNames: 'Afficher noms et descriptions',
		scope: 'Période',
		group: 'Groupe (slug : gouvernance, equipe…)',
		type: 'Type de formulaire',
	};
	var OPTIONS = {
		layout: { feature: 'Mise en avant du premier', list: 'Liste' },
		tone: { dark: 'Sur fond foncé', light: 'Sur fond clair' },
		scope: { upcoming: 'À venir', past: 'Passés', all: 'Tous' },
		type: { contact: 'Contact', partner: 'Partenariat', volunteer: 'Bénévolat', newsletter: 'Newsletter' },
	};

	var optionLabel = function ( attr, value ) {
		if ( attr === 'domain' ) {
			return value === '' ? 'Tous les domaines' : domains[ value ] || value;
		}
		return ( OPTIONS[ attr ] && OPTIONS[ attr ][ value ] ) || value;
	};

	var controlFor = function ( name, def, props ) {
		var value = props.attributes[ name ];
		var set = function ( v ) {
			var update = {};
			update[ name ] = v;
			props.setAttributes( update );
		};
		var label = LABELS[ name ] || name;
		if ( def.enum ) {
			return el( SelectControl, {
				key: name,
				label: label,
				value: value,
				options: def.enum.map( function ( v ) {
					return { value: v, label: optionLabel( name, v ) };
				} ),
				onChange: set,
				__nextHasNoMarginBottom: true,
			} );
		}
		if ( def.type === 'number' ) {
			return el( RangeControl, { key: name, label: label, value: value, min: 1, max: 24, onChange: set, __nextHasNoMarginBottom: true } );
		}
		if ( def.type === 'boolean' ) {
			return el( ToggleControl, { key: name, label: label, checked: !! value, onChange: set, __nextHasNoMarginBottom: true } );
		}
		return el( TextControl, { key: name, label: label, value: value || '', onChange: set, __nextHasNoMarginBottom: true } );
	};

	var NAMES = [
		'programs', 'projects', 'impact-stats', 'testimonials', 'partners', 'events', 'team', 'form',
		'breadcrumbs', 'share', 'language-switcher', 'contact-info', 'social-links', 'donate', 'entry-details', 'copyright', 'site-header',
	];

	NAMES.forEach( function ( short ) {
		var name = 'lona/' + short;
		wp.blocks.registerBlockType( name, {
			edit: function ( props ) {
				var type = wp.blocks.getBlockType( name );
				var attrs = ( type && type.attributes ) || {};
				var controls = Object.keys( attrs )
					.filter( function ( key ) {
						return LABELS[ key ];
					} )
					.map( function ( key ) {
						return controlFor( key, attrs[ key ], props );
					} );
				var blockProps = useBlockProps( { className: 'lona-block-preview' } );
				return el(
					Fragment,
					null,
					controls.length
						? el( InspectorControls, null, el( PanelBody, { title: __( 'Réglages', 'fondation-lona' ), initialOpen: true }, controls ) )
						: null,
					el(
						'div',
						blockProps,
						el( ServerSideRender, {
							block: name,
							attributes: props.attributes,
							urlQueryArgs: props.context && props.context.postId ? { post_id: props.context.postId } : {},
							EmptyResponsePlaceholder: function () {
								return el( 'p', { className: 'lona-editor-notice' }, ( type && type.title ) + ' — ' + __( 'aucun contenu à afficher pour le moment.', 'fondation-lona' ) );
							},
						} )
					)
				);
			},
			save: function () {
				return null;
			},
		} );
	} );
} )( window.wp );
