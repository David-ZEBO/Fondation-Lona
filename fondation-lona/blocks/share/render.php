<?php
/**
 * Bloc lona/share — liens de partage simples (aucun script tiers, aucun traceur).
 *
 * @package FondationLona
 */

defined( 'ABSPATH' ) || exit;

$lona_url   = is_singular() ? get_permalink() : home_url( add_query_arg( array() ) );
$lona_title = is_singular() ? get_the_title() : wp_get_document_title();
$lona_enc_u = rawurlencode( (string) $lona_url );
$lona_enc_t = rawurlencode( wp_strip_all_tags( (string) $lona_title ) );
$lona_links = array(
	'linkedin' => array( 'LinkedIn', 'https://www.linkedin.com/sharing/share-offsite/?url=' . $lona_enc_u ),
	'facebook' => array( 'Facebook', 'https://www.facebook.com/sharer/sharer.php?u=' . $lona_enc_u ),
	'x'        => array( 'X', 'https://x.com/intent/post?url=' . $lona_enc_u . '&text=' . $lona_enc_t ),
	'whatsapp' => array( 'WhatsApp', 'https://wa.me/?text=' . $lona_enc_t . '%20' . $lona_enc_u ),
	'mail'     => array( __( 'E-mail', 'fondation-lona' ), 'mailto:?subject=' . $lona_enc_t . '&body=' . $lona_enc_u ),
);
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'lona-share' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<p class="lona-share__label"><?php esc_html_e( 'Partager', 'fondation-lona' ); ?></p>
	<ul>
		<?php foreach ( $lona_links as $lona_key => list( $lona_label, $lona_href ) ) : ?>
			<li><a href="<?php echo esc_url( $lona_href ); ?>" <?php echo 'mail' === $lona_key ? '' : 'target="_blank" rel="noopener noreferrer"'; ?>><?php echo lona_icon( $lona_key ); // phpcs:ignore WordPress.Security.EscapeOutput ?><span class="screen-reader-text"><?php echo esc_html( sprintf( /* translators: %s: réseau */ __( 'Partager sur %s', 'fondation-lona' ), $lona_label ) ); ?></span></a></li>
		<?php endforeach; ?>
		<li><button type="button" class="lona-share__copy" data-url="<?php echo esc_url( $lona_url ); ?>"><?php echo lona_icon( 'link' ); // phpcs:ignore WordPress.Security.EscapeOutput ?><span class="screen-reader-text"><?php esc_html_e( 'Copier le lien', 'fondation-lona' ); ?></span></button></li>
	</ul>
</div>
