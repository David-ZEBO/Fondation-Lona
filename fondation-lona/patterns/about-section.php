<?php
/**
 * Title: Accueil — Présentation de la Fondation
 * Slug: fondation-lona/about-section
 * Categories: lona-home, about
 *
 * @package FondationLona
 */

$lona_img = esc_url( lona_fondation_photo_url( 'inauguration-atelier-isam' ) );
?>
<!-- wp:group {"tagName":"section","align":"full","className":"lona-section lona-section--about","layout":{"type":"constrained","contentSize":"1240px"}} -->
<section class="wp-block-group alignfull lona-section lona-section--about"><!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"lona-split"} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center lona-split"><!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:paragraph {"className":"is-style-eyebrow"} -->
<p class="is-style-eyebrow"><?php esc_html_e( 'Qui sommes-nous', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"is-style-editorial"} -->
<h2 class="wp-block-heading is-style-editorial"><?php esc_html_e( 'Semer aujourd\'hui, transformer demain.', 'fondation-lona' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"is-style-lead"} -->
<p class="is-style-lead"><?php esc_html_e( 'La Fondation LONA est engagée dans le développement humain et social en République démocratique du Congo.', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Fondée en 2019 et basée à Kinshasa, elle agit pour l\'éducation, la santé, la lutte contre les violences basées sur le genre et l\'autonomisation de la femme, avec une attention particulière portée aux jeunes et aux personnes vulnérables.', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"is-style-stars lona-about__pillars"} -->
<ul class="wp-block-list is-style-stars lona-about__pillars"><!-- wp:list-item -->
<li><strong><?php esc_html_e( 'Vision', 'fondation-lona' ); ?></strong> — <?php esc_html_e( 'une société congolaise dynamique où la femme est libre, forte et valorisée.', 'fondation-lona' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong><?php esc_html_e( 'Engagement', 'fondation-lona' ); ?></strong> — <?php esc_html_e( 'agir là où les besoins sont essentiels, aux côtés des communautés.', 'fondation-lona' ); ?></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/a-propos/' ) ); ?>"><?php esc_html_e( 'En savoir plus', 'fondation-lona' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:image {"sizeSlug":"large","className":"is-style-framed"} -->
<figure class="wp-block-image size-large is-style-framed"><img src="<?php echo $lona_img; ?>" alt="<?php esc_attr_e( 'La Présidente de la Fondation LONA inaugure l\'atelier industriel de couture de l\'ISAM à Kinshasa', 'fondation-lona' ); ?>"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></section>
<!-- /wp:group -->
