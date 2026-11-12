<?php
/**
 * Title: Accueil — Galerie photo et vidéo
 * Slug: fondation-lona/gallery-section
 * Categories: lona-home, gallery
 * Description: Ajoutez les photos officielles dans la galerie (ouverture en grand format activée) et une vidéo YouTube/Vimeo.
 *
 * @package FondationLona
 */

?>
<!-- wp:group {"tagName":"section","align":"full","className":"lona-section lona-section--gallery","layout":{"type":"constrained","contentSize":"1240px"}} -->
<section class="wp-block-group alignfull lona-section lona-section--gallery"><!-- wp:group {"className":"lona-section__head","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group lona-section__head"><!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-eyebrow"} -->
<p class="is-style-eyebrow"><?php esc_html_e( 'Galerie', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'Activités, événements, campagnes et formations', 'fondation-lona' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:gallery {"columns":4,"linkTo":"none","sizeSlug":"large","align":"wide","className":"lona-gallery"} -->
<figure class="wp-block-gallery alignwide has-nested-images columns-4 is-cropped lona-gallery"></figure>
<!-- /wp:gallery -->

<!-- wp:embed {"providerNameSlug":"youtube","type":"video","responsive":true,"align":"wide","className":"wp-embed-aspect-16-9 wp-has-aspect-ratio lona-video"} /--></section>
<!-- /wp:group -->
