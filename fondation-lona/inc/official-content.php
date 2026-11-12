<?php
/**
 * Contenus officiels de la Fondation LONA, repris de ses publications publiques
 * (page LinkedIn officielle, consultée en novembre 2026).
 *
 * Utilisés par l'assistant d'installation : programmes, réalisations, partenaire,
 * événement, coordonnées et chiffres d'impact. Rien n'est écrasé : chaque élément
 * n'est créé que s'il n'existe pas déjà.
 *
 * @package FondationLona
 */

defined( 'ABSPATH' ) || exit;

/**
 * Source officielle des informations.
 */
function lona_official_source_url(): string {
	return 'https://www.linkedin.com/company/fondationlona/';
}

/**
 * Mention de source à placer en fin de contenu.
 */
function lona_b_source(): string {
	return lona_b_p( esc_html__( 'Source : publications officielles de la Fondation LONA sur', 'fondation-lona' ) . ' ' . lona_b_link( 'LinkedIn', lona_official_source_url() ) . '.', 'lona-source' );
}

/**
 * Mission officielle (texte de présentation de la Fondation).
 */
function lona_official_mission(): string {
	return __( 'Contribuer à une société congolaise dynamique où la femme sera libre, forte, valorisée et apportera du progrès et un regard innovant autour des valeurs de travail, d\'éthique, de patience ainsi que de persévérance.', 'fondation-lona' );
}

/**
 * Programmes officiels.
 *
 * @return array<string,array>
 */
