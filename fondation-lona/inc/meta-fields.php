<?php
/**
 * Champs personnalisés natifs (register_post_meta + boîtes de saisie).
 *
 * Toutes les métas sont exposées à l'API REST (compatibles Gutenberg) et
 * modifiables dans une boîte « Informations » sous l'éditeur.
 *
 * @package FondationLona
 */

defined( 'ABSPATH' ) || exit;

/**
 * Définition des champs par type de contenu.
 *
 * @return array<string,array<string,array>>
 */
function lona_meta_schema(): array {
	$location = array( 'type' => 'text', 'label' => __( 'Lieu', 'fondation-lona' ), 'help' => __( 'Ex. : Kinshasa, Gombe', 'fondation-lona' ) );
	$gallery  = array( 'type' => 'gallery', 'label' => __( 'Galerie photos', 'fondation-lona' ) );
	$partners = array( 'type' => 'posts', 'post_type' => 'lona_partner', 'label' => __( 'Partenaires associés', 'fondation-lona' ) );
	$video    = array( 'type' => 'url', 'label' => __( 'Vidéo (lien YouTube ou Vimeo)', 'fondation-lona' ) );

	return array(
		'lona_program'     => array(
			'tagline'     => array( 'type' => 'text', 'label' => __( 'Accroche courte', 'fondation-lona' ) ),
			'status'      => array( 'type' => 'select', 'label' => __( 'Statut', 'fondation-lona' ), 'options' => array( '' => '—', 'active' => __( 'En cours', 'fondation-lona' ), 'upcoming' => __( 'À venir', 'fondation-lona' ), 'done' => __( 'Terminé', 'fondation-lona' ) ) ),
			'location'    => $location,
			'start_date'  => array( 'type' => 'date', 'label' => __( 'Date de lancement', 'fondation-lona' ) ),
			'objectives'  => array( 'type' => 'textarea', 'label' => __( 'Objectifs (un par ligne)', 'fondation-lona' ) ),
			'results'     => array( 'type' => 'textarea', 'label' => __( 'Résultats (un par ligne)', 'fondation-lona' ), 'help' => __( 'Affichés uniquement si la case « Résultats vérifiés » est cochée.', 'fondation-lona' ) ),
			'verified'    => array( 'type' => 'checkbox', 'label' => __( 'Résultats vérifiés et validés pour publication', 'fondation-lona' ) ),
			'gallery'     => $gallery,
			'video'       => $video,
			'partners'    => $partners,
			'cta_label'   => array( 'type' => 'text', 'label' => __( 'Bouton d\'action — texte', 'fondation-lona' ) ),
			'cta_url'     => array( 'type' => 'url', 'label' => __( 'Bouton d\'action — lien', 'fondation-lona' ) ),
		),
		'lona_project'     => array(
			'location'    => $location,
			'date'        => array( 'type' => 'date', 'label' => __( 'Date de réalisation', 'fondation-lona' ) ),
			'program'     => array( 'type' => 'post', 'post_type' => 'lona_program', 'label' => __( 'Programme concerné', 'fondation-lona' ) ),
			'results'     => array( 'type' => 'textarea', 'label' => __( 'Résultats (un par ligne)', 'fondation-lona' ), 'help' => __( 'Affichés uniquement si la case « Résultats vérifiés » est cochée.', 'fondation-lona' ) ),
			'verified'    => array( 'type' => 'checkbox', 'label' => __( 'Résultats vérifiés et validés pour publication', 'fondation-lona' ) ),
			'gallery'     => $gallery,
			'video'       => $video,
			'partners'    => $partners,
		),
		'lona_event'       => array(
			'start_date'  => array( 'type' => 'date', 'label' => __( 'Date de début', 'fondation-lona' ), 'help' => __( 'Obligatoire pour apparaître dans la liste des événements.', 'fondation-lona' ) ),
			'end_date'    => array( 'type' => 'date', 'label' => __( 'Date de fin', 'fondation-lona' ) ),
			'time'        => array( 'type' => 'text', 'label' => __( 'Horaires', 'fondation-lona' ), 'help' => __( 'Ex. : 9h00 – 17h00', 'fondation-lona' ) ),
			'location'    => $location,
			'register_url'=> array( 'type' => 'url', 'label' => __( 'Lien d\'inscription', 'fondation-lona' ) ),
			'gallery'     => $gallery,
			'partners'    => $partners,
		),
		'lona_partner'     => array(
			'url'         => array( 'type' => 'url', 'label' => __( 'Site web du partenaire', 'fondation-lona' ) ),
			'featured'    => array( 'type' => 'checkbox', 'label' => __( 'Afficher sur la page d\'accueil', 'fondation-lona' ) ),
		),
		'lona_testimonial' => array(
			'role'        => array( 'type' => 'text', 'label' => __( 'Fonction ou qualité', 'fondation-lona' ), 'help' => __( 'Ex. : Bénéficiaire, Partenaire, Enseignante…', 'fondation-lona' ) ),
			'program'     => array( 'type' => 'post', 'post_type' => 'lona_program', 'label' => __( 'Programme concerné', 'fondation-lona' ) ),
			'consent'     => array( 'type' => 'checkbox', 'label' => __( 'Autorisation écrite de publication obtenue (nom, photo, propos)', 'fondation-lona' ), 'help' => __( 'Sans cette case, le témoignage n\'est jamais affiché sur le site.', 'fondation-lona' ) ),
			'anonymous'   => array( 'type' => 'checkbox', 'label' => __( 'Masquer le nom et la photo (témoignage anonyme)', 'fondation-lona' ) ),
		),
		'lona_team'        => array(
			'role'        => array( 'type' => 'text', 'label' => __( 'Fonction', 'fondation-lona' ) ),
			'linkedin'    => array( 'type' => 'url', 'label' => __( 'Profil LinkedIn', 'fondation-lona' ) ),
		),
	);
}

