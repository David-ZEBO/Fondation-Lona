<?php
/**
 * Title: Page — Nous soutenir
 * Slug: fondation-lona/page-support
 * Categories: lona-pages
 * Post Types: page
 *
 * @package FondationLona
 */

?>
<!-- wp:paragraph {"className":"is-style-lead"} -->
<p class="is-style-lead"><?php esc_html_e( 'Votre soutien permet à la Fondation LONA de poursuivre et d\'amplifier ses actions en faveur de l\'éducation, de la santé, de l\'autonomisation des femmes et de l\'inclusion.', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:columns {"align":"wide","className":"lona-support"} -->
<div class="wp-block-columns alignwide lona-support"><!-- wp:column {"className":"is-style-card"} -->
<div class="wp-block-column is-style-card"><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading"><?php esc_html_e( 'Faire un don', 'fondation-lona' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:lona/donate /--></div>
<!-- /wp:column -->

<!-- wp:column {"className":"is-style-card"} -->
<div class="wp-block-column is-style-card"><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading"><?php esc_html_e( 'Devenir partenaire', 'fondation-lona' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Mécénat, partenariat technique ou financier : construisons ensemble des projets à fort impact.', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/devenir-partenaire/' ) ); ?>"><?php esc_html_e( 'Proposer un partenariat', 'fondation-lona' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"is-style-card"} -->
<div class="wp-block-column is-style-card"><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading"><?php esc_html_e( 'Devenir bénévole', 'fondation-lona' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Donnez de votre temps et de vos compétences lors de nos actions sur le terrain.', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/devenir-benevole/' ) ); ?>"><?php esc_html_e( 'Je m\'engage', 'fondation-lona' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
