<?php
/**
 * Title: Accueil — Domaines d'intervention (composition éditoriale)
 * Slug: fondation-lona/domains-section
 * Categories: lona-home, lona-sections
 *
 * @package FondationLona
 */

?>
<!-- wp:group {"tagName":"section","align":"full","backgroundColor":"light","className":"lona-section lona-section--domains","layout":{"type":"constrained","contentSize":"1240px"}} -->
<section class="wp-block-group alignfull lona-section lona-section--domains has-light-background-color has-background"><!-- wp:group {"className":"lona-section__intro","layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group lona-section__intro"><!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
<p class="has-text-align-center is-style-eyebrow"><?php esc_html_e( 'Nos domaines d\'intervention', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Agir là où les besoins sont essentiels', 'fondation-lona' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php esc_html_e( 'Cinq domaines complémentaires pour accompagner chaque personne, de l\'école à l\'autonomie.', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","className":"lona-domains","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide lona-domains"><!-- wp:group {"tagName":"article","className":"lona-domain lona-domain--education","layout":{"type":"default"}} -->
<article class="wp-block-group lona-domain lona-domain--education"><!-- wp:image {"sizeSlug":"large","className":"lona-domain__image"} -->
<figure class="wp-block-image size-large lona-domain__image"><img src="<?php echo esc_url( lona_fondation_photo_url( 'test-ecriture' ) ); ?>" alt="<?php esc_attr_e( 'Une candidate concentrée pendant un test de sélection EXCELLENTIA', 'fondation-lona' ); ?>"/></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"lona-domain__body","layout":{"type":"default"}} -->
<div class="wp-block-group lona-domain__body"><!-- wp:paragraph {"className":"lona-domain__index"} -->
<p class="lona-domain__index">01</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"className":"lona-domain__title"} -->
<h3 class="wp-block-heading lona-domain__title"><a href="<?php echo esc_url( home_url( '/nos-actions/education/' ) ); ?>"><?php esc_html_e( 'Éducation et excellence', 'fondation-lona' ); ?></a></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"lona-domain__text"} -->
<p class="lona-domain__text"><?php esc_html_e( 'Accompagner élèves et étudiants vers la réussite et révéler les talents, notamment à travers EXCELLENTIA RDC.', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></article>
<!-- /wp:group -->

<!-- wp:group {"tagName":"article","className":"lona-domain lona-domain--sante","layout":{"type":"default"}} -->
<article class="wp-block-group lona-domain lona-domain--sante"><!-- wp:image {"sizeSlug":"large","className":"lona-domain__image"} -->
<figure class="wp-block-image size-large lona-domain__image"><img src="<?php echo esc_url( lona_fondation_photo_url( lona_domain_photos()['sante'][0] ) ); ?>" alt="<?php echo esc_attr( lona_domain_photos()['sante'][1] ); ?>"/></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"lona-domain__body","layout":{"type":"default"}} -->
<div class="wp-block-group lona-domain__body"><!-- wp:paragraph {"className":"lona-domain__index"} -->
<p class="lona-domain__index">02</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"className":"lona-domain__title"} -->
<h3 class="wp-block-heading lona-domain__title"><a href="<?php echo esc_url( home_url( '/nos-actions/sante/' ) ); ?>"><?php esc_html_e( 'Santé et bien-être', 'fondation-lona' ); ?></a></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"lona-domain__text"} -->
<p class="lona-domain__text"><?php esc_html_e( 'Favoriser l\'accès aux soins, la prévention et la sensibilisation, notamment avec FOCUS CANCER.', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></article>
<!-- /wp:group -->

<!-- wp:group {"tagName":"article","className":"lona-domain lona-domain--vbg","layout":{"type":"default"}} -->
<article class="wp-block-group lona-domain lona-domain--vbg"><!-- wp:image {"sizeSlug":"large","className":"lona-domain__image"} -->
<figure class="wp-block-image size-large lona-domain__image"><img src="<?php echo esc_url( lona_fondation_photo_url( lona_domain_photos()['vbg'][0] ) ); ?>" alt="<?php echo esc_attr( lona_domain_photos()['vbg'][1] ); ?>"/></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"lona-domain__body","layout":{"type":"default"}} -->
<div class="wp-block-group lona-domain__body"><!-- wp:paragraph {"className":"lona-domain__index"} -->
<p class="lona-domain__index">03</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"className":"lona-domain__title"} -->
<h3 class="wp-block-heading lona-domain__title"><a href="<?php echo esc_url( home_url( '/nos-actions/lutte-contre-les-vbg/' ) ); ?>"><?php esc_html_e( 'Lutte contre les VBG', 'fondation-lona' ); ?></a></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"lona-domain__text"} -->
<p class="lona-domain__text"><?php esc_html_e( 'Prévenir les violences basées sur le genre, sensibiliser et orienter vers un accompagnement adapté.', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></article>
<!-- /wp:group -->

<!-- wp:group {"tagName":"article","className":"lona-domain lona-domain--autonomisation","layout":{"type":"default"}} -->
<article class="wp-block-group lona-domain lona-domain--autonomisation"><!-- wp:image {"sizeSlug":"large","className":"lona-domain__image"} -->
<figure class="wp-block-image size-large lona-domain__image"><img src="<?php echo esc_url( lona_fondation_photo_url( lona_domain_photos()['autonomisation'][0] ) ); ?>" alt="<?php echo esc_attr( lona_domain_photos()['autonomisation'][1] ); ?>"/></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"lona-domain__body","layout":{"type":"default"}} -->
<div class="wp-block-group lona-domain__body"><!-- wp:paragraph {"className":"lona-domain__index"} -->
<p class="lona-domain__index">04</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"className":"lona-domain__title"} -->
<h3 class="wp-block-heading lona-domain__title"><a href="<?php echo esc_url( home_url( '/nos-actions/autonomisation-des-femmes/' ) ); ?>"><?php esc_html_e( 'Autonomisation des femmes', 'fondation-lona' ); ?></a></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"lona-domain__text"} -->
<p class="lona-domain__text"><?php esc_html_e( 'Renforcer les compétences, l\'entrepreneuriat et le leadership des femmes.', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></article>
<!-- /wp:group -->

<!-- wp:group {"tagName":"article","className":"lona-domain lona-domain--inclusion","layout":{"type":"default"}} -->
<article class="wp-block-group lona-domain lona-domain--inclusion"><!-- wp:image {"sizeSlug":"large","className":"lona-domain__image"} -->
<figure class="wp-block-image size-large lona-domain__image"><img src="<?php echo esc_url( lona_fondation_photo_url( lona_domain_photos()['inclusion'][0] ) ); ?>" alt="<?php echo esc_attr( lona_domain_photos()['inclusion'][1] ); ?>"/></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"lona-domain__body","layout":{"type":"default"}} -->
<div class="wp-block-group lona-domain__body"><!-- wp:paragraph {"className":"lona-domain__index"} -->
<p class="lona-domain__index">05</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"className":"lona-domain__title"} -->
<h3 class="wp-block-heading lona-domain__title"><a href="<?php echo esc_url( home_url( '/nos-actions/inclusion-sociale/' ) ); ?>"><?php esc_html_e( 'Inclusion et solidarité', 'fondation-lona' ); ?></a></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"lona-domain__text"} -->
<p class="lona-domain__text"><?php esc_html_e( 'Soutenir les personnes vulnérables et favoriser leur pleine participation à la vie de la communauté.', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></article>
<!-- /wp:group -->

</div>
<!-- /wp:group --></section>
<!-- /wp:group -->
