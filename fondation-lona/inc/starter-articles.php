<?php
/**
 * Articles de lancement (actualités) créés par l'assistant d'installation.
 *
 * Contenus repris des publications officielles de la Fondation LONA (LinkedIn) :
 * aucun chiffre, témoignage, partenaire ou événement inventé.
 * Photos : publications officielles de la Fondation (voir CREDITS-PHOTOS.md).
 *
 * @package FondationLona
 */

defined( 'ABSPATH' ) || exit;

/**
 * Petits constructeurs de blocs.
 */
function lona_b_p( string $text, string $class = '' ): string {
	$attr = $class ? ' {"className":"' . esc_attr( $class ) . '"}' : '';
	$cls  = $class ? ' class="' . esc_attr( $class ) . '"' : '';
	return "<!-- wp:paragraph{$attr} -->\n<p{$cls}>" . $text . "</p>\n<!-- /wp:paragraph -->\n\n";
}

/**
 * Titre de niveau 2.
 *
 * @param string $text Texte.
 */
function lona_b_h2( string $text ): string {
	return "<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">" . esc_html( $text ) . "</h2>\n<!-- /wp:heading -->\n\n";
}

/**
 * Liste à puces étoiles.
 *
 * @param string[] $items Éléments (HTML autorisé).
 */
function lona_b_list( array $items ): string {
	$out = "<!-- wp:list {\"className\":\"is-style-stars\"} -->\n<ul class=\"wp-block-list is-style-stars\">";
	foreach ( $items as $item ) {
		$out .= "<!-- wp:list-item -->\n<li>" . $item . "</li>\n<!-- /wp:list-item -->";
	}
	return $out . "</ul>\n<!-- /wp:list -->\n\n";
}

/**
 * Boutons.
 *
 * @param array $buttons Liste de [libellé, chemin, style].
 */
function lona_b_buttons( array $buttons ): string {
	$out = "<!-- wp:buttons -->\n<div class=\"wp-block-buttons\">";
	foreach ( $buttons as list( $label, $path, $style ) ) {
		$attr = $style ? ' {"className":"' . esc_attr( $style ) . '"}' : '';
		$out .= '<!-- wp:button' . $attr . ' -->' . "\n" . '<div class="' . esc_attr( trim( 'wp-block-button ' . $style ) ) . '"><a class="wp-block-button__link wp-element-button" href="' . esc_url( home_url( $path ) ) . '">' . esc_html( $label ) . "</a></div>\n<!-- /wp:button -->";
	}
	return $out . "</div>\n<!-- /wp:buttons -->\n\n";
}

/**
 * Lien HTML interne.
 *
 * @param string $label Libellé.
 * @param string $path  Chemin.
 */
function lona_b_link( string $label, string $path ): string {
	return '<a href="' . esc_url( str_starts_with( $path, 'http' ) ? $path : home_url( $path ) ) . '">' . esc_html( $label ) . '</a>';
}

/**
 * Définition des articles : publications officielles de la Fondation LONA
 * (page LinkedIn), adaptées pour le site. Dates approximatives d'après LinkedIn.
 *
 * @return array<string,array>
 */
