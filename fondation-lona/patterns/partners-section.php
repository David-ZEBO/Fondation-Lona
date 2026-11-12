<?php
/**
 * Title: Accueil — Partenaires
 * Slug: fondation-lona/partners-section
 * Categories: lona-home, lona-sections
 *
 * @package FondationLona
 */

?>
<!-- wp:group {"tagName":"section","align":"full","className":"lona-section lona-section--partners","layout":{"type":"constrained","contentSize":"1240px"}} -->
<section class="wp-block-group alignfull lona-section lona-section--partners"><!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
<p class="has-text-align-center is-style-eyebrow"><?php esc_html_e( 'Ils nous font confiance', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Nos partenaires', 'fondation-lona' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:lona/partners {"featuredOnly":true,"align":"wide"} /-->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-link-arrow"} -->
<div class="wp-block-button is-style-link-arrow"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/nos-partenaires/' ) ); ?>"><?php esc_html_e( 'Découvrir nos partenaires', 'fondation-lona' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></section>
<!-- /wp:group -->
