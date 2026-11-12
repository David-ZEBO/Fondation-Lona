<?php
/**
 * Fondation LONA — point d'entrée du thème.
 *
 * Chaque responsabilité est isolée dans /inc. Pour ajouter plus tard un espace
 * partenaire ou membre, créer un nouveau module dans /inc et l'ajouter via le
 * filtre `lona_modules` (aucune reconstruction du thème nécessaire).
 *
 * @package FondationLona
 */

defined( 'ABSPATH' ) || exit;

define( 'LONA_VERSION', '1.0.0' );
define( 'LONA_DIR', get_template_directory() );
define( 'LONA_URI', get_template_directory_uri() );

$lona_modules = apply_filters(
	'lona_modules',
	array(
		'helpers',
		'setup',
		'enqueue',
		'custom-taxonomies',
		'custom-post-types',
		'meta-fields',
		'settings',
		'blocks',
		'navigation',
		'forms',
		'seo',
		'security',
		'starter-articles',
		'official-content',
		'starter-content',
	)
);

foreach ( $lona_modules as $lona_module ) {
	$lona_file = LONA_DIR . '/inc/' . sanitize_file_name( $lona_module ) . '.php';
	if ( is_readable( $lona_file ) ) {
		require_once $lona_file;
	}
}
unset( $lona_modules, $lona_module, $lona_file );

do_action( 'lona_loaded' );