/**
 * Enregistrement des métas (API REST incluse).
 */
add_action(
	'init',
	static function () {
		foreach ( lona_meta_schema() as $post_type => $fields ) {
			foreach ( $fields as $key => $field ) {
				$is_list = in_array( $field['type'], array( 'gallery', 'posts' ), true );
				$is_int  = 'post' === $field['type'];
				$is_bool = 'checkbox' === $field['type'];
				register_post_meta(
					$post_type,
					'lona_' . $key,
					array(
						'type'              => $is_list ? 'array' : ( $is_int ? 'integer' : ( $is_bool ? 'boolean' : 'string' ) ),
						'single'            => true,
						'show_in_rest'      => $is_list ? array( 'schema' => array( 'type' => 'array', 'items' => array( 'type' => 'integer' ) ) ) : true,
						'sanitize_callback' => static fn( $value ) => lona_sanitize_meta( $value, $field ),
						'auth_callback'     => static fn( $allowed, $meta_key, $post_id ) => current_user_can( 'edit_post', $post_id ),
						'default'           => $is_list ? array() : ( $is_int ? 0 : ( $is_bool ? false : '' ) ),
					)
				);
			}
		}
	},
	20
);

/**
 * Nettoyage d'une valeur selon le type du champ.
 *
 * @param mixed $value Valeur brute.
 * @param array $field Définition.
 * @return mixed
 */
function lona_sanitize_meta( $value, array $field ) {
	switch ( $field['type'] ) {
		case 'url':
			return esc_url_raw( (string) $value );
		case 'textarea':
			return sanitize_textarea_field( (string) $value );
		case 'date':
			return preg_match( '/^\d{4}-\d{2}-\d{2}$/', (string) $value ) ? (string) $value : '';
		case 'checkbox':
			return (bool) $value;
		case 'post':
			return absint( $value );
		case 'gallery':
		case 'posts':
			if ( is_string( $value ) ) {
				$value = explode( ',', $value );
			}
			return array_values( array_filter( array_map( 'absint', (array) $value ) ) );
		case 'select':
			return array_key_exists( (string) $value, $field['options'] ) ? (string) $value : '';
		default:
			return sanitize_text_field( (string) $value );
	}
}

/**
 * Boîtes de saisie.
 */
add_action(
	'add_meta_boxes',
	static function () {
		foreach ( lona_meta_schema() as $post_type => $fields ) {
			add_meta_box( 'lona-fields', __( 'Informations', 'fondation-lona' ), 'lona_render_meta_box', $post_type, 'normal', 'high', array( 'fields' => $fields ) );
		}
	}
);

/**
 * Rendu des champs.
 *
 * @param WP_Post $post Contenu.
 * @param array   $box  Boîte.
 */