function lona_starter_articles(): array {
	$engage = lona_b_buttons(
		array(
			array( __( 'Devenir partenaire', 'fondation-lona' ), '/devenir-partenaire/', 'is-style-gold' ),
			array( __( 'Nous soutenir', 'fondation-lona' ), '/nous-soutenir/', 'is-style-outline' ),
		)
	);
	$excellentia = lona_b_buttons( array( array( __( 'Découvrir EXCELLENTIA RDC', 'fondation-lona' ), '/programmes/excellentia-rdc/', '' ) ) );

	return array(
		'bienvenue-sur-le-nouveau-site-de-la-fondation-lona' => array(
			'title'    => __( 'Bienvenue sur le nouveau site de la Fondation LONA', 'fondation-lona' ),
			'excerpt'  => __( 'Un nouvel espace pour découvrir nos domaines d\'intervention, suivre nos programmes et rejoindre notre engagement pour une société congolaise dynamique.', 'fondation-lona' ),
			'category' => __( 'Vie de la Fondation', 'fondation-lona' ),
			'domain'   => array(),
			'photo'    => array( 'fondation/ceremonie-salle', __( 'Cérémonie de remise des prix du programme de bourses EXCELLENTIA', 'fondation-lona' ) ),
			'date'     => '',
			'content'  =>
				lona_b_p( esc_html__( 'Ensemble, semons l\'excellence. Fondée en 2019 et basée à Kinshasa, la Fondation LONA a pour mission de contribuer à une société congolaise dynamique où la femme sera libre, forte et valorisée.', 'fondation-lona' ), 'is-style-lead' )
				. lona_b_h2( __( 'Ce que vous y trouverez', 'fondation-lona' ) )
				. lona_b_list(
					array(
						lona_b_link( __( 'Nos domaines d\'intervention', 'fondation-lona' ), '/nos-actions/' ) . ' — ' . esc_html__( 'l\'éducation, la santé, la lutte contre les violences basées sur le genre et l\'autonomisation de la femme.', 'fondation-lona' ),
						lona_b_link( __( 'Nos programmes', 'fondation-lona' ), '/programmes/' ) . ' — ' . esc_html__( 'dont EXCELLENTIA RDC et FOCUS CANCER.', 'fondation-lona' ),
						lona_b_link( __( 'Nos réalisations', 'fondation-lona' ), '/realisations/' ) . ' — ' . esc_html__( 'les actions menées sur le terrain et leurs résultats.', 'fondation-lona' ),
						lona_b_link( __( 'Nos actualités', 'fondation-lona' ), '/actualites/' ) . ' ' . esc_html__( 'et', 'fondation-lona' ) . ' ' . lona_b_link( __( 'nos événements', 'fondation-lona' ), '/evenements/' ) . '.',
					)
				)
				. lona_b_p( esc_html__( 'Suivez aussi notre actualité au quotidien sur', 'fondation-lona' ) . ' ' . lona_b_link( 'LinkedIn', lona_official_source_url() ) . '.' )
				. $engage,
		),
		'excellentia-rdc-immersion-dans-les-coulisses-du-test-de-selection' => array(
			'title'    => __( 'EXCELLENTIA RDC : immersion dans les coulisses du test de sélection', 'fondation-lona' ),
			'excerpt'  => __( 'Collecte et rangement des copies, dernières vérifications, coordination : découvrez l\'envers du décor après le test de sélection de la bourse nationale EXCELLENTIA RDC.', 'fondation-lona' ),
			'category' => __( 'Éducation', 'fondation-lona' ),
			'domain'   => array( 'education' ),
			'photo'    => array( 'fondation/salle-de-test', __( 'Candidats en salle lors d\'un test de sélection EXCELLENTIA', 'fondation-lona' ) ),
			'date'     => '2026-11-08',
			'content'  =>
				lona_b_p( esc_html__( 'Derrière chaque événement d\'envergure se trouvent des femmes et des hommes engagés, une organisation rigoureuse et un véritable esprit d\'équipe.', 'fondation-lona' ), 'is-style-lead' )
				. lona_b_p( esc_html__( 'À l\'issue du test de sélection de la bourse nationale EXCELLENTIA RDC, nos équipes ont poursuivi leur mission : collecte et rangement des copies, dernières vérifications et coordination des opérations de clôture. Au-delà de la rigueur et des responsabilités, ces moments ont aussi été marqués par la convivialité, les sourires et la bonne humeur.', 'fondation-lona' ) )
				. lona_b_h2( __( 'Un engagement collectif', 'fondation-lona' ) )
				. lona_b_p( esc_html__( 'En tant qu\'organe technique chargé de l\'organisation de ce programme national de bourses, la Fondation LONA accorde une importance particulière à l\'engagement collectif, à la collaboration et à la mobilisation de ses équipes à chaque étape du processus.', 'fondation-lona' ) )
				. lona_b_p( esc_html__( 'Nous saluons le professionnalisme et le dévouement de toutes celles et ceux qui contribuent, dans l\'ombre comme sur le terrain, à la réussite de cette initiative dédiée à l\'excellence académique de la jeunesse congolaise.', 'fondation-lona' ) )
				. lona_b_source() . $excellentia,
		),
		'les-jeunes-filles-a-l-honneur' => array(
			'title'    => __( 'Les jeunes filles à l\'honneur dans les programmes EXCELLENTIA', 'fondation-lona' ),
			'excerpt'  => __( 'Dans EXCELLENTIA RDC, EXCELLENTIA Lualaba Bora et EXCELLENTIA Haut-Katanga Wantashi, les jeunes filles brillent et occupent les premières places.', 'fondation-lona' ),
			'category' => __( 'Éducation', 'fondation-lona' ),
			'domain'   => array( 'education', 'autonomisation' ),
			'photo'    => array( 'fondation/laureate-toge', __( 'Une lauréate EXCELLENTIA en toge lors de la cérémonie de remise des prix', 'fondation-lona' ) ),
			'date'     => '2026-11-04',
			'content'  =>
				lona_b_p( esc_html__( 'Dans les programmes EXCELLENTIA RDC, EXCELLENTIA Lualaba Bora et EXCELLENTIA Haut-Katanga Wantashi, les jeunes filles brillent et occupent les premières places.', 'fondation-lona' ), 'is-style-lead' )
				. lona_b_p( esc_html__( 'Leur réussite nous rappelle que, lorsqu\'elles ont accès à l\'éducation et aux mêmes opportunités, elles peuvent accomplir de grandes choses.', 'fondation-lona' ) )
				. lona_b_p( esc_html__( 'À la Fondation LONA, nous sommes fiers de soutenir les femmes et les jeunes filles sur le chemin du développement, de l\'inclusion et de l\'autonomie. Continuons à croire en leur potentiel, à les encourager et à ouvrir la voie à celles qui suivront.', 'fondation-lona' ) )
				. lona_b_p( '<strong>' . esc_html__( 'À toutes les jeunes filles : osez apprendre, rêver et viser haut. Votre avenir vous appartient !', 'fondation-lona' ) . '</strong>' )
				. lona_b_source() . $excellentia,
		),
		'excellentia-rdc-2026-cap-sur-l-upn' => array(
			'title'    => __( 'EXCELLENTIA RDC 2026 : cap sur l\'UPN', 'fondation-lona' ),
			'excerpt'  => __( 'À deux jours du grand test de sélection, retour sur la visite de l\'Université Pédagogique Nationale, qui a accueilli les candidats le dimanche 18 octobre 2026.', 'fondation-lona' ),
			'category' => __( 'Éducation', 'fondation-lona' ),
			'domain'   => array( 'education' ),
			'photo'    => array( 'fondation/candidats-documents', __( 'Des candidats EXCELLENTIA consultent leurs documents', 'fondation-lona' ) ),
			'date'     => '2026-10-16',
			'content'  =>
				lona_b_p( esc_html__( 'À deux jours du grand test de sélection, la Fondation LONA s\'est rendue à l\'Université Pédagogique Nationale (UPN), qui accueillait les candidats de la bourse nationale EXCELLENTIA RDC le dimanche 18 octobre 2026.', 'fondation-lona' ), 'is-style-lead' )
				. lona_b_p( esc_html__( 'Aux candidats, notre message était simple : gardez le cap, poursuivez vos révisions et préparez-vous à donner le meilleur de vous-mêmes.', 'fondation-lona' ) )
				. lona_b_source() . $excellentia,
		),
		'octobre-rose-focus-cancer-acces-aux-soins' => array(
			'title'    => __( 'Octobre Rose : un engagement concret pour l\'accès aux soins', 'fondation-lona' ),
			'excerpt'  => __( 'Depuis 2023, 102 personnes ont bénéficié d\'une prise en charge médicale grâce à FOCUS CANCER, dont 53 accompagnées pour un cancer du sein.', 'fondation-lona' ),
			'category' => __( 'Santé', 'fondation-lona' ),
			'domain'   => array( 'sante' ),
			'photo'    => array( 'fondation/focus-cancer-visuel', __( 'Visuel FOCUS CANCER : 53 prises en charge pour un cancer du sein, 102 personnes prises en charge depuis 2023', 'fondation-lona' ) ),
			'date'     => '2026-10-14',
			'content'  =>
				lona_b_p( esc_html__( 'Face au cancer, le coût des traitements et l\'accès aux soins spécialisés peuvent peser lourdement sur les personnes malades et leurs familles. À la Fondation LONA, nous agissons pour alléger ces difficultés à travers FOCUS CANCER.', 'fondation-lona' ), 'is-style-lead' )
				. lona_b_h2( __( 'Des résultats concrets', 'fondation-lona' ) )
				. lona_b_list(
					array(
						'<strong>102</strong> ' . esc_html__( 'personnes ont bénéficié d\'une prise en charge médicale depuis 2023, dont 53 accompagnées pour un cancer du sein.', 'fondation-lona' ),
						esc_html__( 'En 2026, plus d\'une vingtaine de femmes ont déjà bénéficié du programme.', 'fondation-lona' ),
						esc_html__( '6 bénéficiaires atteintes d\'un cancer du sein sont actuellement en traitement, tandis que d\'autres poursuivent leurs contrôles médicaux.', 'fondation-lona' ),
					)
				)
				. lona_b_h2( __( 'Comment fonctionne FOCUS CANCER ?', 'fondation-lona' ) )
				. lona_b_p( esc_html__( 'Mis en place en partenariat avec ZED SUPPLY, FOCUS CANCER permet aux bénéficiaires d\'accéder aux soins spécialisés de l\'Aga Khan University Hospital, à Nairobi, au Kenya. La Fondation prend en charge les frais médicaux, le voyage, l\'hébergement, la restauration et les déplacements vers l\'hôpital.', 'fondation-lona' ) )
				. lona_b_p( esc_html__( 'Le programme accompagne également des personnes touchées par les cancers de l\'utérus, du côlon et du rectum, du sang, de la thyroïde, de la vessie et de la peau.', 'fondation-lona' ) )
				. lona_b_p( esc_html__( 'En ce mois d\'Octobre Rose, nous saluons l\'engagement des équipes médicales, de nos partenaires et des proches qui soutiennent les bénéficiaires au quotidien. Notre engagement continue toute l\'année.', 'fondation-lona' ) )
				. lona_b_source()
				. lona_b_buttons( array( array( __( 'Découvrir FOCUS CANCER', 'fondation-lona' ), '/programmes/focus-cancer/', '' ) ) ),
		),
		'excellentia-rdc-journee-d-information' => array(
			'title'    => __( 'Derrière chaque candidat bien accueilli, des équipes mobilisées', 'fondation-lona' ),
			'excerpt'  => __( 'Dans les coulisses d\'EXCELLENTIA RDC, la Fondation LONA prépare et coordonne la journée d\'information pour accompagner les jeunes à chaque étape.', 'fondation-lona' ),
			'category' => __( 'Éducation', 'fondation-lona' ),
			'domain'   => array( 'education' ),
			'photo'    => array( 'fondation/journee-information', __( 'Des jeunes lèvent la main lors d\'une journée d\'information EXCELLENTIA', 'fondation-lona' ) ),
			'date'     => '2026-10-10',
			'content'  =>
				lona_b_p( esc_html__( 'Dans les coulisses d\'EXCELLENTIA RDC, la Fondation LONA, en sa qualité d\'organe technique, prépare et coordonne la journée d\'information pour accompagner les jeunes à chaque étape de leur parcours.', 'fondation-lona' ), 'is-style-lead' )
				. lona_b_p( esc_html__( 'De la préparation à la logistique, en passant par l\'administration et la communication, chaque équipe apporte son expertise au service d\'un objectif commun : permettre aux candidats de s\'informer, de comprendre les démarches et d\'avancer avec confiance.', 'fondation-lona' ) )
				. lona_b_p( esc_html__( 'Un travail collectif qui met l\'engagement et la rigueur au service de la jeunesse congolaise.', 'fondation-lona' ) )
				. lona_b_source() . $excellentia,
		),
		'journee-internationale-de-la-paix' => array(
			'title'    => __( 'Journée internationale de la paix : l\'éducation, un investissement dans la paix durable', 'fondation-lona' ),
			'excerpt'  => __( 'Et si construire la paix, c\'était aussi donner à chaque jeune les moyens de construire son avenir ?', 'fondation-lona' ),
			'category' => __( 'Vie de la Fondation', 'fondation-lona' ),
			'domain'   => array( 'education' ),
			'photo'    => array( 'fondation/journee-lubumbashi', __( 'Des jeunes rassemblés lors d\'une journée EXCELLENTIA à Lubumbashi', 'fondation-lona' ) ),
			'date'     => '2026-09-21',
			'content'  =>
				lona_b_p( esc_html__( 'Et si construire la paix, c\'était aussi donner à chaque jeune les moyens de construire son avenir ?', 'fondation-lona' ), 'is-style-lead' )
				. lona_b_p( esc_html__( 'La paix ne se résume pas à l\'absence de conflits. Elle se construit aussi à travers l\'accès à l\'éducation, l\'égalité des chances et les opportunités offertes aux nouvelles générations.', 'fondation-lona' ) )
				. lona_b_p( esc_html__( 'À la Fondation LONA, nous sommes convaincus qu\'investir dans la jeunesse, c\'est contribuer à bâtir une société plus juste, plus solidaire et plus pacifique. Chaque jeune accompagné, chaque talent révélé et chaque ambition soutenue représente une avancée vers un avenir où chacun peut trouver sa place.', 'fondation-lona' ) )
				. lona_b_source(),
		),
		'excellentia-special-isam-15-laureats' => array(
			'title'    => __( 'EXCELLENTIA Spécial ISAM : 15 lauréats retenus sur 95 candidats', 'fondation-lona' ),
			'excerpt'  => __( 'Organisé le 2 septembre à l\'INPP de Mbuji-Mayi, le test de sélection s\'inscrit dans l\'attribution de 100 bourses aux étudiants de l\'ISAM.', 'fondation-lona' ),
			'category' => __( 'Éducation', 'fondation-lona' ),
			'domain'   => array( 'education', 'autonomisation' ),
			'photo'    => array( 'fondation/isam-resultats-visuel', __( 'Visuel des résultats EXCELLENTIA Spécial ISAM', 'fondation-lona' ) ),
			'date'     => '2026-09-08',
			'content'  =>
				lona_b_p( esc_html__( 'Ils étaient 95 jeunes à participer au test de sélection du programme EXCELLENTIA Spécial ISAM. À l\'issue de cette étape, 15 candidats ont été retenus.', 'fondation-lona' ), 'is-style-lead' )
				. lona_b_p( esc_html__( 'Organisé le 2 septembre dans les locaux de l\'INPP à Mbuji-Mayi, ce test s\'inscrit dans le processus d\'attribution de 100 bourses d\'études destinées aux étudiants de l\'Institut Supérieur des Arts et Métiers, dans les filières Coupe et Couture et Modélisme.', 'fondation-lona' ) )
				. lona_b_p( esc_html__( 'À travers cette initiative, la Fondation LONA entend accompagner ces jeunes dans leur parcours académique, soutenir le développement de leurs talents et leur offrir davantage de moyens pour construire leur autonomie.', 'fondation-lona' ) )
				. lona_b_p( esc_html__( 'Félicitations aux candidats retenus et tous nos encouragements à l\'ensemble des participants pour leur engagement et leur détermination.', 'fondation-lona' ) )
				. lona_b_source() . $excellentia,
		),
		'mbuji-mayi-80-personnes-vivant-avec-handicap-kits-autonomisation' => array(
			'title'    => __( 'Mbuji-Mayi : 80 personnes vivant avec un handicap reçoivent leurs kits d\'autonomisation', 'fondation-lona' ),
			'excerpt'  => __( 'Formés et équipés, 80 bénéficiaires sont désormais prêts à exercer leur métier et à générer leurs propres revenus.', 'fondation-lona' ),
			'category' => __( 'Autonomisation', 'fondation-lona' ),
			'domain'   => array( 'autonomisation', 'inclusion' ),
			'photo'    => array( 'fondation/ceremonie-pvh-mbuji-mayi', __( 'Cérémonie de remise des prix de la formation professionnelle du programme PVH, à Mbuji-Mayi', 'fondation-lona' ) ),
			'date'     => '2026-09-05',
			'content'  =>
				lona_b_p( esc_html__( 'Dans la ville de Mbuji-Mayi, les 80 personnes vivant avec un handicap ayant achevé leur formation professionnelle ont été honorées lors d\'une cérémonie de remise des kits d\'autonomisation.', 'fondation-lona' ), 'is-style-lead' )
				. lona_b_p( esc_html__( 'Aux côtés des partenaires et des familles, Son Excellence Madame la Première Dame, Présidente de la Fondation LONA, a tenu à célébrer leur parcours, leur courage et les efforts accomplis.', 'fondation-lona' ) )
				. lona_b_h2( __( 'De la formation à l\'autonomie', 'fondation-lona' ) )
				. lona_b_p( esc_html__( 'Plus qu\'une remise de kits, cette cérémonie symbolise le passage de la formation à l\'autonomie. Désormais formés et équipés, les 80 bénéficiaires sont prêts à exercer leur métier, développer leurs activités, générer leurs propres revenus et contribuer pleinement à leur communauté.', 'fondation-lona' ) )
				. lona_b_p( esc_html__( 'Une vision portée par la Présidente de la Fondation : former, équiper et donner à chacun les moyens de construire son autonomie.', 'fondation-lona' ) )
				. lona_b_source()
				. lona_b_buttons( array( array( __( 'Nos programmes d\'autonomisation', 'fondation-lona' ), '/programmes/programmes-autonomisation/', '' ) ) ),
		),
		'500-bourses-de-formation-professionnelle-pour-les-personnes-vivant-avec-handicap' => array(
			'title'    => __( '500 bourses de formation professionnelle pour les personnes vivant avec un handicap', 'fondation-lona' ),
			'excerpt'  => __( 'Lancé en 2023 au sein de l\'INPP, le programme fait de la formation professionnelle un véritable levier d\'autonomie pour les personnes vivant avec un handicap.', 'fondation-lona' ),
			'category' => __( 'Autonomisation', 'fondation-lona' ),
			'domain'   => array( 'autonomisation', 'inclusion' ),
			'photo'    => array( 'fondation/ceremonie-pvh-mbuji-mayi', __( 'Cérémonie de remise des prix de la formation professionnelle du programme PVH', 'fondation-lona' ) ),
			'date'     => '2026-02-10',
			'content'  =>
				lona_b_p( esc_html__( 'En 2023, une vision forte a été posée : faire de l\'éducation professionnelle un véritable levier d\'autonomie pour les personnes vivant avec un handicap.', 'fondation-lona' ), 'is-style-lead' )
				. lona_b_p( esc_html__( 'Cette ambition s\'est traduite par la mise en place d\'un programme structuré de 500 bourses de formation professionnelle, porté avec des partenaires institutionnels et techniques et déployé au sein de l\'INPP, dans plusieurs métiers porteurs.', 'fondation-lona' ) )
				. lona_b_h2( __( 'Un choix de société', 'fondation-lona' ) )
				. lona_b_p( esc_html__( 'Ce projet n\'est pas un geste symbolique : c\'est le choix de croire au potentiel, à la compétence et à la dignité par le travail. Aujourd\'hui, ce parcours arrive à son terme et la promesse faite devient réalité.', 'fondation-lona' ) )
				. lona_b_source()
				. lona_b_buttons( array( array( __( 'Nos programmes d\'autonomisation', 'fondation-lona' ), '/programmes/programmes-autonomisation/', '' ) ) ),
		),
		'solidarite-sans-frontieres-refugies-congolais-au-burundi' => array(
			'title'    => __( 'Solidarité sans frontières : la Fondation aux côtés des réfugiés congolais au Burundi', 'fondation-lona' ),
			'excerpt'  => __( 'Avec le HCR, la Fondation LONA poursuit son engagement auprès des familles congolaises contraintes à l\'exil et accueillies temporairement au Burundi.', 'fondation-lona' ),
			'category' => __( 'Solidarité', 'fondation-lona' ),
			'domain'   => array( 'inclusion' ),
			'photo'    => array( 'fondation/solidarite-refugies-burundi', __( 'Des enfants congolais accueillis au Burundi, soutenus par la Fondation LONA', 'fondation-lona' ) ),
			'date'     => '2026-01-15',
			'content'  =>
				lona_b_p( esc_html__( 'La Fondation LONA (ex-Fondation Denise Nyakeru Tshisekedi) poursuit son engagement auprès de nos compatriotes congolais contraints à l\'exil et accueillis temporairement au Burundi.', 'fondation-lona' ), 'is-style-lead' )
				. lona_b_p( esc_html__( 'Une nouvelle étape a été franchie avec la remise de dons de vivres au Haut-Commissariat des Nations Unies pour les réfugiés (HCR), chargé d\'en assurer la distribution aux familles congolaises affectées par les conflits armés à l\'Est de la République démocratique du Congo.', 'fondation-lona' ) )
				. lona_b_h2( __( 'Un engagement dans la durée', 'fondation-lona' ) )
				. lona_b_list(
					array(
						'<strong>' . esc_html__( 'Avril 2025', 'fondation-lona' ) . '</strong> — ' . esc_html__( 'première phase : un appui d\'urgence pour répondre aux besoins les plus immédiats des communautés congolaises déplacées, mené avec l\'appui du HCR et des autorités burundaises.', 'fondation-lona' ),
						'<strong>' . esc_html__( 'Novembre 2025', 'fondation-lona' ) . '</strong> — ' . esc_html__( 'seconde opération d\'envergure sur le site de Musenyi, avec la remise d\'un important lot de vivres au HCR au bénéfice des familles congolaises exilées.', 'fondation-lona' ),
						'<strong>' . esc_html__( 'La suite', 'fondation-lona' ) . '</strong> — ' . esc_html__( 'd\'autres étapes sont en préparation.', 'fondation-lona' ),
					)
				)
				. lona_b_p( esc_html__( 'Ces actions ont été rendues possibles grâce à une synergie avec nos partenaires humanitaires, notamment African Initiatives for Relief and Development (AIRD), et avec le soutien du Fonds National de Réparation des Victimes de violences sexuelles liées aux conflits (FONAREV).', 'fondation-lona' ) )
				. lona_b_p( esc_html__( 'Au-delà de l\'aide matérielle, elles portent un message de solidarité, de compassion et d\'espérance : la solidarité ne connaît pas de frontières.', 'fondation-lona' ) )
				. lona_b_source() . $engage,
		),
		'isam-kinshasa-concours-des-300-bourses-speciales' => array(
			'title'    => __( 'ISAM Kinshasa : plus de 2 300 étudiantes au concours des 300 bourses spéciales', 'fondation-lona' ),
			'excerpt'  => __( 'La Fondation LONA a organisé le concours d\'octroi de 300 bourses spéciales destinées aux étudiantes de première année et aux étudiants sourds-muets de l\'ISAM.', 'fondation-lona' ),
			'category' => __( 'Éducation', 'fondation-lona' ),
			'domain'   => array( 'education', 'inclusion' ),
			'photo'    => array( 'fondation/presidente-femmes-isam', __( 'La Présidente de la Fondation LONA aux côtés de femmes lors de la journée du concours à l\'ISAM', 'fondation-lona' ) ),
			'date'     => '2025-12-16',
			'content'  =>
				lona_b_p( esc_html__( 'Sous l\'impulsion de sa Présidente, la Fondation LONA a honoré son engagement envers la jeunesse de l\'ISAM en organisant, le dimanche 14 décembre 2025, le concours d\'octroi de 300 bourses spéciales à l\'Institut Supérieur des Arts et Métiers (ISAM) de Kinshasa.', 'fondation-lona' ), 'is-style-lead' )
				. lona_b_h2( __( 'Des bourses pour l\'équité et l\'inclusion', 'fondation-lona' ) )
				. lona_b_p( esc_html__( 'Ces bourses sont destinées en priorité à deux catégories d\'étudiants de première année :', 'fondation-lona' ) )
				. lona_b_list(
					array(
						esc_html__( 'les étudiantes de première année de l\'ISAM ;', 'fondation-lona' ),
						esc_html__( 'les étudiants sourds-muets de l\'ISAM.', 'fondation-lona' ),
					)
				)
				. lona_b_p( esc_html__( 'Les lauréats sont sélectionnés à l\'issue d\'un concours, afin que chaque bourse soit attribuée au mérite. Avec plus de 2 300 étudiantes mobilisées, cette journée a illustré l\'enthousiasme et l\'ambition d\'une jeunesse congolaise résolument tournée vers l\'excellence.', 'fondation-lona' ) )
				. lona_b_p( esc_html__( 'Investir dans l\'éducation, c\'est investir dans les futures créatrices, techniciennes et leaders qui construiront la RDC de demain.', 'fondation-lona' ) )
				. lona_b_source() . $excellentia,
		),
		'inauguration-atelier-industriel-isam-kinshasa' => array(
			'title'    => __( 'ISAM Kinshasa : inauguration de l\'Atelier Industriel Denise Nyakeru Tshisekedi', 'fondation-lona' ),
			'excerpt'  => __( 'Équipé de machines industrielles modernes, le nouvel atelier de couture de l\'ISAM marque une étape majeure dans la transformation de l\'institut.', 'fondation-lona' ),
			'category' => __( 'Autonomisation', 'fondation-lona' ),
			'domain'   => array( 'education', 'autonomisation' ),
			'photo'    => array( 'fondation/inauguration-atelier-isam', __( 'La Présidente de la Fondation LONA coupe le ruban de l\'atelier industriel de couture de l\'ISAM', 'fondation-lona' ) ),
			'date'     => '2025-12-06',
			'content'  =>
				lona_b_p( esc_html__( 'La Fondation LONA, conduite par sa Présidente, a pris part à l\'inauguration du Grand Atelier Industriel de couture de l\'Institut Supérieur des Arts et Métiers (ISAM/Kinshasa), désormais baptisé « Atelier Industriel Denise Nyakeru Tshisekedi ».', 'fondation-lona' ), 'is-style-lead' )
				. lona_b_p( esc_html__( 'Cet espace moderne, équipé de machines industrielles de dernière génération, marque une étape majeure dans la transformation de l\'ISAM, engagé dans la modernisation de ses infrastructures, la rigueur académique et l\'amélioration des conditions d\'apprentissage de ses étudiants.', 'fondation-lona' ) )
				. lona_b_p( esc_html__( 'Un symbole destiné à inspirer la jeunesse congolaise et à encourager les vocations techniques, artisanales et industrielles. C\'est lors de cette inauguration qu\'a été annoncée l\'initiative des 300 bourses spéciales pour les étudiantes de l\'ISAM.', 'fondation-lona' ) )
				. lona_b_source(),
		),
	);
}

