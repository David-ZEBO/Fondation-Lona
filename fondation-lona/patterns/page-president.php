<?php
/**
 * Title: Page — La Présidente
 * Slug: fondation-lona/page-president
 * Categories: lona-pages
 * Post Types: page
 *
 * Sources : OPDAD / OAFLAD (oaflad.org/fr/members/D-R-Congo), actualite.cd (14 août 2025),
 * Wikipédia, publications LinkedIn de la Fondation LONA.
 *
 * @package FondationLona
 */

$lona_timeline = array(
	array( '1967', __( 'Naissance à Bukavu, dans la province du Sud-Kivu.', 'fondation-lona' ) ),
	array( __( 'Avant 2019', 'fondation-lona' ), __( 'Après son Diplôme d\'État en RDC, études en Belgique, où elle exerce dans le domaine des soins infirmiers.', 'fondation-lona' ) ),
	array( __( 'Janvier 2019', 'fondation-lona' ), __( 'Devient Première Dame de la République démocratique du Congo, aux côtés du Président Félix-Antoine Tshisekedi Tshilombo.', 'fondation-lona' ) ),
	array( __( 'Mai 2019', 'fondation-lona' ), __( 'Création de la Fondation Denise Nyakeru Tshisekedi (FDNT), dédiée à l\'autonomisation des femmes et des filles congolaises. Nommée Ambassadrice de bonne volonté de l\'UNFPA.', 'fondation-lona' ) ),
	array( __( 'Décembre 2019', 'fondation-lona' ), __( 'Désignée « Championne mondiale pour la prévention des violences sexuelles liées aux conflits » par le Bureau de la Représentante spéciale du Secrétaire général des Nations Unies.', 'fondation-lona' ) ),
	array( '2025', __( 'La Fondation devient la Fondation LONA — « semer » en lingala — et recentre son action sur l\'éducation. Remise des prix aux 79 lauréats de la 6e édition d\'EXCELLENTIA.', 'fondation-lona' ) ),
);
$lona_img = esc_url( lona_fondation_photo_url( 'inauguration-atelier-isam' ) );
?>
<!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"lona-split"} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center lona-split"><!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%"><!-- wp:paragraph {"className":"is-style-eyebrow"} -->
<p class="is-style-eyebrow"><?php esc_html_e( 'Présidente-fondatrice', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"is-style-editorial"} -->
<h2 class="wp-block-heading is-style-editorial"><?php esc_html_e( 'Son Excellence Madame Denise Nyakeru Tshisekedi', 'fondation-lona' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"is-style-lead"} -->
<p class="is-style-lead"><?php esc_html_e( 'Première Dame de la République démocratique du Congo, Denise Nyakeru Tshisekedi est la fondatrice et la Présidente de la Fondation LONA.', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Engagée pour la promotion des femmes et des filles congolaises, la lutte contre les violences basées sur le genre et l\'éducation de la jeunesse, elle porte une conviction : former, équiper et donner à chacun les moyens de construire son autonomie.', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%"><!-- wp:image {"sizeSlug":"large","className":"is-style-framed"} -->
<figure class="wp-block-image size-large is-style-framed"><img src="<?php echo $lona_img; ?>" alt="<?php esc_attr_e( 'Denise Nyakeru Tshisekedi inaugure l\'atelier industriel de couture de l\'ISAM à Kinshasa', 'fondation-lona' ); ?>"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'Un engagement reconnu', 'fondation-lona' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"lona-timeline","layout":{"type":"default"}} -->
<div class="wp-block-group lona-timeline"><?php foreach ( $lona_timeline as list( $lona_when, $lona_what ) ) : ?><!-- wp:group {"className":"lona-timeline__item","layout":{"type":"default"}} -->
<div class="wp-block-group lona-timeline__item"><!-- wp:paragraph {"className":"lona-timeline__date"} -->
<p class="lona-timeline__date"><?php echo esc_html( $lona_when ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"lona-timeline__text"} -->
<p class="lona-timeline__text"><?php echo esc_html( $lona_what ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --><?php endforeach; ?></div>
<!-- /wp:group -->

<!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'EXCELLENTIA, une ambition pour la jeunesse', 'fondation-lona' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Sous son impulsion, le programme de bourses EXCELLENTIA récompense les meilleurs lauréats de l\'Examen d\'État : au moins 85 % à l\'Examen d\'État, puis au moins 70 % au test de sélection de la Fondation. En août 2025, le programme comptait plus de 278 lauréats dans les universités congolaises et 113 à l\'étranger, dont 66 en France, 42 au Maroc et 5 aux États-Unis.', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"lona-source"} -->
<p class="lona-source"><?php esc_html_e( 'Sources : Organisation des Premières Dames d\'Afrique pour le Développement (OPDAD) ; actualite.cd, 14 août 2025 ; publications officielles de la Fondation LONA.', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/programmes/excellentia-rdc/' ) ); ?>"><?php esc_html_e( 'Découvrir EXCELLENTIA RDC', 'fondation-lona' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/a-propos/gouvernance-et-equipe/' ) ); ?>"><?php esc_html_e( 'Gouvernance et équipe', 'fondation-lona' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
