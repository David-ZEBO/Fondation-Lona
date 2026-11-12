<?php
/**
 * Assistant d'installation : crée les pages institutionnelles, les domaines
 * d'intervention et les fiches programmes de départ.
 *
 * Règles : ne supprime ni n'écrase jamais un contenu existant (une page dont
 * le chemin existe déjà est ignorée). Action manuelle, réservée aux administrateurs.
 *
 * @package FondationLona
 */

defined( 'ABSPATH' ) || exit;

/**
 * Pages à créer : chemin => [titre, pattern ou callback, extrait, modèle, parent].
 */
function lona_starter_pages(): array {
	return array(
		'accueil'                       => array( __( 'Accueil', 'fondation-lona' ), '', '' ),
		'a-propos'                      => array( __( 'À propos de la Fondation', 'fondation-lona' ), 'page-about', __( 'La fondation de la Première Dame de la République démocratique du Congo, engagée depuis 2019 pour une société congolaise dynamique.', 'fondation-lona' ) ),
		'a-propos/la-presidente'        => array( __( 'La Présidente', 'fondation-lona' ), 'page-president', __( 'Son Excellence Madame Denise Nyakeru Tshisekedi, Première Dame de la RDC, fondatrice et Présidente de la Fondation LONA.', 'fondation-lona' ) ),
		'a-propos/vision-et-mission'    => array( __( 'Notre vision et notre mission', 'fondation-lona' ), 'page-vision', __( 'Ce qui nous anime et la manière dont nous agissons.', 'fondation-lona' ) ),
		'a-propos/gouvernance-et-equipe'=> array( __( 'Gouvernance et équipe', 'fondation-lona' ), 'page-governance', __( 'Les femmes et les hommes qui portent la mission de la Fondation.', 'fondation-lona' ) ),
		'nos-actions'                   => array( __( 'Nos domaines d\'intervention', 'fondation-lona' ), 'page-actions', __( 'Agir là où les besoins sont essentiels.', 'fondation-lona' ) ),
		'nos-actions/education'         => array( __( 'Éducation et excellence', 'fondation-lona' ), array( 'education' ), __( 'Accompagner les élèves et étudiants vers la réussite et révéler les talents.', 'fondation-lona' ) ),
		'nos-actions/sante'             => array( __( 'Santé et bien-être', 'fondation-lona' ), array( 'sante' ), __( 'Favoriser l\'accès aux soins, la prévention et la sensibilisation.', 'fondation-lona' ) ),
		'nos-actions/lutte-contre-les-vbg' => array( __( 'Lutte contre les violences basées sur le genre', 'fondation-lona' ), array( 'vbg' ), __( 'Prévenir, sensibiliser et orienter vers un accompagnement adapté.', 'fondation-lona' ) ),
		'nos-actions/autonomisation-des-femmes' => array( __( 'Autonomisation des femmes', 'fondation-lona' ), array( 'autonomisation' ), __( 'Renforcer les compétences, l\'entrepreneuriat et le leadership des femmes.', 'fondation-lona' ) ),
		'nos-actions/inclusion-sociale' => array( __( 'Inclusion sociale', 'fondation-lona' ), array( 'inclusion' ), __( 'Soutenir les personnes vulnérables et favoriser leur pleine participation.', 'fondation-lona' ) ),
		'actualites'                    => array( __( 'Actualités', 'fondation-lona' ), '', '' ),
		'nos-partenaires'               => array( __( 'Nos partenaires', 'fondation-lona' ), 'page-partners', __( 'Ensemble, nous allons plus loin.', 'fondation-lona' ) ),
		'nous-soutenir'                 => array( __( 'Nous soutenir', 'fondation-lona' ), 'page-support', __( 'Don, partenariat, bénévolat : chaque engagement compte.', 'fondation-lona' ) ),
		'devenir-partenaire'            => array( __( 'Devenir partenaire', 'fondation-lona' ), 'page-become-partner', __( 'Construisons ensemble des projets à fort impact.', 'fondation-lona' ) ),
		'devenir-benevole'              => array( __( 'Devenir bénévole', 'fondation-lona' ), 'page-volunteer', __( 'Offrez votre temps et vos compétences.', 'fondation-lona' ) ),
		'contact'                       => array( __( 'Contact', 'fondation-lona' ), 'page-contact', __( 'Nous sommes à votre écoute.', 'fondation-lona' ) ),
		'mentions-legales'              => array( __( 'Mentions légales', 'fondation-lona' ), 'page-legal', '' ),
		'politique-de-confidentialite'  => array( __( 'Politique de confidentialité', 'fondation-lona' ), 'page-privacy', '' ),
	);
}

/**
 * Contenu d'une page de domaine.
 *
 * @param string $domain Slug du domaine.
 */
