<?php
/**
 * Bloc lona/social-links — réseaux officiels (LinkedIn par défaut).
 *
 * @package FondationLona
 */

defined( 'ABSPATH' ) || exit;

$lona_links = lona_social_links();
if ( ! $lona_links ) {
	return;
}
?>
<ul <?php echo get_block_wrapper_attributes( array( 'class' => 'lona-social' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<?php foreach ( $lona_links as $lona_key => $lona_link ) : ?>
		<li>
			<a href="<?php echo esc_url( $lona_link['url'] ); ?>" target="_blank" rel="noopener noreferrer me">
				<?php echo lona_icon( $lona_key ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
				<span class="screen-reader-text"><?php echo esc_html( sprintf( /* translators: %s: réseau social */ __( 'Fondation LONA sur %s', 'fondation-lona' ), $lona_link['label'] ) ); ?></span>
			</a>
		</li>
	<?php endforeach; ?>
</ul>