function lona_official_programs(): array {
	return array(
		'excellentia-rdc'           => array(
			'title'   => 'EXCELLENTIA RDC',
			'domain'  => array( 'education' ),
			'tagline' => __( 'Le programme national de bourses dédié à l\'excellence académique de la jeunesse congolaise.', 'fondation-lona' ),
			'photo'   => array( 'fondation/ceremonie-excellentia', __( 'Les lauréats EXCELLENTIA en toge autour de la Présidente de la Fondation lors de la cérémonie de remise des prix', 'fondation-lona' ) ),
			'meta'    => array(
				'status'   => 'active',
				'location' => __( 'République démocratique du Congo', 'fondation-lona' ),
				'results'  => __( "Plus de 278 lauréats dans les universités congolaises et 113 à l'étranger (66 en France, 42 au Maroc, 5 aux États-Unis), en août 2025\n6e édition : 79 nouveaux lauréats récompensés le 14 août 2025\nEXCELLENTIA Spécial ISAM : 95 candidats au test de sélection du 2 septembre 2026 à Mbuji-Mayi, 15 lauréats retenus\nDans les programmes EXCELLENTIA RDC, Lualaba Bora et Haut-Katanga Wantashi, les jeunes filles occupent les premières places", 'fondation-lona' ),
				'verified' => true,
			),
			'content' =>
				lona_b_p( esc_html__( 'EXCELLENTIA RDC est un programme national de bourses d\'études qui révèle et accompagne les talents de la jeunesse congolaise. Né à l\'initiative de la Présidente de la Fondation, Denise Nyakeru Tshisekedi, il est devenu un programme officiel de l\'État ; la Fondation LONA en est l\'organe technique, chargé de son organisation.', 'fondation-lona' ), 'is-style-lead' )
				. lona_b_p( esc_html__( 'Les candidats doivent obtenir au moins 85 % à l\'Examen d\'État, puis au moins 70 % au test de sélection de la Fondation.', 'fondation-lona' ) )
				. lona_b_h2( __( 'Un parcours de sélection exigeant', 'fondation-lona' ) )
				. lona_b_p( esc_html__( 'Chaque édition s\'organise en plusieurs étapes : une journée d\'information pour permettre aux candidats de s\'informer et de comprendre les démarches, puis un test de sélection. L\'édition 2026 du test s\'est tenue le dimanche 18 octobre 2026 à l\'Université Pédagogique Nationale, à Kinshasa.', 'fondation-lona' ) )
				. lona_b_p( esc_html__( 'De la préparation à la logistique, en passant par l\'administration et la communication, les équipes de la Fondation se mobilisent à chaque étape du processus.', 'fondation-lona' ) )
				. lona_b_h2( __( 'Les déclinaisons du programme', 'fondation-lona' ) )
				. lona_b_list(
					array(
						'<strong>EXCELLENTIA Lualaba Bora</strong>',
						'<strong>EXCELLENTIA Haut-Katanga Wantashi</strong>',
						'<strong>EXCELLENTIA Spécial ISAM</strong> — ' . esc_html__( 'processus d\'attribution de 100 bourses d\'études aux étudiants de l\'Institut Supérieur des Arts et Métiers de Mbuji-Mayi, dans les filières Coupe et Couture et Modélisme.', 'fondation-lona' ),
					)
				)
				. lona_b_h2( __( 'Les jeunes filles à l\'honneur', 'fondation-lona' ) )
				. lona_b_p( esc_html__( 'Dans les programmes EXCELLENTIA, les jeunes filles brillent et occupent les premières places. Leur réussite rappelle que, lorsqu\'elles ont accès à l\'éducation et aux mêmes opportunités, elles peuvent accomplir de grandes choses.', 'fondation-lona' ) )
				. lona_b_source(),
		),
		'focus-cancer'              => array(
			'title'   => 'FOCUS CANCER',
			'domain'  => array( 'sante' ),
			'tagline' => __( 'Faciliter l\'accès aux soins spécialisés des personnes atteintes d\'un cancer.', 'fondation-lona' ),
			'photo'   => array( 'fondation/focus-cancer-visuel', __( 'Visuel FOCUS CANCER : 53 prises en charge pour un cancer du sein, 102 personnes prises en charge depuis 2023', 'fondation-lona' ) ),
			'meta'    => array(
				'status'   => 'active',
				'location' => __( 'Aga Khan University Hospital, Nairobi (Kenya)', 'fondation-lona' ),
				'results'  => __( "102 personnes ont bénéficié d'une prise en charge médicale depuis 2023, dont 53 accompagnées pour un cancer du sein\nEn 2026, plus d'une vingtaine de femmes ont déjà bénéficié du programme\nEn octobre 2026, 6 bénéficiaires atteintes d'un cancer du sein étaient en cours de traitement", 'fondation-lona' ),
				'verified' => true,
			),
			'content' =>
				lona_b_p( esc_html__( 'Face au cancer, le coût des traitements et l\'accès aux soins spécialisés peuvent peser lourdement sur les personnes malades et leurs familles. Avec FOCUS CANCER, la Fondation LONA agit pour alléger ces difficultés.', 'fondation-lona' ), 'is-style-lead' )
				. lona_b_h2( __( 'Une prise en charge complète', 'fondation-lona' ) )
				. lona_b_p( esc_html__( 'Mis en place en partenariat avec ZED SUPPLY, FOCUS CANCER permet aux bénéficiaires d\'accéder aux soins spécialisés de l\'Aga Khan University Hospital, à Nairobi, au Kenya. La Fondation prend en charge :', 'fondation-lona' ) )
				. lona_b_list(
					array(
						esc_html__( 'les frais médicaux ;', 'fondation-lona' ),
						esc_html__( 'le voyage ;', 'fondation-lona' ),
						esc_html__( 'l\'hébergement et la restauration ;', 'fondation-lona' ),
						esc_html__( 'les déplacements vers l\'hôpital.', 'fondation-lona' ),
					)
				)
				. lona_b_h2( __( 'Les cancers accompagnés', 'fondation-lona' ) )
				. lona_b_p( esc_html__( 'Le programme accompagne principalement des femmes atteintes d\'un cancer du sein, ainsi que des personnes touchées par les cancers de l\'utérus, du côlon et du rectum, du sang, de la thyroïde, de la vessie et de la peau.', 'fondation-lona' ) )
				. lona_b_p( esc_html__( 'Notre engagement se poursuit toute l\'année : faciliter l\'accès aux soins et rester aux côtés des personnes accompagnées tout au long de leur parcours.', 'fondation-lona' ) )
				. lona_b_source(),
		),
		'programmes-autonomisation' => array(
			'title'   => __( 'Programmes d\'autonomisation', 'fondation-lona' ),
			'domain'  => array( 'autonomisation', 'inclusion' ),
			'tagline' => __( 'Former, équiper et donner à chacun les moyens de construire son autonomie.', 'fondation-lona' ),
			'photo'   => array( 'fondation/ceremonie-pvh-mbuji-mayi', __( 'Cérémonie de remise des prix de la formation professionnelle du programme PVH, à Mbuji-Mayi', 'fondation-lona' ) ),
			'meta'    => array(
				'status'   => 'active',
				'location' => 'Mbuji-Mayi',
				'results'  => __( "Programme de 500 bourses de formation professionnelle pour les personnes vivant avec un handicap, lancé en 2023 au sein de l'INPP\n80 personnes vivant avec un handicap formées à un métier et équipées de kits d'autonomisation à Mbuji-Mayi", 'fondation-lona' ),
				'verified' => true,
			),
			'content' =>
				lona_b_p( esc_html__( 'Former, équiper et donner à chacun les moyens de construire son autonomie : c\'est la vision portée par la Présidente de la Fondation LONA à travers ses programmes d\'autonomisation.', 'fondation-lona' ), 'is-style-lead' )
				. lona_b_h2( __( '500 bourses de formation professionnelle', 'fondation-lona' ) )
				. lona_b_p( esc_html__( 'Depuis 2023, la Fondation porte un programme structuré de 500 bourses de formation professionnelle pour les personnes vivant avec un handicap, avec des partenaires institutionnels et techniques, au sein de l\'INPP et dans plusieurs métiers porteurs.', 'fondation-lona' ) )
				. lona_b_h2( __( 'De la formation à l\'autonomie', 'fondation-lona' ) )
				. lona_b_p( esc_html__( 'À Mbuji-Mayi, 80 personnes vivant avec un handicap ont achevé une formation professionnelle. Lors d\'une cérémonie de remise des kits d\'autonomisation, en présence des partenaires et des familles, la Présidente de la Fondation a célébré leur parcours, leur courage et leurs efforts.', 'fondation-lona' ) )
				. lona_b_p( esc_html__( 'Désormais formés et équipés, les bénéficiaires sont prêts à exercer leur métier, développer leurs activités, générer leurs propres revenus et contribuer pleinement à leur communauté.', 'fondation-lona' ) )
				. lona_b_source(),
		),
		'initiatives-inclusion'     => array(
			'title'   => __( 'Initiatives d\'inclusion sociale', 'fondation-lona' ),
			'domain'  => array( 'inclusion' ),
			'tagline' => __( 'Accompagner les personnes vulnérables vers une pleine participation à la vie de leur communauté.', 'fondation-lona' ),
			'photo'   => array( 'fondation/solidarite-refugies-burundi', __( 'Des enfants congolais accueillis au Burundi, soutenus par la Fondation LONA', 'fondation-lona' ) ),
			'meta'    => array(
				'status'   => 'active',
				'results'  => __( "500 bourses de formation professionnelle pour les personnes vivant avec un handicap\nAide humanitaire aux réfugiés congolais au Burundi en avril et novembre 2025, avec le HCR", 'fondation-lona' ),
				'verified' => true,
			),
			'content' =>
				lona_b_p( esc_html__( 'L\'inclusion des personnes vulnérables est au cœur de l\'action de la Fondation LONA : personnes vivant avec un handicap, étudiants sourds-muets, familles déplacées par les conflits.', 'fondation-lona' ), 'is-style-lead' )
				. lona_b_list(
					array(
						'<strong>' . esc_html__( 'Personnes vivant avec un handicap', 'fondation-lona' ) . '</strong> — ' . esc_html__( '500 bourses de formation professionnelle depuis 2023 ; 80 bénéficiaires formés et équipés à Mbuji-Mayi.', 'fondation-lona' ),
						'<strong>' . esc_html__( 'Étudiants sourds-muets', 'fondation-lona' ) . '</strong> — ' . esc_html__( 'prioritaires, avec les étudiantes de première année, pour les 300 bourses spéciales de l\'ISAM Kinshasa.', 'fondation-lona' ),
						'<strong>' . esc_html__( 'Réfugiés congolais au Burundi', 'fondation-lona' ) . '</strong> — ' . esc_html__( 'aide d\'urgence et dons de vivres remis au HCR, en avril et en novembre 2025.', 'fondation-lona' ),
					)
				)
				. lona_b_source()
				. lona_b_buttons( array( array( __( 'Voir les programmes d\'autonomisation', 'fondation-lona' ), '/programmes/programmes-autonomisation/', 'is-style-link-arrow' ) ) ),
		),
	);
}

