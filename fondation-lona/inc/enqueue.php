<?php
/**
 * Chargement des ressources (CSS/JS) et des polices auto-hébergées.
 *
 * @package FondationLona
 */

defined( 'ABSPATH' ) || exit;

/**
 * Version d'un fichier (date de modification) pour le cache navigateur.
 *
 * @param string $relative Chemin relatif au thème.
 */
function lona_asset_version( string $relative ): string {
	$path = LONA_DIR . '/' . $relative;
	return file_exists( $path ) ? (string) filemtime( $path ) : LONA_VERSION;
}

add_action(
	'wp_enqueue_scripts',
	static function () {
		wp_enqueue_style( 'lona-main', LONA_URI . '/assets/css/main.css', array(), lona_asset_version( 'assets/css/main.css' ) );

		$fonts = lona_font_face_css();
		if ( $fonts ) {
			wp_add_inline_style( 'lona-main', $fonts );
		}

		wp_enqueue_script(
			'lona-front',
			LONA_URI . '/assets/js/front.js',
			array(),
			lona_asset_version( 'assets/js/front.js' ),
			array( 'strategy' => 'defer', 'in_footer' => true )
		);
		wp_localize_script(
			'lona-front',
			'lonaFront',
			array(
				'privacyUrl' => get_privacy_policy_url(),
				'i18n'       => array(
					'cookieText' => __( 'Ce site utilise uniquement des cookies essentiels à son fonctionnement. Les contenus tiers (vidéos, cartes) ne sont chargés qu\'avec votre accord.', 'fondation-lona' ),
					'accept'     => __( 'Accepter', 'fondation-lona' ),
					'refuse'     => __( 'Refuser', 'fondation-lona' ),
					'learnMore'  => __( 'En savoir plus', 'fondation-lona' ),
					'copied'     => __( 'Lien copié', 'fondation-lona' ),
					'cookieLabel'=> __( 'Gestion des cookies', 'fondation-lona' ),
				),
			)
		);
	}
);

/**
 * Polices auto-hébergées (RGPD + performance) : déclarées seulement si les fichiers
 * existent dans assets/fonts (aucune requête vers Google). Sinon, la pile système
 * définie dans theme.json est utilisée.
 */
function lona_font_face_css(): string {
	$faces = array(
		array( 'Manrope', 'manrope-variable.woff2', '200 800', 'normal' ),
		array( 'Inter', 'inter-variable.woff2', '100 900', 'normal' ),
		array( 'Playfair Display', 'playfair-display-variable.woff2', '400 900', 'normal' ),
		array( 'Playfair Display', 'playfair-display-italic-variable.woff2', '400 900', 'italic' ),
	);
	$css = '';
	foreach ( $faces as list( $family, $file, $weight, $style ) ) {
		if ( file_exists( LONA_DIR . '/assets/fonts/' . $file ) ) {
			$css .= sprintf(
				'@font-face{font-family:"%1$s";src:url("%2$s") format("woff2");font-weight:%3$s;font-style:%4$s;font-display:swap;}',
				esc_attr( $family ),
				esc_url( LONA_URI . '/assets/fonts/' . $file ),
				esc_attr( $weight ),
				esc_attr( $style )
			);
		}
	}
	return $css;
}

/**
 * Préchargement de la police des titres si présente.
 */
add_action(
	'wp_head',
	static function () {
		if ( file_exists( LONA_DIR . '/assets/fonts/manrope-variable.woff2' ) ) {
			printf( '<link rel="preload" href="%s" as="font" type="font/woff2" crossorigin>' . "\n", esc_url( LONA_URI . '/assets/fonts/manrope-variable.woff2' ) );
		}
	},
	2
);

/**
 * Polices dans l'éditeur.
 */
add_action(
	'enqueue_block_assets',
	static function () {
		if ( is_admin() ) {
			$fonts = lona_font_face_css();
			if ( $fonts ) {
				wp_register_style( 'lona-editor-fonts', false, array(), LONA_VERSION );
				wp_enqueue_style( 'lona-editor-fonts' );
				wp_add_inline_style( 'lona-editor-fonts', $fonts );
			}
		}
	}
);

/**
 * Ressources de l'administration (sélecteurs de médias des champs personnalisés).
 */
add_action(
	'admin_enqueue_scripts',
	static function ( $hook ) {
		$screen = get_current_screen();
		$is_lona = $screen && ( str_starts_with( (string) $screen->post_type, 'lona_' ) || str_contains( (string) $hook, 'lona' ) );
		if ( ! $is_lona ) {
			return;
		}
		wp_enqueue_media();
		wp_enqueue_style( 'lona-admin', LONA_URI . '/assets/css/admin.css', array(), lona_asset_version( 'assets/css/admin.css' ) );
		wp_enqueue_script( 'lona-admin', LONA_URI . '/assets/js/admin.js', array( 'jquery' ), lona_asset_version( 'assets/js/admin.js' ), true );
		wp_localize_script(
			'lona-admin',
			'lonaAdmin',
			array(
				'choose'   => __( 'Choisir des images', 'fondation-lona' ),
				'chooseOne'=> __( 'Choisir une image', 'fondation-lona' ),
				'use'      => __( 'Utiliser', 'fondation-lona' ),
			)
		);
	}
);
