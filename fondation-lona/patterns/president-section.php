<?php
/**
 * Title: Accueil — La Présidente
 * Slug: fondation-lona/president-section
 * Categories: lona-home, about
 *
 * Faits issus de sources publiques : OPDAD (oaflad.org), actualite.cd, LinkedIn de la Fondation.
 *
 * @package FondationLona
 */

$lona_img = esc_url( lona_fondation_photo_url( 'presidente-femmes-isam' ) );
?>
<!-- wp:group {"tagName":"section","align":"full","backgroundColor":"deep","textColor":"white","className":"lona-section lona-section--president","layout":{"type":"constrained","contentSize":"1240px"}} -->
<section class="wp-block-group alignfull lona-section lona-section--president has-white-color has-deep-background-color has-text-color has-background"><!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"lona-split"} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center lona-split"><!-- wp:column {"verticalAlignment":"center","width":"42%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:42%"><!-- wp:image {"sizeSlug":"large","className":"is-style-arch lona-president__photo"} -->
<figure class="wp-block-image size-large is-style-arch lona-president__photo"><img src="<?php echo $lona_img; ?>" alt="<?php esc_attr_e( 'Denise Nyakeru Tshisekedi, Première Dame de la RDC et Présidente de la Fondation LONA', 'fondation-lona' ); ?>"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"58%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:58%"><!-- wp:paragraph {"className":"is-style-eyebrow"} -->
<p class="is-style-eyebrow"><?php esc_html_e( 'La Présidente-fondatrice', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textColor":"white","className":"is-style-editorial"} -->
<h2 class="wp-block-heading is-style-editorial has-white-color has-text-color"><?php esc_html_e( 'Denise Nyakeru Tshisekedi', 'fondation-lona' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"is-style-lead lona-president__lead"} -->
<p class="is-style-lead lona-president__lead"><?php esc_html_e( 'Première Dame de la République démocratique du Congo depuis 2019, Son Excellence Madame Denise Nyakeru Tshisekedi a créé la Fondation en mai 2019, sous le nom de Fondation Denise Nyakeru Tshisekedi (FDNT), pour l\'autonomisation des femmes et des filles congolaises.', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Devenue Fondation LONA — « lona » signifie « semer » en lingala —, elle place aujourd\'hui l\'éducation et l\'excellence de la jeunesse congolaise au cœur de son action.', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"is-style-stars lona-president__facts"} -->
<ul class="wp-block-list is-style-stars lona-president__facts"><!-- wp:list-item -->
<li><?php esc_html_e( 'Ambassadrice de bonne volonté du Fonds des Nations Unies pour la population (UNFPA) depuis mai 2019, pour la lutte contre les violences basées sur le genre et l\'autonomisation des femmes.', 'fondation-lona' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'Désignée en décembre 2019 « Championne mondiale pour la prévention des violences sexuelles liées aux conflits » par le Bureau de la Représentante spéciale du Secrétaire général des Nations Unies.', 'fondation-lona' ); ?></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-gold"} -->
<div class="wp-block-button is-style-gold"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/a-propos/la-presidente/' ) ); ?>"><?php esc_html_e( 'Découvrir la Présidente', 'fondation-lona' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></section>
<!-- /wp:group -->
