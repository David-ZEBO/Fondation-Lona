<?php
/**
 * Bloc lona/contact-info — coordonnées officielles issues des réglages.
 *
 * @package FondationLona
 * @var array $attributes
 */

defined( 'ABSPATH' ) || exit;

$lona_address = lona_opt( 'address' );
$lona_phone   = lona_opt( 'phone' );
$lona_email   = lona_opt( 'email' );
$lona_hours   = lona_opt( 'hours' );

if ( ! $lona_address && ! $lona_phone && ! $lona_email ) {
	echo lona_editor_notice( __( 'Coordonnées officielles à renseigner dans Fondation LONA > Réglages.', 'fondation-lona' ) ); // phpcs:ignore WordPress.Security.EscapeOutput
	return;
}
?>
<address <?php echo get_block_wrapper_attributes( array( 'class' => 'lona-contact lona-contact--' . sanitize_html_class( $attributes['layout'] ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<ul>
		<?php if ( $lona_address ) : ?>
			<li><?php echo lona_icon( 'pin' ); // phpcs:ignore WordPress.Security.EscapeOutput ?><span><?php echo nl2br( esc_html( $lona_address ) ); ?></span></li>
		<?php endif; ?>
		<?php if ( $lona_phone ) : ?>
			<li><?php echo lona_icon( 'phone' ); // phpcs:ignore WordPress.Security.EscapeOutput ?><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $lona_phone ) ); ?>"><?php echo esc_html( $lona_phone ); ?></a></li>
		<?php endif; ?>
		<?php if ( $lona_email ) : ?>
			<li><?php echo lona_icon( 'mail' ); // phpcs:ignore WordPress.Security.EscapeOutput ?><a href="mailto:<?php echo esc_attr( antispambot( $lona_email ) ); ?>"><?php echo esc_html( antispambot( $lona_email ) ); ?></a></li>
		<?php endif; ?>
		<?php if ( $lona_hours ) : ?>
			<li><?php echo lona_icon( 'clock' ); // phpcs:ignore WordPress.Security.EscapeOutput ?><span><?php echo esc_html( $lona_hours ); ?></span></li>
		<?php endif; ?>
	</ul>
</address>
