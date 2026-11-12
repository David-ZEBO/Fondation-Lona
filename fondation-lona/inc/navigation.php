<?php
/**
 * En-tête et méga-menu de la Fondation.
 *
 * Structure administrable dans Apparence › Menus :
 *  - emplacement « Menu principal » : niveau 1 = rubriques ; niveau 2 = titres de
 *    colonnes (ou liens directs) ; niveau 3 = liens. La « Description » de chaque
 *    élément (Options de l'écran › Description) s'affiche sous le lien.
 *  - emplacement « Barre utilitaire » : petits liens au-dessus de l'en-tête.
 * Sans menu assigné, une structure par défaut est utilisée.
 *
 * @package FondationLona
 */

defined( 'ABSPATH' ) || exit;

add_action(
	'after_setup_theme',
	static function () {
		register_nav_menus(
			array(
				'primary' => __( 'Menu principal (méga-menu)', 'fondation-lona' ),
				'utility' => __( 'Barre utilitaire (haut de page)', 'fondation-lona' ),
			)
		);
	}
);

/**
 * Structure par défaut du menu principal.
 *
 * @return array<int,array>
 */
function lona_default_menu(): array {
	$u = static fn( string $path ): string => home_url( $path );
	return array(
		array(
			'title'    => __( 'La Fondation', 'fondation-lona' ),
			'url'      => $u( '/a-propos/' ),
			'icon'     => 'star',
			'children' => array(
				array(
					'title'    => __( 'Découvrir la Fondation', 'fondation-lona' ),
					'children' => array(
						array( 'title' => __( 'À propos', 'fondation-lona' ), 'url' => $u( '/a-propos/' ), 'desc' => __( 'Notre histoire, nos axes d\'intervention.', 'fondation-lona' ) ),
						array( 'title' => __( 'La Présidente', 'fondation-lona' ), 'url' => $u( '/a-propos/la-presidente/' ), 'desc' => __( 'Denise Nyakeru Tshisekedi, Première Dame de la RDC.', 'fondation-lona' ) ),
						array( 'title' => __( 'Vision et mission', 'fondation-lona' ), 'url' => $u( '/a-propos/vision-et-mission/' ), 'desc' => __( 'Une société congolaise dynamique.', 'fondation-lona' ) ),
						array( 'title' => __( 'Gouvernance et équipe', 'fondation-lona' ), 'url' => $u( '/a-propos/gouvernance-et-equipe/' ), 'desc' => __( 'Celles et ceux qui portent la mission.', 'fondation-lona' ) ),
					),
				),
				array(
					'title'    => __( 'Agir avec nous', 'fondation-lona' ),
					'children' => array(
						array( 'title' => __( 'Nos partenaires', 'fondation-lona' ), 'url' => $u( '/nos-partenaires/' ), 'desc' => __( 'Ils nous font confiance.', 'fondation-lona' ) ),
						array( 'title' => __( 'Devenir partenaire', 'fondation-lona' ), 'url' => $u( '/devenir-partenaire/' ), 'desc' => __( 'Construisons ensemble des projets à fort impact.', 'fondation-lona' ) ),
						array( 'title' => __( 'Devenir bénévole', 'fondation-lona' ), 'url' => $u( '/devenir-benevole/' ), 'desc' => __( 'Offrez votre temps et vos compétences.', 'fondation-lona' ) ),
					),
				),
			),
		),
		array(
			'title'    => __( 'Nos actions', 'fondation-lona' ),
			'url'      => $u( '/nos-actions/' ),
			'icon'     => 'heart',
			'children' => array(
				array(
					'title'    => __( 'Domaines d\'intervention', 'fondation-lona' ),
					'children' => array(
						array( 'title' => __( 'Éducation et excellence', 'fondation-lona' ), 'url' => $u( '/nos-actions/education/' ), 'desc' => __( 'Bourses, tests de sélection, réussite.', 'fondation-lona' ) ),
						array( 'title' => __( 'Santé et bien-être', 'fondation-lona' ), 'url' => $u( '/nos-actions/sante/' ), 'desc' => __( 'Accès aux soins, lutte contre le cancer.', 'fondation-lona' ) ),
						array( 'title' => __( 'Lutte contre les VBG', 'fondation-lona' ), 'url' => $u( '/nos-actions/lutte-contre-les-vbg/' ), 'desc' => __( 'Prévenir, sensibiliser, orienter.', 'fondation-lona' ) ),
					),
				),
				array(
					'title'    => ' ',
					'children' => array(
						array( 'title' => __( 'Autonomisation des femmes', 'fondation-lona' ), 'url' => $u( '/nos-actions/autonomisation-des-femmes/' ), 'desc' => __( 'Former, équiper, rendre autonome.', 'fondation-lona' ) ),
						array( 'title' => __( 'Inclusion sociale', 'fondation-lona' ), 'url' => $u( '/nos-actions/inclusion-sociale/' ), 'desc' => __( 'Personnes vulnérables, solidarité.', 'fondation-lona' ) ),
						array( 'title' => __( 'Nos réalisations', 'fondation-lona' ), 'url' => $u( '/realisations/' ), 'desc' => __( 'Nos actions sur le terrain et leurs résultats.', 'fondation-lona' ) ),
					),
				),
			),
		),
		array(
			'title'    => __( 'Programmes', 'fondation-lona' ),
			'url'      => $u( '/programmes/' ),
			'icon'     => 'cap',
			'children' => array(
				array(
					'title'    => __( 'Nos programmes', 'fondation-lona' ),
					'children' => array(
						array( 'title' => 'EXCELLENTIA RDC', 'url' => $u( '/programmes/excellentia-rdc/' ), 'desc' => __( 'Le programme national de bourses.', 'fondation-lona' ) ),
						array( 'title' => 'FOCUS CANCER', 'url' => $u( '/programmes/focus-cancer/' ), 'desc' => __( 'L\'accès aux soins spécialisés.', 'fondation-lona' ) ),
					),
				),
				array(
					'title'    => ' ',
					'children' => array(
						array( 'title' => __( 'Programmes d\'autonomisation', 'fondation-lona' ), 'url' => $u( '/programmes/programmes-autonomisation/' ), 'desc' => __( 'Formation professionnelle et kits.', 'fondation-lona' ) ),
						array( 'title' => __( 'Tous les programmes', 'fondation-lona' ), 'url' => $u( '/programmes/' ), 'desc' => __( 'Découvrir l\'ensemble de nos programmes.', 'fondation-lona' ) ),
					),
				),
			),
		),
		array(
			'title' => __( 'Actualités', 'fondation-lona' ),
			'url'   => $u( '/actualites/' ),
			'icon'  => 'news',
		),
	);
}