/**
 * Réalisations officielles.
 *
 * @return array<string,array>
 */
function lona_official_projects(): array {
	return array(
		'kits-autonomisation-80-personnes-vivant-avec-handicap-mbuji-mayi' => array(
			'title'   => __( 'Remise de kits d\'autonomisation à 80 personnes vivant avec un handicap', 'fondation-lona' ),
			'excerpt' => __( 'À Mbuji-Mayi, 80 personnes vivant avec un handicap ont achevé leur formation professionnelle et reçu leurs kits d\'autonomisation.', 'fondation-lona' ),
			'domain'  => array( 'autonomisation', 'inclusion' ),
			'program' => 'programmes-autonomisation',
			'photo'   => array( 'fondation/ceremonie-pvh-mbuji-mayi', __( 'Cérémonie de remise des prix de la formation professionnelle du programme PVH, à Mbuji-Mayi', 'fondation-lona' ) ),
			'meta'    => array(
				'location' => 'Mbuji-Mayi',
				'results'  => __( "80 personnes vivant avec un handicap formées à un métier\n80 kits d'autonomisation remis", 'fondation-lona' ),
				'verified' => true,
			),
		),
		'excellentia-special-isam-test-de-selection' => array(
			'title'   => __( 'Test de sélection EXCELLENTIA Spécial ISAM', 'fondation-lona' ),
			'excerpt' => __( 'Organisé dans les locaux de l\'INPP à Mbuji-Mayi, le test a réuni 95 jeunes candidats ; 15 ont été retenus.', 'fondation-lona' ),
			'domain'  => array( 'education' ),
			'program' => 'excellentia-rdc',
			'photo'   => array( 'fondation/isam-resultats-visuel', __( 'Visuel des résultats EXCELLENTIA Spécial ISAM', 'fondation-lona' ) ),
			'meta'    => array(
				'location' => __( 'INPP, Mbuji-Mayi', 'fondation-lona' ),
				'date'     => '2026-09-02',
				'results'  => __( "95 candidats au test de sélection\n15 lauréats retenus", 'fondation-lona' ),
				'verified' => true,
			),
		),
		'focus-cancer-prise-en-charge-depuis-2023' => array(
			'title'   => __( 'FOCUS CANCER : 102 personnes prises en charge depuis 2023', 'fondation-lona' ),
			'excerpt' => __( 'Grâce à FOCUS CANCER, des personnes atteintes d\'un cancer accèdent aux soins spécialisés de l\'Aga Khan University Hospital, à Nairobi.', 'fondation-lona' ),
			'domain'  => array( 'sante' ),
			'program' => 'focus-cancer',
			'photo'   => array( 'fondation/focus-cancer-visuel', __( 'Visuel FOCUS CANCER : 53 prises en charge pour un cancer du sein, 102 personnes prises en charge depuis 2023', 'fondation-lona' ) ),
			'meta'    => array(
				'location' => __( 'Nairobi (Kenya)', 'fondation-lona' ),
				'results'  => __( "102 personnes prises en charge depuis 2023\n53 personnes accompagnées pour un cancer du sein", 'fondation-lona' ),
				'verified' => true,
			),
		),
		'excellentia-rdc-2026-test-de-selection-upn' => array(
			'title'   => __( 'EXCELLENTIA RDC 2026 : le test de sélection à l\'UPN', 'fondation-lona' ),
			'excerpt' => __( 'Le grand test de sélection de la bourse nationale EXCELLENTIA RDC s\'est tenu à l\'Université Pédagogique Nationale, à Kinshasa.', 'fondation-lona' ),
			'domain'  => array( 'education' ),
			'program' => 'excellentia-rdc',
			'photo'   => array( 'fondation/test-ecriture', __( 'Une candidate concentrée pendant un test de sélection EXCELLENTIA', 'fondation-lona' ) ),
			'meta'    => array(
				'location' => __( 'Université Pédagogique Nationale, Kinshasa', 'fondation-lona' ),
				'date'     => '2026-10-18',
			),
		),
		'concours-300-bourses-speciales-isam-kinshasa' => array(
			'title'   => __( 'Concours des 300 bourses spéciales de l\'ISAM Kinshasa', 'fondation-lona' ),
			'excerpt' => __( '300 bourses spéciales réservées en priorité aux étudiantes de première année et aux étudiants sourds-muets de l\'ISAM.', 'fondation-lona' ),
			'domain'  => array( 'education', 'inclusion' ),
			'program' => 'excellentia-rdc',
			'photo'   => array( 'fondation/presidente-femmes-isam', __( 'La Présidente de la Fondation LONA aux côtés de femmes lors de la journée du concours à l\'ISAM', 'fondation-lona' ) ),
			'meta'    => array(
				'location' => __( 'ISAM, Kinshasa', 'fondation-lona' ),
				'date'     => '2025-12-14',
				'results'  => __( "Plus de 2 300 étudiantes mobilisées le jour du concours\n300 bourses spéciales destinées aux étudiantes de première année et aux étudiants sourds-muets", 'fondation-lona' ),
				'verified' => true,
			),
		),
		'atelier-industriel-isam-kinshasa' => array(
			'title'   => __( 'Inauguration de l\'Atelier Industriel Denise Nyakeru Tshisekedi à l\'ISAM', 'fondation-lona' ),
			'excerpt' => __( 'Un atelier de couture équipé de machines industrielles modernes pour encourager les vocations techniques et artisanales.', 'fondation-lona' ),
			'domain'  => array( 'education', 'autonomisation' ),
			'program' => 'programmes-autonomisation',
			'photo'   => array( 'fondation/inauguration-atelier-isam', __( 'La Présidente de la Fondation LONA coupe le ruban de l\'atelier industriel de couture de l\'ISAM', 'fondation-lona' ) ),
			'meta'    => array(
				'location' => __( 'ISAM, Kinshasa', 'fondation-lona' ),
			),
		),
		'aide-humanitaire-refugies-congolais-burundi' => array(
			'title'   => __( 'Aide humanitaire aux réfugiés congolais au Burundi', 'fondation-lona' ),
			'excerpt' => __( 'Avec le HCR, la Fondation soutient les familles congolaises contraintes à l\'exil par les conflits armés à l\'Est de la RDC.', 'fondation-lona' ),
			'domain'  => array( 'inclusion' ),
			'program' => 'initiatives-inclusion',
			'partners'=> array( 'hcr', 'aird', 'fonarev' ),
			'photo'   => array( 'fondation/solidarite-refugies-burundi', __( 'Des enfants congolais accueillis au Burundi, soutenus par la Fondation LONA', 'fondation-lona' ) ),
			'meta'    => array(
				'location' => __( 'Site de Musenyi, Burundi', 'fondation-lona' ),
				'date'     => '2025-11-01',
				'results'  => __( "Avril 2025 : appui d'urgence aux communautés congolaises déplacées\nNovembre 2025 : remise d'un important lot de vivres au HCR sur le site de Musenyi", 'fondation-lona' ),
				'verified' => true,
			),
		),
	);
}