function lona_domain_page_content( string $domain ): string {
	$term    = get_term_by( 'slug', $domain, 'lona_domain' );
	$term_id = $term ? (int) $term->term_id : 0;
	$photo   = lona_domain_photos()[ $domain ] ?? array( 'test-ecriture', '' );
	$img     = esc_url( lona_fondation_photo_url( $photo[0] ) );
	$label   = lona_domains()[ $domain ] ?? '';
	$news    = $term_id ? '<!-- wp:heading --><h2 class="wp-block-heading">' . esc_html__( 'Actualités liées', 'fondation-lona' ) . '</h2><!-- /wp:heading -->

<!-- wp:query {"queryId":4' . $term_id . ',"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":{"lona_domain":[' . $term_id . ']}},"align":"wide","className":"lona-news lona-news--simple"} -->
<div class="wp-block-query alignwide lona-news lona-news--simple"><!-- wp:post-template {"className":"lona-news__list"} -->
<!-- wp:group {"tagName":"article","className":"lona-news__card","layout":{"type":"default"}} -->
<article class="wp-block-group lona-news__card"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/3","sizeSlug":"lona-card","className":"lona-news__image"} /-->

<!-- wp:group {"className":"lona-news__body","layout":{"type":"default"}} -->
<div class="wp-block-group lona-news__body"><!-- wp:post-date /-->

<!-- wp:post-title {"level":3,"isLink":true,"className":"lona-news__title"} /--></div>
<!-- /wp:group --></article>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"className":"lona-empty"} -->
<p class="lona-empty">' . esc_html__( 'Les actualités de ce domaine seront publiées prochainement.', 'fondation-lona' ) . '</p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query -->' : '';

	return '<!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"lona-split"} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center lona-split"><!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%"><!-- wp:paragraph {"className":"is-style-eyebrow"} -->
<p class="is-style-eyebrow">' . esc_html__( 'Notre approche', 'fondation-lona' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"is-style-editorial"} -->
<h2 class="wp-block-heading is-style-editorial">' . esc_html( $label ) . '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"lona-provisional"} -->
<p class="lona-provisional">' . esc_html__( 'Contenu provisoire — présentez ici les enjeux, l\'approche et les actions de la Fondation dans ce domaine.', 'fondation-lona' ) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%"><!-- wp:image {"sizeSlug":"large","className":"is-style-arch"} -->
<figure class="wp-block-image size-large is-style-arch"><img src="' . $img . '" alt="' . esc_attr( $photo[1] ) . '"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:heading -->
<h2 class="wp-block-heading">' . esc_html__( 'Programmes', 'fondation-lona' ) . '</h2>
<!-- /wp:heading -->

<!-- wp:lona/programs {"count":6,"domain":"' . esc_attr( $domain ) . '","align":"wide"} /-->

<!-- wp:heading -->
<h2 class="wp-block-heading">' . esc_html__( 'Réalisations', 'fondation-lona' ) . '</h2>
<!-- /wp:heading -->

<!-- wp:lona/projects {"count":5,"domain":"' . esc_attr( $domain ) . '","align":"wide"} /-->

' . $news . '

<!-- wp:pattern {"slug":"fondation-lona/call-to-action"} /-->';
}

/**
 * Exécute l'installation. Retourne le journal des opérations.
 *
 * @param bool $set_permalinks Activer les permaliens « Nom de l'article ».
 * @param bool $with_articles  Créer les articles de lancement.
 * @return string[]
 */
