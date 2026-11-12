<?php
/**
 * Fonctions utilitaires partagées.
 *
 * @package FondationLona
 */

defined( 'ABSPATH' ) || exit;

/**
 * Lit une valeur des réglages de la Fondation (Fondation LONA > Réglages).
 *
 * @param string $key     Clé du réglage.
 * @param mixed  $default Valeur par défaut.
 * @return mixed
 */
function lona_opt( string $key, $default = '' ) {
	$options = get_option( 'lona_settings', array() );
	if ( is_array( $options ) && isset( $options[ $key ] ) && '' !== $options[ $key ] ) {
		return $options[ $key ];
	}
	return $default;
}

/**
 * Domaines d'intervention officiels (slug => libellé).
 *
 * @return array<string,string>
 */
function lona_domains(): array {
	return array(
		'education'    => __( 'Éducation et excellence', 'fondation-lona' ),
		'sante'        => __( 'Santé et bien-être', 'fondation-lona' ),
		'vbg'          => __( 'Lutte contre les VBG', 'fondation-lona' ),
		'autonomisation' => __( 'Autonomisation des femmes', 'fondation-lona' ),
		'inclusion'    => __( 'Inclusion et solidarité', 'fondation-lona' ),
	);
}

/**
 * URL de l'image provisoire (clairement identifiée comme telle).
 */
function lona_placeholder_url(): string {
	return LONA_URI . '/assets/images/placeholder.svg';
}

/**
 * Photo officielle associée à chaque domaine d'intervention.
 *
 * @return array<string,array{0:string,1:string}> slug => [fichier, texte alternatif]
 */
function lona_domain_photos(): array {
	return array(
		'education'      => array( 'test-ecriture', __( 'Une candidate concentrée pendant un test de sélection EXCELLENTIA', 'fondation-lona' ) ),
		'sante'          => array( 'focus-cancer-visuel', __( 'Visuel du programme FOCUS CANCER de la Fondation LONA', 'fondation-lona' ) ),
		'vbg'            => array( 'presidente-femmes-isam', __( 'La Présidente de la Fondation LONA aux côtés de femmes, lors d\'une visite à l\'ISAM', 'fondation-lona' ) ),
		'autonomisation' => array( 'ceremonie-pvh-mbuji-mayi', __( 'Cérémonie de remise des prix de la formation professionnelle du programme PVH, à Mbuji-Mayi', 'fondation-lona' ) ),
		'inclusion'      => array( 'solidarite-refugies-burundi', __( 'Des enfants congolais accueillis au Burundi, soutenus par la Fondation LONA', 'fondation-lona' ) ),
	);
}

/**
 * Photo officielle de la Fondation (assets/images/fondation/<nom>.jpg),
 * issue de ses publications LinkedIn.
 *
 * @param string $name Nom du fichier sans extension.
 */
function lona_fondation_photo_url( string $name ): string {
	return get_theme_file_uri( 'assets/images/fondation/' . sanitize_file_name( $name ) . '.jpg' );
}

/**
 * Chemin relatif d'une image du thème, quelle que soit son extension (webp, jpg, png).
 *
 * @param string $name Chemin sans extension, relatif à assets/images (ex. « fondation/salle-de-test »).
 */
function lona_theme_image_path( string $name ): string {
	foreach ( array( 'webp', 'jpg', 'png' ) as $ext ) {
		$relative = 'assets/images/' . $name . '.' . $ext;
		if ( is_readable( LONA_DIR . '/' . $relative ) ) {
			return $relative;
		}
	}
	return '';
}

/**
 * Logo officiel embarqué dans le thème (utilisé tant qu'aucun logo n'est défini).
 */
function lona_logo_url(): string {
	return get_theme_file_uri( 'assets/images/logo-fondation-lona.png' );
}

/**
 * Image d'un contenu avec repli sur l'image provisoire.
 *
 * @param int    $post_id Identifiant du contenu.
 * @param string $size    Taille d'image.
 * @param array  $attr    Attributs HTML supplémentaires.
 */
function lona_post_image( int $post_id, string $size = 'lona-card', array $attr = array() ): string {
	$attr = array_merge( array( 'loading' => 'lazy', 'decoding' => 'async' ), $attr );
	if ( has_post_thumbnail( $post_id ) ) {
		return get_the_post_thumbnail( $post_id, $size, $attr );
	}
	return sprintf(
		'<img src="%1$s" alt="%2$s" class="lona-placeholder %3$s" loading="lazy" decoding="async" width="800" height="600" />',
		esc_url( lona_placeholder_url() ),
		esc_attr__( 'Photographie officielle à intégrer', 'fondation-lona' ),
		esc_attr( $attr['class'] ?? '' )
	);
}

