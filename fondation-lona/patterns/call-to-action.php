<?php
/**
 * Title: Appel à l'engagement
 * Slug: fondation-lona/call-to-action
 * Categories: lona-home, call-to-action
 *
 * @package FondationLona
 */

$lona_actions = array(
	array( '/devenir-partenaire/', __( 'Devenir partenaire', 'fondation-lona' ), __( 'Institutions, entreprises, ONG : unissons nos expertises et nos ressources pour amplifier l\'impact.', 'fondation-lona' ), __( 'Proposer un partenariat', 'fondation-lona' ) ),
	array( '/nous-soutenir/', __( 'Faire un don', 'fondation-lona' ), __( 'Chaque contribution soutient directement l\'éducation, la santé et l\'autonomie des communautés.', 'fondation-lona' ), __( 'Soutenir la Fondation', 'fondation-lona' ) ),
	array( '/devenir-benevole/', __( 'Devenir bénévole', 'fondation-lona' ), __( 'Offrez votre temps et vos compétences lors de nos actions, formations et campagnes.', 'fondation-lona' ), __( 'Rejoindre les bénévoles', 'fondation-lona' ) ),
);
?>
<!-- wp:group {"tagName":"section","align":"full","className":"lona-section lona-section--cta","layout":{"type":"constrained","contentSize":"1240px"}} -->
<section class="wp-block-group alignfull lona-section lona-section--cta"><!-- wp:group {"className":"lona-section__intro","layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group lona-section__intro"><!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
<p class="has-text-align-center is-style-eyebrow"><?php esc_html_e( 'Agir avec nous', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","className":"is-style-editorial"} -->
<h2 class="wp-block-heading has-text-align-center is-style-editorial"><?php esc_html_e( 'Ensemble, faisons grandir l\'espoir.', 'fondation-lona' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","className":"lona-engage","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide lona-engage"><?php foreach ( $lona_actions as $lona_i => list( $lona_path, $lona_title, $lona_text, $lona_cta ) ) : ?><!-- wp:group {"className":"lona-engage__item","layout":{"type":"default"}} -->
<div class="wp-block-group lona-engage__item"><!-- wp:paragraph {"className":"lona-engage__num"} -->
<p class="lona-engage__num"><?php echo esc_html( '0' . ( $lona_i + 1 ) ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php echo esc_html( $lona_title ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php echo esc_html( $lona_text ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"<?php echo 1 === $lona_i ? 'is-style-gold' : 'is-style-link-arrow'; ?>"} -->
<div class="wp-block-button <?php echo 1 === $lona_i ? 'is-style-gold' : 'is-style-link-arrow'; ?>"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( $lona_path ) ); ?>"><?php echo esc_html( $lona_cta ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --><?php endforeach; ?></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