function lona_run_starter( bool $set_permalinks, bool $with_articles = false ): array {
	$log = array();

	// Domaines.
	foreach ( lona_domains() as $slug => $label ) {
		if ( ! term_exists( $slug, 'lona_domain' ) ) {
			wp_insert_term( $label, 'lona_domain', array( 'slug' => $slug ) );
			/* translators: %s: domaine */
			$log[] = sprintf( __( 'Domaine créé : %s', 'fondation-lona' ), $label );
		}
	}
	// Groupes d'équipe.
	foreach ( array( 'gouvernance' => __( 'Gouvernance', 'fondation-lona' ), 'equipe' => __( 'Équipe', 'fondation-lona' ) ) as $slug => $label ) {
		if ( ! term_exists( $slug, 'lona_team_group' ) ) {
			wp_insert_term( $label, 'lona_team_group', array( 'slug' => $slug ) );
		}
	}

	// Pages (les parents sont créés avant les enfants grâce à l'ordre du tableau).
	$registry = WP_Block_Patterns_Registry::get_instance();
	foreach ( lona_starter_pages() as $path => list( $title, $source, $excerpt ) ) {
		if ( get_page_by_path( $path ) ) {
			/* translators: %s: chemin */
			$log[] = sprintf( __( 'Page existante conservée : /%s/', 'fondation-lona' ), $path );
			continue;
		}
		$parent_id = 0;
		if ( str_contains( $path, '/' ) ) {
			$parent    = get_page_by_path( dirname( $path ) );
			$parent_id = $parent ? $parent->ID : 0;
		}
		if ( is_array( $source ) ) {
			$content = lona_domain_page_content( $source[0] );
		} elseif ( $source && $registry->is_registered( 'fondation-lona/' . $source ) ) {
			$content = $registry->get_registered( 'fondation-lona/' . $source )['content'];
		} else {
			$content = '';
		}
		$id = wp_insert_post(
			array(
				'post_type'    => 'page',
				'post_status'  => 'publish',
				'post_title'   => $title,
				'post_name'    => basename( $path ),
				'post_parent'  => $parent_id,
				'post_content' => $content,
				'post_excerpt' => $excerpt,
			),
			true
		);
		if ( ! is_wp_error( $id ) ) {
			/* translators: %s: chemin */
			$log[] = sprintf( __( 'Page créée : /%s/', 'fondation-lona' ), $path );
		}
	}

	// Réglages de lecture : uniquement s'ils ne sont pas déjà définis.
	$home = get_page_by_path( 'accueil' );
	$news = get_page_by_path( 'actualites' );
	if ( $home && $news && 'page' !== get_option( 'show_on_front' ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $home->ID );
		update_option( 'page_for_posts', $news->ID );
		$log[] = __( 'Page d\'accueil et page des actualités définies.', 'fondation-lona' );
	}
	$privacy = get_page_by_path( 'politique-de-confidentialite' );
	if ( $privacy && ( ! get_option( 'wp_page_for_privacy_policy' ) || 'publish' !== get_post_status( (int) get_option( 'wp_page_for_privacy_policy' ) ) ) ) {
		update_option( 'wp_page_for_privacy_policy', $privacy->ID );
		$log[] = __( 'Page de confidentialité définie.', 'fondation-lona' );
	}

	// Contenus officiels : programmes, réalisations, partenaire, événement, coordonnées, chiffres.
	$log = array_merge( $log, lona_create_official_content() );

	// Identité visuelle et images d'illustration (uniquement si rien n'est encore défini).
	$log = array_merge( $log, lona_import_brand_assets() );

	// Articles de lancement (actualités illustrées).
	if ( $with_articles && function_exists( 'lona_create_starter_articles' ) ) {
		$log = array_merge( $log, lona_create_starter_articles() );
	}

	if ( $set_permalinks && '' === get_option( 'permalink_structure' ) ) {
		update_option( 'permalink_structure', '/%postname%/' );
		$log[] = __( 'Permaliens « Nom de l\'article » activés.', 'fondation-lona' );
	}
	flush_rewrite_rules( false );
	update_option( 'lona_starter_done', gmdate( 'c' ) );

	return $log;
}

/**
 * Importe une image du thème dans la médiathèque (une seule fois).
 *
 * @param string $relative Chemin relatif au thème.
 * @param string $title    Titre / texte alternatif.
 * @return int Identifiant du média (0 en cas d'échec).
 */
function lona_import_theme_image( string $relative, string $title ): int {
	$imported = (array) get_option( 'lona_imported_media', array() );
	if ( ! empty( $imported[ $relative ] ) && get_post( (int) $imported[ $relative ] ) ) {
		return (int) $imported[ $relative ];
	}
	$source = LONA_DIR . '/' . $relative;
	if ( ! is_readable( $source ) ) {
		return 0;
	}
	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/media.php';
	require_once ABSPATH . 'wp-admin/includes/image.php';

	$tmp = wp_tempnam( basename( $source ) );
	if ( ! $tmp || ! copy( $source, $tmp ) ) {
		return 0;
	}
	$id = media_handle_sideload( array( 'name' => basename( $source ), 'tmp_name' => $tmp ), 0, $title );
	if ( is_wp_error( $id ) ) {
		wp_delete_file( $tmp );
		return 0;
	}
	update_post_meta( $id, '_wp_attachment_image_alt', $title );
	$imported[ $relative ] = $id;
	update_option( 'lona_imported_media', $imported, false );
	return (int) $id;
}

/**
 * Logo, icône du site et images des programmes de départ.
 *
 * @return string[] Journal.
 */
