<?php
/**
 * Taxonomies : domaines d'intervention (partagée) et types de partenaires.
 *
 * @package FondationLona
 */

defined( 'ABSPATH' ) || exit;

add_action(
	'init',
	static function () {
		register_taxonomy(
			'lona_domain',
			array( 'post', 'lona_program', 'lona_project', 'lona_event', 'lona_testimonial' ),
			array(
				'labels'            => array(
					'name'          => __( 'Domaines d\'intervention', 'fondation-lona' ),
					'singular_name' => __( 'Domaine d\'intervention', 'fondation-lona' ),
					'menu_name'     => __( 'Domaines', 'fondation-lona' ),
					'all_items'     => __( 'Tous les domaines', 'fondation-lona' ),
					'add_new_item'  => __( 'Ajouter un domaine', 'fondation-lona' ),
					'edit_item'     => __( 'Modifier le domaine', 'fondation-lona' ),
				),
				'hierarchical'      => true,
				'public'            => true,
				'show_in_rest'      => true,
				'show_admin_column' => true,
				'rewrite'           => array( 'slug' => 'domaine', 'with_front' => false ),
			)
		);

		register_taxonomy(
			'lona_partner_type',
			array( 'lona_partner' ),
			array(
				'labels'            => array(
					'name'          => __( 'Types de partenaires', 'fondation-lona' ),
					'singular_name' => __( 'Type de partenaire', 'fondation-lona' ),
				),
				'hierarchical'      => true,
				'public'            => false,
				'show_ui'           => true,
				'show_in_rest'      => true,
				'show_admin_column' => true,
				'rewrite'           => false,
			)
		);

		register_taxonomy(
			'lona_team_group',
			array( 'lona_team' ),
			array(
				'labels'            => array(
					'name'          => __( 'Groupes (gouvernance, équipe…)', 'fondation-lona' ),
					'singular_name' => __( 'Groupe', 'fondation-lona' ),
				),
				'hierarchical'      => true,
				'public'            => false,
				'show_ui'           => true,
				'show_in_rest'      => true,
				'show_admin_column' => true,
				'rewrite'           => false,
			)
		);
	},
	5
);
