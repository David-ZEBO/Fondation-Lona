<?php
/**
 * Title: Accueil — Impact en chiffres
 * Slug: fondation-lona/impact-stats
 * Categories: lona-home, lona-sections
 *
 * @package FondationLona
 */

?>
<!-- wp:group {"tagName":"section","align":"full","backgroundColor":"primary","textColor":"white","className":"lona-section lona-section--impact","layout":{"type":"constrained","contentSize":"1240px"}} -->
<section class="wp-block-group alignfull lona-section lona-section--impact has-white-color has-primary-background-color has-text-color has-background"><!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"34%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:34%"><!-- wp:paragraph {"className":"is-style-eyebrow"} -->
<p class="is-style-eyebrow"><?php esc_html_e( 'Notre impact', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textColor":"white"} -->
<h2 class="wp-block-heading has-white-color has-text-color"><?php esc_html_e( 'L\'impact en chiffres', 'fondation-lona' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Des résultats mesurés et vérifiés, au service de la transparence envers nos partenaires et nos bénéficiaires.', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"66%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66%"><!-- wp:lona/impact-stats /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></section>
<!-- /wp:group -->