function lona_import_brand_assets(): array {
	$log = array();
	if ( ! get_theme_mod( 'custom_logo' ) ) {
		$logo = lona_import_theme_image( 'assets/images/logo-fondation-lona.png', __( 'Logo Fondation LONA — Ensemble, semons l\'excellence', 'fondation-lona' ) );
		if ( $logo ) {
			set_theme_mod( 'custom_logo', $logo );
			$log[] = __( 'Logo officiel importé et défini.', 'fondation-lona' );
		}
	}
	if ( ! get_option( 'site_icon' ) ) {
		$icon = lona_import_theme_image( 'assets/images/icone-fondation-lona.png', __( 'Emblème Fondation LONA', 'fondation-lona' ) );
		if ( $icon ) {
			update_option( 'site_icon', $icon );
			$log[] = __( 'Icône du site (favicon) définie.', 'fondation-lona' );
		}
	}
	foreach ( lona_official_programs() as $slug => $program_data ) {
		$program = get_page_by_path( $slug, OBJECT, 'lona_program' );
		$path    = ! empty( $program_data['photo'] ) ? lona_theme_image_path( $program_data['photo'][0] ) : '';
		if ( $program && $path && ! has_post_thumbnail( $program ) ) {
			$media = lona_import_theme_image( $path, $program_data['photo'][1] );
			if ( $media ) {
				set_post_thumbnail( $program, $media );
				/* translators: %s: programme */
				$log[] = sprintf( __( 'Image ajoutée au programme : %s', 'fondation-lona' ), $program->post_title );
			}
		}
	}
	return $log;
}

add_action(
	'admin_menu',
	static function () {
		add_submenu_page( 'lona-settings', __( 'Assistant d\'installation', 'fondation-lona' ), __( 'Installation', 'fondation-lona' ), 'manage_options', 'lona-setup', 'lona_render_setup_page' );
	},
	20
);

/**
 * Page de l'assistant.
 */
function lona_render_setup_page(): void {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	$log = array();
	if ( isset( $_POST['lona_setup_nonce'] ) && wp_verify_nonce( sanitize_key( wp_unslash( $_POST['lona_setup_nonce'] ) ), 'lona_setup' ) ) {
		$log = lona_run_starter( ! empty( $_POST['lona_permalinks'] ), ! empty( $_POST['lona_articles'] ) );
	}
	?>
	<div class="wrap lona-settings">
		<h1><?php esc_html_e( 'Fondation LONA — Assistant d\'installation', 'fondation-lona' ); ?></h1>
		<div class="lona-settings__card">
			<p><?php esc_html_e( 'Crée les pages institutionnelles (À propos, domaines, soutien, contact, pages légales…), les domaines d\'intervention et les fiches de départ des programmes EXCELLENTIA RDC et FOCUS CANCER.', 'fondation-lona' ); ?></p>
			<p><strong><?php esc_html_e( 'Aucun contenu existant n\'est modifié ni supprimé : les pages déjà présentes sont conservées telles quelles.', 'fondation-lona' ); ?></strong></p>
			<?php if ( get_option( 'lona_starter_done' ) ) : ?>
				<p class="description"><?php esc_html_e( 'L\'assistant a déjà été exécuté. Le relancer ne crée que les éléments manquants.', 'fondation-lona' ); ?></p>
			<?php endif; ?>
			<form method="post">
				<?php wp_nonce_field( 'lona_setup', 'lona_setup_nonce' ); ?>
				<?php if ( '' === get_option( 'permalink_structure' ) ) : ?>
					<p><label><input type="checkbox" name="lona_permalinks" value="1" checked> <?php esc_html_e( 'Activer les URL lisibles (/a-propos/, /programmes/…) — recommandé', 'fondation-lona' ); ?></label></p>
				<?php endif; ?>
				<p><label><input type="checkbox" name="lona_articles" value="1" checked> <?php esc_html_e( 'Créer les 6 articles de lancement illustrés (EXCELLENTIA RDC, FOCUS CANCER, VBG, autonomisation, inclusion, nouveau site) — à relire avant la mise en ligne', 'fondation-lona' ); ?></label></p>
				<?php submit_button( __( 'Lancer l\'installation', 'fondation-lona' ) ); ?>
			</form>
			<?php if ( $log ) : ?>
				<h2><?php esc_html_e( 'Opérations effectuées', 'fondation-lona' ); ?></h2>
				<ul class="lona-log">
					<?php foreach ( $log as $line ) : ?>
						<li><?php echo esc_html( $line ); ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
	<?php
}

/**
 * Rappel après activation du thème.
 */
add_action(
	'admin_notices',
	static function () {
		if ( get_option( 'lona_starter_done' ) || ! current_user_can( 'manage_options' ) ) {
			return;
		}
		$screen = get_current_screen();
		if ( $screen && 'fondation-lona_page_lona-setup' === $screen->id ) {
			return;
		}
		printf(
			'<div class="notice notice-info"><p>%1$s <a href="%2$s">%3$s</a></p></div>',
			esc_html__( 'Thème Fondation LONA activé.', 'fondation-lona' ),
			esc_url( admin_url( 'admin.php?page=lona-setup' ) ),
			esc_html__( 'Lancer l\'assistant d\'installation', 'fondation-lona' )
		);
	}
);
