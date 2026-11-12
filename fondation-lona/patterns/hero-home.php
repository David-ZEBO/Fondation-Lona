<?php
/**
 * Title: Accueil — Hero immersif
 * Slug: fondation-lona/hero-home
 * Categories: lona-home, banner
 * Keywords: hero, accueil, bannière
 *
 * @package FondationLona
 */

$lona_img = esc_url( lona_fondation_photo_url( 'ceremonie-excellentia' ) );
?>
<!-- wp:cover {"url":"<?php echo $lona_img; ?>","dimRatio":100,"gradient":"navy-veil","minHeight":92,"minHeightUnit":"vh","focalPoint":{"x":0.6,"y":0.45},"contentPosition":"center left","isDark":true,"align":"full","className":"lona-hero","layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-cover alignfull has-custom-content-position is-position-center-left lona-hero" style="min-height:92vh"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient has-navy-veil-gradient-background"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo $lona_img; ?>" style="object-position:60% 45%" data-object-fit="cover" data-object-position="60% 45%"/><div class="wp-block-cover__inner-container"><!-- wp:group {"className":"lona-hero__content","layout":{"type":"default"}} -->
<div class="wp-block-group lona-hero__content"><!-- wp:paragraph {"className":"is-style-eyebrow lona-hero__eyebrow"} -->
<p class="is-style-eyebrow lona-hero__eyebrow"><?php esc_html_e( 'Fondation LONA · République démocratique du Congo', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"className":"lona-hero__title"} -->
<h1 class="wp-block-heading lona-hero__title"><?php echo wp_kses_post( __( 'Ensemble, semons les graines d\'un <em>avenir meilleur.</em>', 'fondation-lona' ) ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"lona-hero__lead"} -->
<p class="lona-hero__lead"><?php esc_html_e( 'Fondation LONA s\'engage pour une société où chaque personne a la possibilité de s\'épanouir, d\'apprendre et de contribuer au développement de sa communauté.', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"lona-hero__actions"} -->
<div class="wp-block-buttons lona-hero__actions"><!-- wp:button {"className":"is-style-gold"} -->
<div class="wp-block-button is-style-gold"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/a-propos/' ) ); ?>"><?php esc_html_e( 'Découvrir la Fondation', 'fondation-lona' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline-light"} -->
<div class="wp-block-button is-style-outline-light"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/nos-actions/' ) ); ?>"><?php esc_html_e( 'Explorer nos actions', 'fondation-lona' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
