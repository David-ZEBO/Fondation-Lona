<?php
/**
 * Title: Page — À propos
 * Slug: fondation-lona/page-about
 * Categories: lona-pages
 * Post Types: page
 *
 * @package FondationLona
 */

?>
<!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"lona-split"} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center lona-split"><!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%"><!-- wp:paragraph {"className":"is-style-eyebrow"} -->
<p class="is-style-eyebrow"><?php esc_html_e( 'Notre histoire', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"is-style-editorial"} -->
<h2 class="wp-block-heading is-style-editorial"><?php esc_html_e( 'Ensemble, semons l\'excellence.', 'fondation-lona' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"is-style-lead"} -->
<p class="is-style-lead"><?php esc_html_e( 'Fondée en mai 2019 par Son Excellence Madame Denise Nyakeru Tshisekedi, Première Dame de la République démocratique du Congo, et basée à Kinshasa, la Fondation LONA s\'appelait à l\'origine Fondation Denise Nyakeru Tshisekedi (FDNT). « Lona » signifie « semer » en lingala.', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Ses axes d\'intervention sont l\'éducation, la santé, la lutte contre les violences basées sur le genre et l\'autonomisation de la femme. Elle accompagne également l\'inclusion des personnes vulnérables, comme les personnes vivant avec un handicap.', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"lona-mission"} -->
<blockquote class="wp-block-quote lona-mission"><!-- wp:paragraph -->
<p><?php echo esc_html( lona_official_mission() ); ?></p>
<!-- /wp:paragraph --><cite><?php esc_html_e( 'Mission de la Fondation LONA', 'fondation-lona' ); ?></cite></blockquote>
<!-- /wp:quote --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%"><!-- wp:image {"sizeSlug":"large","className":"is-style-arch"} -->
<figure class="wp-block-image size-large is-style-arch"><img src="<?php echo esc_url( lona_fondation_photo_url( 'laureate-toge' ) ); ?>" alt="<?php esc_attr_e( 'Une lauréate EXCELLENTIA en toge lors de la cérémonie de remise des prix', 'fondation-lona' ); ?>"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"align":"full","backgroundColor":"light","className":"lona-section","layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group alignfull lona-section has-light-background-color has-background"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Nos valeurs', 'fondation-lona' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:columns {"align":"wide","className":"lona-values"} -->
<div class="wp-block-columns alignwide lona-values"><?php foreach ( array( __( 'Travail', 'fondation-lona' ), __( 'Éthique', 'fondation-lona' ), __( 'Patience', 'fondation-lona' ), __( 'Persévérance', 'fondation-lona' ) ) as $lona_value ) : ?><!-- wp:column {"className":"is-style-card"} -->
<div class="wp-block-column is-style-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php echo esc_html( $lona_value ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Une valeur inscrite au cœur de la mission de la Fondation.', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --><?php endforeach; ?></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/a-propos/vision-et-mission/' ) ); ?>"><?php esc_html_e( 'Notre vision et notre mission', 'fondation-lona' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/a-propos/gouvernance-et-equipe/' ) ); ?>"><?php esc_html_e( 'Gouvernance et équipe', 'fondation-lona' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
