<?php
/**
 * Title: Pied de page institutionnel
 * Slug: fondation-lona/footer
 * Categories: footer
 * Block Types: core/template-part/footer
 * Inserter: false
 *
 * @package FondationLona
 */

$lona_u = static fn( string $path ): string => esc_url( home_url( $path ) );
?>
<!-- wp:group {"className":"site-footer__main","layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group site-footer__main"><!-- wp:columns {"className":"site-footer__cols"} -->
<div class="wp-block-columns site-footer__cols"><!-- wp:column {"width":"34%","className":"site-footer__brand"} -->
<div class="wp-block-column site-footer__brand" style="flex-basis:34%"><!-- wp:site-logo {"width":180,"shouldSyncIcon":false} /-->

<!-- wp:paragraph {"className":"site-footer__signature"} -->
<p class="site-footer__signature"><?php esc_html_e( '« Ensemble, semons l\'excellence. »', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"site-footer__about"} -->
<p class="site-footer__about"><?php esc_html_e( 'Fondée en 2019 à Kinshasa par la Première Dame Denise Nyakeru Tshisekedi, la Fondation LONA œuvre pour une société congolaise dynamique où la femme est libre, forte et valorisée : éducation, santé, lutte contre les violences basées sur le genre et autonomisation de la femme.', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:lona/social-links /--></div>
<!-- /wp:column -->

<!-- wp:column {"className":"site-footer__nav"} -->
<div class="wp-block-column site-footer__nav"><!-- wp:heading {"level":2,"className":"site-footer__title"} -->
<h2 class="wp-block-heading site-footer__title"><?php esc_html_e( 'La Fondation', 'fondation-lona' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:list {"className":"site-footer__links"} -->
<ul class="wp-block-list site-footer__links"><!-- wp:list-item -->
<li><a href="<?php echo $lona_u( '/a-propos/' ); ?>"><?php esc_html_e( 'À propos', 'fondation-lona' ); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="<?php echo $lona_u( '/programmes/' ); ?>"><?php esc_html_e( 'Nos programmes', 'fondation-lona' ); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="<?php echo $lona_u( '/realisations/' ); ?>"><?php esc_html_e( 'Nos réalisations', 'fondation-lona' ); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="<?php echo $lona_u( '/actualites/' ); ?>"><?php esc_html_e( 'Actualités', 'fondation-lona' ); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="<?php echo $lona_u( '/evenements/' ); ?>"><?php esc_html_e( 'Événements', 'fondation-lona' ); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="<?php echo $lona_u( '/nos-partenaires/' ); ?>"><?php esc_html_e( 'Nos partenaires', 'fondation-lona' ); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="<?php echo $lona_u( '/contact/' ); ?>"><?php esc_html_e( 'Contact', 'fondation-lona' ); ?></a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"site-footer__nav"} -->
<div class="wp-block-column site-footer__nav"><!-- wp:heading {"level":2,"className":"site-footer__title"} -->
<h2 class="wp-block-heading site-footer__title"><?php esc_html_e( 'Nos domaines', 'fondation-lona' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:list {"className":"site-footer__links"} -->
<ul class="wp-block-list site-footer__links"><!-- wp:list-item -->
<li><a href="<?php echo $lona_u( '/nos-actions/education/' ); ?>"><?php esc_html_e( 'Éducation et excellence', 'fondation-lona' ); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="<?php echo $lona_u( '/nos-actions/sante/' ); ?>"><?php esc_html_e( 'Santé et bien-être', 'fondation-lona' ); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="<?php echo $lona_u( '/nos-actions/lutte-contre-les-vbg/' ); ?>"><?php esc_html_e( 'Lutte contre les VBG', 'fondation-lona' ); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="<?php echo $lona_u( '/nos-actions/autonomisation-des-femmes/' ); ?>"><?php esc_html_e( 'Autonomisation des femmes', 'fondation-lona' ); ?></a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="<?php echo $lona_u( '/nos-actions/inclusion-sociale/' ); ?>"><?php esc_html_e( 'Inclusion sociale', 'fondation-lona' ); ?></a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"30%","className":"site-footer__contact"} -->
<div class="wp-block-column site-footer__contact" style="flex-basis:30%"><!-- wp:heading {"level":2,"className":"site-footer__title"} -->
<h2 class="wp-block-heading site-footer__title"><?php esc_html_e( 'Nous contacter', 'fondation-lona' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:lona/contact-info {"layout":"footer"} /-->

<!-- wp:heading {"level":2,"className":"site-footer__title"} -->
<h2 class="wp-block-heading site-footer__title"><?php esc_html_e( 'Newsletter', 'fondation-lona' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:lona/form {"type":"newsletter"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"site-footer__bottom","layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group site-footer__bottom"><!-- wp:group {"className":"site-footer__bottom-inner","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group site-footer__bottom-inner"><!-- wp:lona/copyright /-->

<!-- wp:paragraph {"className":"site-footer__legal"} -->
<p class="site-footer__legal"><a href="<?php echo $lona_u( '/mentions-legales/' ); ?>"><?php esc_html_e( 'Mentions légales', 'fondation-lona' ); ?></a><a href="<?php echo $lona_u( '/politique-de-confidentialite/' ); ?>"><?php esc_html_e( 'Politique de confidentialité', 'fondation-lona' ); ?></a><a href="#lona-cookies" data-lona-cookies=""><?php esc_html_e( 'Gérer les cookies', 'fondation-lona' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
