<?php
/**
 * Title: Accueil — Nos programmes
 * Slug: fondation-lona/programs-grid
 * Categories: lona-home, lona-sections
 *
 * @package FondationLona
 */

?>
<!-- wp:group {"tagName":"section","align":"full","className":"lona-section lona-section--programs","layout":{"type":"constrained","contentSize":"1240px"}} -->
<section class="wp-block-group alignfull lona-section lona-section--programs"><!-- wp:group {"className":"lona-section__head","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group lona-section__head"><!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-eyebrow"} -->
<p class="is-style-eyebrow"><?php esc_html_e( 'Nos programmes', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'Des programmes qui changent des vies', 'fondation-lona' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-link-arrow"} -->
<div class="wp-block-button is-style-link-arrow"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/programmes/' ) ); ?>"><?php esc_html_e( 'Tous nos programmes', 'fondation-lona' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:lona/programs {"count":4,"align":"wide"} /--></section>
<!-- /wp:group -->
