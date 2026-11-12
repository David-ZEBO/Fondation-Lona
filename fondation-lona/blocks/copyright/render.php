<?php
/**
 * Bloc lona/copyright — année toujours à jour.
 *
 * @package FondationLona
 */

defined( 'ABSPATH' ) || exit;
?>
<p <?php echo get_block_wrapper_attributes( array( 'class' => 'lona-copyright' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>. <?php esc_html_e( 'Tous droits réservés.', 'fondation-lona' ); ?></p>
