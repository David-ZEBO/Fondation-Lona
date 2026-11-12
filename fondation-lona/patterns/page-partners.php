<?php
/**
 * Title: Page — Nos partenaires
 * Slug: fondation-lona/page-partners
 * Categories: lona-pages
 * Post Types: page
 *
 * @package FondationLona
 */

?>
<!-- wp:paragraph {"className":"is-style-lead"} -->
<p class="is-style-lead"><?php esc_html_e( 'Institutions publiques, organisations internationales, partenaires techniques et financiers, entreprises et associations : nos actions reposent sur des partenariats de confiance.', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:lona/partners {"showNames":true,"align":"wide"} /-->

<!-- wp:group {"className":"is-style-card lona-inline-cta","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group is-style-card lona-inline-cta"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Rejoindre nos partenaires', 'fondation-lona' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-gold"} -->
<div class="wp-block-button is-style-gold"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/devenir-partenaire/' ) ); ?>"><?php esc_html_e( 'Devenir partenaire', 'fondation-lona' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
