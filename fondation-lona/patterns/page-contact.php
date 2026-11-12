<?php
/**
 * Title: Page — Contact
 * Slug: fondation-lona/page-contact
 * Categories: lona-pages
 * Post Types: page
 *
 * @package FondationLona
 */

?>
<!-- wp:columns {"align":"wide","className":"lona-form-page"} -->
<div class="wp-block-columns alignwide lona-form-page"><!-- wp:column {"width":"38%"} -->
<div class="wp-block-column" style="flex-basis:38%"><!-- wp:paragraph {"className":"is-style-lead"} -->
<p class="is-style-lead"><?php esc_html_e( 'Une question, une demande d\'information ou une proposition ? Écrivez-nous, notre équipe vous répondra.', 'fondation-lona' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:lona/contact-info /-->

<!-- wp:lona/social-links /--></div>
<!-- /wp:column -->

<!-- wp:column {"width":"62%"} -->
<div class="wp-block-column" style="flex-basis:62%"><!-- wp:lona/form {"type":"contact"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