/**
 * Crée les articles manquants (aucun article existant n'est modifié).
 *
 * @return string[] Journal.
 */
function lona_create_starter_articles(): array {
	$log = array();
	foreach ( lona_starter_articles() as $slug => $article ) {
		if ( get_page_by_path( $slug, OBJECT, 'post' ) ) {
			continue;
		}
		$cat = term_exists( $article['category'], 'category' );
		if ( ! $cat ) {
			$cat = wp_insert_term( $article['category'], 'category' );
		}
		$cat_id = is_wp_error( $cat ) ? 0 : (int) ( is_array( $cat ) ? $cat['term_id'] : $cat );

		$date = $article['date'] ? get_gmt_from_date( $article['date'] . ' 10:00:00' ) : gmdate( 'Y-m-d H:i:s' );
		$id   = wp_insert_post(
			array(
				'post_type'     => 'post',
				'post_status'   => 'publish',
				'post_title'    => $article['title'],
				'post_name'     => $slug,
				'post_excerpt'  => $article['excerpt'],
				'post_content'  => $article['content'],
				'post_category' => $cat_id ? array( $cat_id ) : array(),
				'post_date_gmt' => $date,
				'post_date'     => get_date_from_gmt( $date ),
			),
			true
		);
		if ( is_wp_error( $id ) ) {
			continue;
		}
		if ( ! empty( $article['domain'] ) ) {
			wp_set_object_terms( $id, $article['domain'], 'lona_domain' );
		}
		$path  = $article['photo'] ? lona_theme_image_path( $article['photo'][0] ) : '';
		$media = $path ? lona_import_theme_image( $path, $article['photo'][1] ) : 0;
		if ( $media ) {
			set_post_thumbnail( $id, $media );
		}
		/* translators: %s: titre */
		$log[] = sprintf( __( 'Article créé : %s', 'fondation-lona' ), $article['title'] );
	}
	return $log;
}
