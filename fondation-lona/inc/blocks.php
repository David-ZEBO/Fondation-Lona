<?php
/**
 * Blocs Gutenberg dynamiques de la Fondation (rendu serveur, sans étape de build).
 *
 * Chaque bloc vit dans /blocks/<nom>/ (block.json + render.php). L'éditeur utilise
 * un script unique (assets/js/blocks-editor.js) avec un aperçu ServerSideRender.
 *
 * @package FondationLona
 */

defined( 'ABSPATH' ) || exit;

add_action(
	'init',
	static function () {
		wp_register_script(
			'lona-blocks-editor',
			LONA_URI . '/assets/js/blocks-editor.js',
			array( 'wp-blocks', 'wp-element', 'wp-components', 'wp-block-editor', 'wp-server-side-render', 'wp-i18n' ),
			lona_asset_version( 'assets/js/blocks-editor.js' ),
			true
		);
		wp_localize_script(
			'lona-blocks-editor',
			'lonaBlocks',
			array(
				'domains' => lona_domains(),
			)
		);

		foreach ( glob( LONA_DIR . '/blocks/*/block.json' ) as $metadata ) {
			register_block_type( dirname( $metadata ) );
		}
	}
);

/**
 * Catégorie d'inserteur dédiée.
 */
add_filter(
	'block_categories_all',
	static function ( $categories ) {
		array_unshift( $categories, array( 'slug' => 'lona', 'title' => __( 'Fondation LONA', 'fondation-lona' ), 'icon' => 'star-filled' ) );
		return $categories;
	}
);

/**
 * Requête de contenus pour les blocs, filtrable par domaine.
 *
 * @param string $post_type Type de contenu.
 * @param int    $count     Nombre.
 * @param string $domain    Slug du domaine (optionnel).
 * @param array  $extra     Arguments supplémentaires.
 * @return WP_Post[]
 */
function lona_query( string $post_type, int $count, string $domain = '', array $extra = array() ): array {
	$args = array_merge(
		array(
			'post_type'           => $post_type,
			'posts_per_page'      => max( 1, min( 24, $count ) ),
			'post_status'         => 'publish',
			'no_found_rows'       => true,
			'ignore_sticky_posts' => true,
		),
		$extra
	);
	if ( $domain ) {
		$args['tax_query'] = array( array( 'taxonomy' => 'lona_domain', 'field' => 'slug', 'terms' => sanitize_title( $domain ) ) ); // phpcs:ignore WordPress.DB.SlowDBQuery
	}
	return get_posts( $args );
}

/**
 * Premier domaine d'un contenu (libellé).
 *
 * @param int $post_id Identifiant.
 */
function lona_post_domain_label( int $post_id ): string {
	$terms = get_the_terms( $post_id, 'lona_domain' );
	return ( $terms && ! is_wp_error( $terms ) ) ? $terms[0]->name : '';
}
