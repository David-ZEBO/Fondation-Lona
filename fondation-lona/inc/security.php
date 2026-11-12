<?php
/**
 * Durcissement léger au niveau du thème (sans toucher à wp-config ni au serveur).
 * Chaque mesure peut être désactivée par filtre.
 *
 * @package FondationLona
 */

defined( 'ABSPATH' ) || exit;

// Ne pas exposer la version de WordPress.
remove_action( 'wp_head', 'wp_generator' );
add_filter( 'the_generator', '__return_empty_string' );

// XML-RPC désactivé par défaut (vecteur fréquent d'attaques par force brute).
// Réactiver si nécessaire (ex. Jetpack) : add_filter( 'lona_disable_xmlrpc', '__return_false' );
add_filter( 'xmlrpc_enabled', static fn() => ! apply_filters( 'lona_disable_xmlrpc', true ) );

/**
 * En-têtes de sécurité HTTP pour les pages publiques.
 */
add_action(
	'send_headers',
	static function () {
		if ( headers_sent() || is_admin() ) {
			return;
		}
		header( 'X-Content-Type-Options: nosniff' );
		header( 'Referrer-Policy: strict-origin-when-cross-origin' );
		header( 'X-Frame-Options: SAMEORIGIN' );
		header( 'Permissions-Policy: camera=(), microphone=(), geolocation=(), interest-cohort=()' );
	}
);

/**
 * Empêche l'énumération des comptes : API REST des utilisateurs réservée aux connectés.
 */
add_filter(
	'rest_endpoints',
	static function ( $endpoints ) {
		if ( is_user_logged_in() ) {
			return $endpoints;
		}
		unset( $endpoints['/wp/v2/users'], $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
		return $endpoints;
	}
);

/**
 * Empêche l'énumération via ?author=N et désactive les archives d'auteurs
 * (les contenus sont signés par la Fondation).
 */
add_action(
	'template_redirect',
	static function () {
		if ( is_author() || ( isset( $_GET['author'] ) && ! is_admin() ) ) { // phpcs:ignore WordPress.Security.NonceVerification
			wp_safe_redirect( home_url( '/' ), 301 );
			exit;
		}
	}
);

/**
 * Message de connexion générique (ne révèle pas si l'identifiant existe).
 */
add_filter(
	'login_errors',
	static fn() => __( 'Identifiants incorrects.', 'fondation-lona' )
);

/**
 * Désactive l'édition de fichiers depuis l'administration si non défini dans wp-config.
 */
if ( ! defined( 'DISALLOW_FILE_EDIT' ) ) {
	define( 'DISALLOW_FILE_EDIT', true );
}