/**
 * Lit une méta personnalisée d'un contenu.
 *
 * @param int    $post_id Identifiant.
 * @param string $key     Clé sans le préfixe « _lona_ ».
 * @return mixed
 */
function lona_meta( int $post_id, string $key ) {
	return get_post_meta( $post_id, 'lona_' . $key, true );
}

/**
 * Formate une date (Y-m-d) dans la langue du site.
 *
 * @param string $date   Date au format Y-m-d.
 * @param string $format Format de sortie.
 */
function lona_format_date( string $date, string $format = '' ): string {
	if ( '' === $date ) {
		return '';
	}
	$timestamp = strtotime( $date );
	return $timestamp ? date_i18n( $format ? $format : get_option( 'date_format' ), $timestamp ) : '';
}

/**
 * Icônes SVG en ligne (décoratives, aria-hidden).
 *
 * @param string $name Nom de l'icône.
 */
function lona_icon( string $name ): string {
	$paths = array(
		'star'      => '<path d="M12 1.5c.6 5.6 4.9 9.9 10.5 10.5-5.6.6-9.9 4.9-10.5 10.5C11.4 16.9 7.1 12.6 1.5 12 7.1 11.4 11.4 7.1 12 1.5Z" fill="currentColor"/>',
		'arrow'     => '<path d="M5 12h14m-6-6 6 6-6 6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>',
		'pin'       => '<path d="M12 21s-7-6.2-7-11.5a7 7 0 0 1 14 0C19 14.8 12 21 12 21Z" fill="none" stroke="currentColor" stroke-width="1.8"/><circle cx="12" cy="9.5" r="2.5" fill="none" stroke="currentColor" stroke-width="1.8"/>',
		'calendar'  => '<rect x="3.5" y="5" width="17" height="15.5" rx="2" fill="none" stroke="currentColor" stroke-width="1.8"/><path d="M3.5 10h17M8 3v4m8-4v4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>',
		'phone'     => '<path d="M6.6 3.5h2.6l1.4 4.2-2 1.4a12 12 0 0 0 6.3 6.3l1.4-2 4.2 1.4v2.6a2 2 0 0 1-2.2 2A16.6 16.6 0 0 1 4.6 5.7a2 2 0 0 1 2-2.2Z" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>',
		'mail'      => '<rect x="3" y="5" width="18" height="14" rx="2" fill="none" stroke="currentColor" stroke-width="1.8"/><path d="m3.5 6.5 8.5 6.5 8.5-6.5" fill="none" stroke="currentColor" stroke-width="1.8"/>',
		'clock'     => '<circle cx="12" cy="12" r="8.5" fill="none" stroke="currentColor" stroke-width="1.8"/><path d="M12 7.5V12l3 2" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>',
		'link'      => '<path d="M10 14a4.5 4.5 0 0 0 6.4 0l3-3a4.5 4.5 0 0 0-6.4-6.4l-1 1M14 10a4.5 4.5 0 0 0-6.4 0l-3 3a4.5 4.5 0 0 0 6.4 6.4l1-1" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>',
		'linkedin'  => '<path d="M4.98 3.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3 9.5h4V21H3V9.5Zm6.5 0h3.8v1.6h.1c.5-1 1.8-2 3.8-2 4 0 4.8 2.6 4.8 6V21h-4v-5.1c0-1.2 0-2.8-1.7-2.8s-2 1.3-2 2.7V21h-4V9.5Z" fill="currentColor"/>',
		'facebook'  => '<path d="M13.5 21v-7.5h2.6l.4-3h-3V8.6c0-.9.3-1.5 1.5-1.5h1.6V4.4a21 21 0 0 0-2.4-.1c-2.4 0-4 1.4-4 4.1v2.1H7.6v3h2.6V21h3.3Z" fill="currentColor"/>',
		'x'         => '<path d="M17.8 3h3.1l-6.8 7.8L22 21h-6.2l-4.9-6.4L5.3 21H2.2l7.3-8.3L1.9 3h6.4l4.4 5.8L17.8 3Zm-1.1 16.2h1.7L7.4 4.7H5.6l11.1 14.5Z" fill="currentColor"/>',
		'whatsapp'  => '<path d="M12 3a9 9 0 0 0-7.8 13.5L3 21l4.6-1.2A9 9 0 1 0 12 3Zm0 16.4a7.4 7.4 0 0 1-3.8-1l-.3-.2-2.7.7.7-2.6-.2-.3A7.4 7.4 0 1 1 12 19.4Zm4.1-5.5c-.2-.1-1.3-.7-1.6-.7-.2-.1-.4-.1-.5.1l-.7.9c-.1.2-.3.2-.5.1a6 6 0 0 1-3-2.6c-.2-.4.2-.4.6-1.2.1-.1 0-.3 0-.4l-.7-1.7c-.2-.4-.4-.4-.5-.4h-.5a.9.9 0 0 0-.6.3 2.7 2.7 0 0 0-.9 2c0 1.2.9 2.4 1 2.5.1.2 1.7 2.7 4.2 3.7 1.6.7 2.2.7 3 .6.5-.1 1.3-.6 1.5-1.1.2-.6.2-1 .1-1.1l-.4-.3Z" fill="currentColor"/>',
		'instagram' => '<rect x="3.5" y="3.5" width="17" height="17" rx="5" fill="none" stroke="currentColor" stroke-width="1.8"/><circle cx="12" cy="12" r="4" fill="none" stroke="currentColor" stroke-width="1.8"/><circle cx="17.3" cy="6.7" r="1.1" fill="currentColor"/>',
		'youtube'   => '<path d="M21.6 7.2a2.5 2.5 0 0 0-1.8-1.8C18.2 5 12 5 12 5s-6.2 0-7.8.4A2.5 2.5 0 0 0 2.4 7.2 26 26 0 0 0 2 12a26 26 0 0 0 .4 4.8 2.5 2.5 0 0 0 1.8 1.8C5.8 19 12 19 12 19s6.2 0 7.8-.4a2.5 2.5 0 0 0 1.8-1.8A26 26 0 0 0 22 12a26 26 0 0 0-.4-4.8ZM10 15V9l5.2 3L10 15Z" fill="currentColor"/>',
		'heart'     => '<path d="M12 20.5s-7.5-4.6-7.5-10.2A4.3 4.3 0 0 1 12 7.6a4.3 4.3 0 0 1 7.5 2.7c0 5.6-7.5 10.2-7.5 10.2Z" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linejoin="round"/>',
		'cap'       => '<path d="m2.5 9 9.5-4.5L21.5 9 12 13.5 2.5 9Z" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M6.5 11v4.5c0 1.4 2.5 3 5.5 3s5.5-1.6 5.5-3V11M21.5 9v5" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>',
		'news'      => '<rect x="3.5" y="4.5" width="17" height="15" rx="2" fill="none" stroke="currentColor" stroke-width="1.8"/><path d="M7 9h10M7 12.5h10M7 16h6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>',
		'quote'     => '<path d="M9.5 6C6 7.3 4 10 4 13.6V18h6v-6H7c0-2 1.2-3.6 3.2-4.4L9.5 6Zm10 0C16 7.3 14 10 14 13.6V18h6v-6h-3c0-2 1.2-3.6 3.2-4.4L19.5 6Z" fill="currentColor"/>',
	);
	if ( ! isset( $paths[ $name ] ) ) {
		return '';
	}
	return '<svg class="lona-icon lona-icon--' . esc_attr( $name ) . '" width="20" height="20" viewBox="0 0 24 24" aria-hidden="true" focusable="false">' . $paths[ $name ] . '</svg>';
}

/**
 * Réseaux sociaux configurés (réglages), LinkedIn officiel par défaut.
 *
 * @return array<string,array{label:string,url:string}>
 */
function lona_social_links(): array {
	$networks = array(
		'linkedin'  => array( 'LinkedIn', 'https://www.linkedin.com/company/fondationlona/' ),
		'facebook'  => array( 'Facebook', '' ),
		'instagram' => array( 'Instagram', '' ),
		'x'         => array( 'X', '' ),
		'youtube'   => array( 'YouTube', '' ),
	);
	$out = array();
	foreach ( $networks as $key => list( $label, $default ) ) {
		$url = lona_opt( 'social_' . $key, $default );
		if ( $url ) {
			$out[ $key ] = array( 'label' => $label, 'url' => $url );
		}
	}
	return $out;
}

/**
 * Message affiché uniquement aux éditeurs lorsqu'un bloc n'a pas encore de contenu.
 *
 * @param string $message Message d'aide.
 */
function lona_editor_notice( string $message ): string {
	if ( ! current_user_can( 'edit_posts' ) ) {
		return '';
	}
	return '<p class="lona-editor-notice" role="note">' . esc_html( $message ) . '</p>';
}
