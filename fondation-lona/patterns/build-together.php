<?php
/**
 * Title: Accueil — Bâtir ensemble
 * Slug: fondation-lona/build-together
 * Categories: lona-home, call-to-action
 *
 * @package FondationLona
 */

$lona_img = esc_url( lona_fondation_photo_url( 'journee-lubumbashi' ) );
?>
<!-- wp:cover {"url":"<?php echo $lona_img; ?>","dimRatio":70,"overlayColor":"primary","minHeight":620,"contentPosition":"center center","isDark":true,"align":"full","className":"lona-build","layout":{"type":"constrained","contentSize":"860px"}} -->
<div class="wp-block-cover alignfull lona-build" style="min-height:620px"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-70 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo $lona_img; ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
<p class="has-text-align-center is-style-eyebrow"><?php esc_html_e( 'Bâtir ensemble', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","className":"is-style-editorial lona-build__title"} -->
<h2 class="wp-block-heading has-text-align-center is-style-editorial lona-build__title"><?php esc_html_e( 'Bâtir ensemble un avenir plus équitable.', 'fondation-lona' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"is-style-lead"} -->
<p class="has-text-align-center is-style-lead"><?php esc_html_e( 'Le changement durable commence lorsque les femmes, les jeunes et les communautés disposent des moyens nécessaires pour construire leur avenir.', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-gold"} -->
<div class="wp-block-button is-style-gold"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/devenir-partenaire/' ) ); ?>"><?php esc_html_e( 'Devenir partenaire', 'fondation-lona' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover -->