/**
 * Liens par défaut de la barre utilitaire.
 *
 * @return array<int,array>
 */
function lona_default_utility_menu(): array {
	return array(
		array( 'title' => __( 'Événements', 'fondation-lona' ), 'url' => home_url( '/evenements/' ) ),
		array( 'title' => __( 'Contact', 'fondation-lona' ), 'url' => home_url( '/contact/' ) ),
	);
}

/**
 * Arbre d'un menu WordPress (ou structure par défaut).
 *
 * @param string $location Emplacement.
 * @return array<int,array>
 */
function lona_menu_tree( string $location ): array {
	$locations = get_nav_menu_locations();
	if ( empty( $locations[ $location ] ) ) {
		return 'utility' === $location ? lona_default_utility_menu() : lona_default_menu();
	}
	$items = wp_get_nav_menu_items( $locations[ $location ] );
	if ( ! $items ) {
		return 'utility' === $location ? lona_default_utility_menu() : lona_default_menu();
	}
	$by_parent = array();
	foreach ( $items as $item ) {
		$by_parent[ (int) $item->menu_item_parent ][] = $item;
	}
	$build = static function ( int $parent ) use ( &$build, $by_parent ): array {
		$out = array();
		foreach ( $by_parent[ $parent ] ?? array() as $item ) {
			$icon = '';
			foreach ( (array) $item->classes as $class ) {
				if ( str_starts_with( (string) $class, 'icon-' ) ) {
					$icon = substr( $class, 5 );
				}
			}
			$out[] = array(
				'title'    => $item->title,
				'url'      => $item->url,
				'desc'     => $item->description,
				'icon'     => $icon,
				'children' => $build( (int) $item->ID ),
			);
		}
		return $out;
	};
	return $build( 0 );
}

/**
 * Lien de menu actif ?
 *
 * @param string $url URL.
 */
function lona_menu_is_current( string $url ): bool {
	$current = trailingslashit( strtok( home_url( add_query_arg( array() ) ), '?' ) );
	return $url && trailingslashit( $url ) === $current;
}

/**
 * Colonnes d'un panneau : normalise niveau 2 (titres) / niveau 3 (liens).
 *
 * @param array $children Enfants de la rubrique.
 * @return array<int,array{title:string,links:array}>
 */
function lona_menu_columns( array $children ): array {
	$columns = array();
	$loose   = array();
	foreach ( $children as $child ) {
		if ( ! empty( $child['children'] ) ) {
			$columns[] = array( 'title' => trim( (string) $child['title'] ), 'links' => $child['children'] );
		} else {
			$loose[] = $child;
		}
	}
	if ( $loose ) {
		array_unshift( $columns, array( 'title' => '', 'links' => $loose ) );
	}
	return $columns;
}