function lona_render_meta_box( WP_Post $post, array $box ): void {
	wp_nonce_field( 'lona_save_meta', 'lona_meta_nonce' );
	echo '<div class="lona-fields">';
	foreach ( $box['args']['fields'] as $key => $field ) {
		$name  = 'lona_meta[' . $key . ']';
		$id    = 'lona-field-' . $key;
		$value = get_post_meta( $post->ID, 'lona_' . $key, true );
		echo '<div class="lona-field lona-field--' . esc_attr( $field['type'] ) . '">';

		if ( 'checkbox' === $field['type'] ) {
			printf(
				'<label for="%1$s"><input type="hidden" name="%2$s" value="0"><input type="checkbox" id="%1$s" name="%2$s" value="1" %3$s> %4$s</label>',
				esc_attr( $id ),
				esc_attr( $name ),
				checked( (bool) $value, true, false ),
				esc_html( $field['label'] )
			);
		} else {
			printf( '<label for="%1$s"><strong>%2$s</strong></label>', esc_attr( $id ), esc_html( $field['label'] ) );
			switch ( $field['type'] ) {
				case 'textarea':
					printf( '<textarea id="%1$s" name="%2$s" rows="4" class="widefat">%3$s</textarea>', esc_attr( $id ), esc_attr( $name ), esc_textarea( (string) $value ) );
					break;
				case 'select':
					printf( '<select id="%1$s" name="%2$s">', esc_attr( $id ), esc_attr( $name ) );
					foreach ( $field['options'] as $opt => $label ) {
						printf( '<option value="%1$s" %2$s>%3$s</option>', esc_attr( $opt ), selected( $value, $opt, false ), esc_html( $label ) );
					}
					echo '</select>';
					break;
				case 'post':
				case 'posts':
					$multiple = 'posts' === $field['type'];
					$selected = array_map( 'intval', (array) $value );
					$choices  = get_posts( array( 'post_type' => $field['post_type'], 'numberposts' => 200, 'orderby' => 'title', 'order' => 'ASC', 'post_status' => array( 'publish', 'draft' ) ) );
					printf( '<select id="%1$s" name="%2$s" %3$s class="widefat">', esc_attr( $id ), esc_attr( $name . ( $multiple ? '[]' : '' ) ), $multiple ? 'multiple size="5"' : '' );
					if ( ! $multiple ) {
						echo '<option value="0">—</option>';
					}
					foreach ( $choices as $choice ) {
						printf( '<option value="%1$d" %2$s>%3$s</option>', (int) $choice->ID, selected( in_array( $choice->ID, $selected, true ), true, false ), esc_html( get_the_title( $choice ) ) );
					}
					echo '</select>';
					if ( ! $choices ) {
						echo '<p class="description">' . esc_html__( 'Aucun élément disponible pour le moment.', 'fondation-lona' ) . '</p>';
					}
					break;
				case 'gallery':
					$ids = array_map( 'intval', (array) $value );
					printf( '<input type="hidden" id="%1$s" name="%2$s" value="%3$s" class="lona-gallery-input">', esc_attr( $id ), esc_attr( $name ), esc_attr( implode( ',', $ids ) ) );
					echo '<ul class="lona-gallery-preview">';
					foreach ( $ids as $img ) {
						echo '<li>' . wp_get_attachment_image( $img, 'thumbnail' ) . '</li>';
					}
					echo '</ul>';
					printf( '<button type="button" class="button lona-gallery-button" data-target="%1$s">%2$s</button>', esc_attr( $id ), esc_html__( 'Gérer la galerie', 'fondation-lona' ) );
					break;
				default:
					$type = in_array( $field['type'], array( 'url', 'date' ), true ) ? $field['type'] : 'text';
					printf( '<input type="%1$s" id="%2$s" name="%3$s" value="%4$s" class="widefat">', esc_attr( $type ), esc_attr( $id ), esc_attr( $name ), esc_attr( (string) $value ) );
			}
		}
		if ( ! empty( $field['help'] ) ) {
			echo '<p class="description">' . esc_html( $field['help'] ) . '</p>';
		}
		echo '</div>';
	}
	echo '</div>';
}

/**
 * Enregistrement sécurisé (nonce + permission + nettoyage).
 */
add_action(
	'save_post',
	static function ( $post_id, $post ) {
		if ( ! isset( $_POST['lona_meta_nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['lona_meta_nonce'] ) ), 'lona_save_meta' ) ) {
			return;
		}
		if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || wp_is_post_revision( $post_id ) || ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
		$schema = lona_meta_schema();
		if ( empty( $schema[ $post->post_type ] ) ) {
			return;
		}
		$input = isset( $_POST['lona_meta'] ) && is_array( $_POST['lona_meta'] ) ? wp_unslash( $_POST['lona_meta'] ) : array(); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput -- nettoyé champ par champ.
		foreach ( $schema[ $post->post_type ] as $key => $field ) {
			$raw = $input[ $key ] ?? ( in_array( $field['type'], array( 'posts', 'gallery' ), true ) ? array() : '' );
			update_post_meta( $post_id, 'lona_' . $key, lona_sanitize_meta( $raw, $field ) );
		}
	},
	10,
	2
);
