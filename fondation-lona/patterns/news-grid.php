<?php
/**
 * Title: Accueil — Actualités et engagements
 * Slug: fondation-lona/news-grid
 * Categories: lona-home, query
 * Keywords: actualités, articles, blog
 *
 * @package FondationLona
 */

?>
<!-- wp:group {"tagName":"section","align":"full","className":"lona-section lona-section--news","layout":{"type":"constrained","contentSize":"1240px"}} -->
<section class="wp-block-group alignfull lona-section lona-section--news"><!-- wp:group {"className":"lona-section__head","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group lona-section__head"><!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-eyebrow"} -->
<p class="is-style-eyebrow"><?php esc_html_e( 'Actualités', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'Nos actualités et nos engagements', 'fondation-lona' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-link-arrow"} -->
<div class="wp-block-button is-style-link-arrow"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/actualites/' ) ); ?>"><?php esc_html_e( 'Toutes nos actualités', 'fondation-lona' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:query {"queryId":11,"query":{"perPage":4,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"align":"wide","className":"lona-news"} -->
<div class="wp-block-query alignwide lona-news"><!-- wp:post-template {"className":"lona-news__list"} -->
<!-- wp:group {"tagName":"article","className":"lona-news__card","layout":{"type":"default"}} -->
<article class="wp-block-group lona-news__card"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/3","sizeSlug":"lona-card","className":"lona-news__image"} /-->

<!-- wp:group {"className":"lona-news__body","layout":{"type":"default"}} -->
<div class="wp-block-group lona-news__body"><!-- wp:group {"className":"lona-news__meta","layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group lona-news__meta"><!-- wp:post-terms {"term":"category"} /-->

<!-- wp:post-date /--></div>
<!-- /wp:group -->

<!-- wp:post-title {"level":3,"isLink":true,"className":"lona-news__title"} /-->

<!-- wp:post-excerpt {"excerptLength":24,"className":"lona-news__excerpt"} /-->

<!-- wp:read-more {"content":"<?php esc_attr_e( 'Lire l\'article', 'fondation-lona' ); ?>","className":"lona-news__more"} /--></div>
<!-- /wp:group --></article>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"className":"lona-empty"} -->
<p class="lona-empty"><?php esc_html_e( 'Les premières actualités de la Fondation seront publiées très prochainement.', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></section>
<!-- /wp:group -->