/**
 * Crée les contenus officiels manquants.
 *
 * @return string[] Journal.
 */
function lona_create_official_content(): array {
	$log = array();

	// Partenaires cités officiellement dans les publications de la Fondation.
	$partners = array(
		'zed-supply' => array( 'ZED SUPPLY', __( 'Partenaire du programme FOCUS CANCER.', 'fondation-lona' ), '', true ),
		'hcr'        => array( __( 'HCR — Haut-Commissariat des Nations Unies pour les réfugiés', 'fondation-lona' ), __( 'Partenaire de l\'aide humanitaire aux réfugiés congolais au Burundi.', 'fondation-lona' ), 'https://www.unhcr.org/fr/', true ),
		'aird'       => array( 'AIRD — African Initiatives for Relief and Development', __( 'Partenaire humanitaire de l\'aide aux réfugiés congolais au Burundi.', 'fondation-lona' ), '', false ),
		'fonarev'    => array( 'FONAREV', __( 'Fonds National de Réparation des Victimes de violences sexuelles liées aux conflits — soutien de l\'aide aux réfugiés congolais au Burundi.', 'fondation-lona' ), '', true ),
	);
	$partner_ids = array();
	foreach ( $partners as $slug => list( $name, $desc, $url, $featured ) ) {
		$existing = get_page_by_path( $slug, OBJECT, 'lona_partner' );
		if ( $existing ) {
			$partner_ids[ $slug ] = $existing->ID;
			continue;
		}
		$pid = wp_insert_post(
			array(
				'post_type'    => 'lona_partner',
				'post_status'  => 'publish',
				'post_title'   => $name,
				'post_name'    => $slug,
				'post_excerpt' => $desc,
			)
		);
		if ( $pid && ! is_wp_error( $pid ) ) {
			$partner_ids[ $slug ] = $pid;
			update_post_meta( $pid, 'lona_featured', $featured );
			if ( $url ) {
				update_post_meta( $pid, 'lona_url', $url );
			}
			/* translators: %s: partenaire */
			$log[] = sprintf( __( 'Partenaire créé : %s (ajoutez son logo comme image principale).', 'fondation-lona' ), $name );
		}
	}
	$partner_id = $partner_ids['zed-supply'] ?? 0;

	// Programmes.
	$order = 0;
	foreach ( lona_official_programs() as $slug => $program ) {
		++$order;
		if ( get_page_by_path( $slug, OBJECT, 'lona_program' ) ) {
			continue;
		}
		$id = wp_insert_post(
			array(
				'post_type'    => 'lona_program',
				'post_status'  => 'publish',
				'post_title'   => $program['title'],
				'post_name'    => $slug,
				'menu_order'   => $order,
				'post_excerpt' => $program['tagline'],
				'post_content' => $program['content'],
			),
			true
		);
		if ( is_wp_error( $id ) ) {
			continue;
		}
		wp_set_object_terms( $id, $program['domain'], 'lona_domain' );
		update_post_meta( $id, 'lona_tagline', $program['tagline'] );
		foreach ( $program['meta'] as $key => $value ) {
			update_post_meta( $id, 'lona_' . $key, $value );
		}
		if ( 'focus-cancer' === $slug && ! empty( $partner_id ) ) {
			update_post_meta( $id, 'lona_partners', array( (int) $partner_id ) );
		}
		/* translators: %s: programme */
		$log[] = sprintf( __( 'Programme créé : %s', 'fondation-lona' ), $program['title'] );
	}

	// Réalisations.
	foreach ( lona_official_projects() as $slug => $project ) {
		if ( get_page_by_path( $slug, OBJECT, 'lona_project' ) ) {
			continue;
		}
		$id = wp_insert_post(
			array(
				'post_type'    => 'lona_project',
				'post_status'  => 'publish',
				'post_title'   => $project['title'],
				'post_name'    => $slug,
				'post_excerpt' => $project['excerpt'],
				'post_content' => lona_b_p( esc_html( $project['excerpt'] ), 'is-style-lead' ) . lona_b_source(),
			),
			true
		);
		if ( is_wp_error( $id ) ) {
			continue;
		}
		wp_set_object_terms( $id, $project['domain'], 'lona_domain' );
		foreach ( $project['meta'] as $key => $value ) {
			update_post_meta( $id, 'lona_' . $key, $value );
		}
		if ( ! empty( $project['partners'] ) ) {
			update_post_meta( $id, 'lona_partners', array_values( array_filter( array_map( static fn( $slug ) => $partner_ids[ $slug ] ?? 0, $project['partners'] ) ) ) );
		}
		$program = get_page_by_path( $project['program'], OBJECT, 'lona_program' );
		if ( $program ) {
			update_post_meta( $id, 'lona_program', $program->ID );
		}
		$path  = $project['photo'] ? lona_theme_image_path( $project['photo'][0] ) : '';
		$media = $path ? lona_import_theme_image( $path, $project['photo'][1] ) : 0;
		if ( $media ) {
			set_post_thumbnail( $id, $media );
		}
		/* translators: %s: réalisation */
		$log[] = sprintf( __( 'Réalisation créée : %s', 'fondation-lona' ), $project['title'] );
	}

	// Événement passé : test de sélection EXCELLENTIA RDC 2026.
	if ( ! get_page_by_path( 'test-de-selection-excellentia-rdc-2026', OBJECT, 'lona_event' ) ) {
		$id = wp_insert_post(
			array(
				'post_type'    => 'lona_event',
				'post_status'  => 'publish',
				'post_title'   => __( 'Test de sélection EXCELLENTIA RDC 2026', 'fondation-lona' ),
				'post_name'    => 'test-de-selection-excellentia-rdc-2026',
				'post_excerpt' => __( 'Grand test de sélection de la bourse nationale EXCELLENTIA RDC.', 'fondation-lona' ),
				'post_content' => lona_b_p( esc_html__( 'Le grand test de sélection de la bourse nationale EXCELLENTIA RDC a accueilli les candidats à l\'Université Pédagogique Nationale, à Kinshasa.', 'fondation-lona' ) ) . lona_b_source(),
			),
			true
		);
		if ( ! is_wp_error( $id ) ) {
			wp_set_object_terms( $id, 'education', 'lona_domain' );
			update_post_meta( $id, 'lona_start_date', '2026-10-18' );
			update_post_meta( $id, 'lona_location', __( 'Université Pédagogique Nationale, Kinshasa', 'fondation-lona' ) );
			$log[] = __( 'Événement créé : Test de sélection EXCELLENTIA RDC 2026', 'fondation-lona' );
		}
	}

	// Gouvernance : la Présidente-fondatrice.
	if ( ! get_page_by_path( 'denise-nyakeru-tshisekedi', OBJECT, 'lona_team' ) ) {
		$id = wp_insert_post(
			array(
				'post_type'    => 'lona_team',
				'post_status'  => 'publish',
				'post_title'   => 'Denise Nyakeru Tshisekedi',
				'post_name'    => 'denise-nyakeru-tshisekedi',
				'menu_order'   => 1,
				'post_content' => esc_html__( 'Première Dame de la République démocratique du Congo, fondatrice de la Fondation en mai 2019. Ambassadrice de bonne volonté de l\'UNFPA et Championne mondiale pour la prévention des violences sexuelles liées aux conflits (Nations Unies).', 'fondation-lona' ),
			),
			true
		);
		if ( ! is_wp_error( $id ) ) {
			update_post_meta( $id, 'lona_role', __( 'Présidente-fondatrice', 'fondation-lona' ) );
			wp_set_object_terms( $id, 'gouvernance', 'lona_team_group' );
			$path = lona_theme_image_path( 'fondation/presidente-femmes-isam' );
			$media = $path ? lona_import_theme_image( $path, __( 'Denise Nyakeru Tshisekedi, Présidente de la Fondation LONA', 'fondation-lona' ) ) : 0;
			if ( $media ) {
				set_post_thumbnail( $id, $media );
			}
			$log[] = __( 'Gouvernance : Présidente-fondatrice ajoutée.', 'fondation-lona' );
		}
	}

	// Coordonnées et chiffres d'impact officiels (seulement les champs vides).
	$settings = (array) get_option( 'lona_settings', array() );
	$defaults = array(
		'address'     => "Avenue Colonel Mondjiba 226\nC/ Ngaliema, Kinshasa\nRépublique démocratique du Congo",
		'about_short' => __( 'Fondée en 2019, la Fondation LONA œuvre pour une société congolaise dynamique où la femme est libre, forte et valorisée. Éducation, santé, lutte contre les violences basées sur le genre et autonomisation de la femme.', 'fondation-lona' ),
	);
	$has_stats = false;
	for ( $i = 1; $i <= LONA_STATS_COUNT; $i++ ) {
		if ( ! empty( $settings[ 'stat_' . $i . '_value' ] ) ) {
			$has_stats = true;
		}
	}
	if ( ! $has_stats ) {
		$stats = array(
			array( __( 'Personnes prises en charge par FOCUS CANCER depuis 2023', 'fondation-lona' ), '102' ),
			array( __( 'Femmes accompagnées pour un cancer du sein', 'fondation-lona' ), '53' ),
			array( __( 'Personnes vivant avec un handicap formées et équipées', 'fondation-lona' ), '80' ),
			array( __( 'Lauréats EXCELLENTIA Spécial ISAM sur 95 candidats', 'fondation-lona' ), '15' ),
			array( __( 'Bourses de formation professionnelle pour les personnes vivant avec un handicap', 'fondation-lona' ), '500' ),
			array( __( 'Bourses spéciales offertes aux étudiantes et étudiants sourds-muets de l\'ISAM', 'fondation-lona' ), '300' ),
		);
		foreach ( $stats as $n => list( $label, $value ) ) {
			$defaults[ 'stat_' . ( $n + 1 ) . '_label' ] = $label;
			$defaults[ 'stat_' . ( $n + 1 ) . '_value' ] = $value;
		}
		$defaults['stats_source'] = __( 'Source : publications officielles de la Fondation LONA, 2026.', 'fondation-lona' );
		$log[] = __( 'Chiffres d\'impact officiels renseignés (Fondation LONA › Réglages).', 'fondation-lona' );
	}
	$changed = false;
	foreach ( $defaults as $key => $value ) {
		if ( empty( $settings[ $key ] ) ) {
			$settings[ $key ] = $value;
			$changed          = true;
		}
	}
	if ( $changed ) {
		update_option( 'lona_settings', $settings );
		$log[] = __( 'Adresse du siège et présentation courte renseignées.', 'fondation-lona' );
	}

	return $log;
}
