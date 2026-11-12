<?php
/**
 * Bloc lona/donate — don en ligne via une plateforme externe sécurisée.
 *
 * @package FondationLona
 */

defined( 'ABSPATH' ) || exit;

$lona_url  = lona_opt( 'donate_url' );
$lona_info = lona_opt( 'donate_info' );
if ( ! $lona_url && ! $lona_info ) {
	echo '<div ' . get_block_wrapper_attributes( array( 'class' => 'lona-donate' ) ) . '><p>' . esc_html__( 'Pour soutenir financièrement la Fondation, contactez-nous : nous vous communiquerons les modalités de don.', 'fondation-lona' ) . '</p>'; // phpcs:ignore WordPress.Security.EscapeOutput
	echo lona_editor_notice( __( 'Renseignez le lien de don en ligne dans Fondation LONA > Réglages > Formulaires et dons.', 'fondation-lona' ) ) . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput
	return;
}
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'lona-donate' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<?php if ( $lona_url ) : ?>
		<div class="wp-block-buttons"><div class="wp-block-button is-style-gold"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $lona_url ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Faire un don en ligne', 'fondation-lona' ); ?></a></div></div>
		<p class="lona-donate__secure"><?php esc_html_e( 'Paiement traité par une plateforme sécurisée. Aucune donnée bancaire n\'est collectée par ce site.', 'fondation-lona' ); ?></p>
	<?php endif; ?>
	<?php if ( $lona_info ) : ?>
		<div class="lona-donate__info"><?php echo wp_kses_post( wpautop( esc_html( $lona_info ) ) ); ?></div>
	<?php endif; ?>
</div>
