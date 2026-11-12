<?php
/**
 * Types de contenus personnalisés.
 *
 * Actualités : type natif « post ».
 *
 * @package FondationLona
 */

defined( 'ABSPATH' ) || exit;

/**
 * Libellés standard d'un type de contenu.
 *
 * @param string $singular Nom au singulier.
 * @param string $plural   Nom au pluriel.
 * @param bool   $feminine Accord féminin.
 */
function lona_cpt_labels( string $singular, string $plural, bool $feminine = false ): array {
	return array(
		'name'               => $plural,
		'singular_name'      => $singular,
		'menu_name'          => $plural,
		/* translators: %s: nom du contenu */
		'add_new_item'       => sprintf( $feminine ? __( 'Ajouter une %s', 'fondation-lona' ) : __( 'Ajouter un %s', 'fondation-lona' ), mb_strtolower( $singular ) ),
		'add_new'            => __( 'Ajouter', 'fondation-lona' ),
		/* translators: %s: nom du contenu */
		'edit_item'          => sprintf( __( 'Modifier : %s', 'fondation-lona' ), mb_strtolower( $singular ) ),
		/* translators: %s: nom du contenu */
		'all_items'          => sprintf( __( 'Tous : %s', 'fondation-lona' ), mb_strtolower( $plural ) ),
		'search_items'       => __( 'Rechercher', 'fondation-lona' ),
		'not_found'          => __( 'Aucun élément trouvé.', 'fondation-lona' ),
		'featured_image'     => __( 'Image principale', 'fondation-lona' ),
		'set_featured_image' => __( 'Définir l\'image principale', 'fondation-lona' ),
	);
}

add_action(
	'init',
	static function () {
		$common = array(
			'show_in_rest'  => true,
			'menu_position' => 21,
			'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'revisions' ),
		);

		register_post_type(
			'lona_program',
			array_merge(
				$common,
				array(
					'labels'      => lona_cpt_labels( __( 'Programme', 'fondation-lona' ), __( 'Programmes', 'fondation-lona' ) ),
					'public'      => true,
					'has_archive' => 'programmes',
					'rewrite'     => array( 'slug' => 'programmes', 'with_front' => false ),
					'menu_icon'   => 'dashicons-awards',
					'supports'    => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'revisions', 'page-attributes' ),
				)
			)
		);

		register_post_type(
			'lona_project',
			array_merge(
				$common,
				array(
					'labels'      => lona_cpt_labels( __( 'Réalisation', 'fondation-lona' ), __( 'Réalisations', 'fondation-lona' ), true ),
					'public'      => true,
					'has_archive' => 'realisations',
					'rewrite'     => array( 'slug' => 'realisations', 'with_front' => false ),
					'menu_icon'   => 'dashicons-flag',
				)
			)
		);

		register_post_type(
			'lona_event',
			array_merge(
				$common,
				array(
					'labels'      => lona_cpt_labels( __( 'Événement', 'fondation-lona' ), __( 'Événements', 'fondation-lona' ) ),
					'public'      => true,
					'has_archive' => 'evenements',
					'rewrite'     => array( 'slug' => 'evenements', 'with_front' => false ),
					'menu_icon'   => 'dashicons-calendar-alt',
				)
			)
		);

		// Contenus affichés via des blocs : pas de page publique individuelle.
		$internal = array(
			'public'             => false,
			'publicly_queryable' => false,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'exclude_from_search'=> true,
			'has_archive'        => false,
			'rewrite'            => false,
			'menu_position'      => 22,
		);

		register_post_type(
			'lona_partner',
			array_merge(
				$internal,
				array(
					'labels'    => lona_cpt_labels( __( 'Partenaire', 'fondation-lona' ), __( 'Partenaires', 'fondation-lona' ) ),
					'menu_icon' => 'dashicons-groups',
					'supports'  => array( 'title', 'thumbnail', 'excerpt', 'custom-fields', 'page-attributes' ),
				)
			)
		);

		register_post_type(
			'lona_testimonial',
			array_merge(
				$internal,
				array(
					'labels'    => lona_cpt_labels( __( 'Témoignage', 'fondation-lona' ), __( 'Témoignages', 'fondation-lona' ) ),
					'menu_icon' => 'dashicons-format-quote',
					'supports'  => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes' ),
				)
			)
		);

		register_post_type(
			'lona_team',
			array_merge(
				$internal,
				array(
					'labels'    => lona_cpt_labels( __( 'Membre de l\'équipe', 'fondation-lona' ), __( 'Équipe', 'fondation-lona' ) ),
					'menu_icon' => 'dashicons-id',
					'supports'  => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes' ),
				)
			)
		);

		// Demandes reçues via les formulaires : privées, réservées aux administrateurs.
		register_post_type(
			'lona_submission',
			array(
				'labels'          => lona_cpt_labels( __( 'Demande reçue', 'fondation-lona' ), __( 'Demandes reçues', 'fondation-lona' ), true ),
				'public'          => false,
				'show_ui'         => true,
				'show_in_menu'    => 'lona-settings',
				'show_in_rest'    => false,
				'supports'        => array( 'title' ),
				'capability_type' => 'post',
				'capabilities'    => array( 'create_posts' => 'do_not_allow' ),
				'map_meta_cap'    => true,
				'rewrite'         => false,
			)
		);
	}
);

/**
 * Seuls les administrateurs voient les demandes reçues (données personnelles).
 */
add_filter(
	'map_meta_cap',
	static function ( $caps, $cap, $user_id, $args ) {
		$watched = array( 'edit_post', 'read_post', 'delete_post' );
		if ( in_array( $cap, $watched, true ) && ! empty( $args[0] ) && 'lona_submission' === get_post_type( (int) $args[0] ) ) {
			return array( 'manage_options' );
		}
		if ( 'edit_posts' === $cap && is_admin() && isset( $_GET['post_type'] ) && 'lona_submission' === $_GET['post_type'] ) { // phpcs:ignore WordPress.Security.NonceVerification
			return array( 'manage_options' );
		}
		return $caps;
	},
	10,
	4
);

/**
 * Rafraîchit les permaliens une seule fois après l'activation du thème.
 */
add_action(
	'after_switch_theme',
	static function () {
		update_option( 'lona_flush_rewrite', 1 );
	}
);
add_action(
	'init',
	static function () {
		if ( get_option( 'lona_flush_rewrite' ) ) {
			flush_rewrite_rules( false );
			delete_option( 'lona_flush_rewrite' );
		}
	},
	99
);

/**
 * Archives : tri par ordre manuel (programmes) et par date d'événement.
 */
add_action(
	'pre_get_posts',
	static function ( WP_Query $query ) {
		if ( is_admin() || ! $query->is_main_query() ) {
			return;
		}
		if ( $query->is_post_type_archive( 'lona_program' ) ) {
			$query->set( 'orderby', array( 'menu_order' => 'ASC', 'title' => 'ASC' ) );
		}
		if ( $query->is_post_type_archive( 'lona_event' ) ) {
			$query->set( 'meta_key', 'lona_start_date' );
			$query->set( 'orderby', 'meta_value' );
			$query->set( 'order', 'DESC' );
		}
	}
);
