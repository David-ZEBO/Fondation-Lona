<?php
/**
 * Bloc lona/partners — logos administrables (aucun partenaire inventé).
 *
 * @package FondationLona
 * @var array $attributes
 */

defined( 'ABSPATH' ) || exit;

$lona_extra = array( 'orderby' => array( 'menu_order' => 'ASC', 'title' => 'ASC' ) );
if ( ! empty( $attributes['featuredOnly'] ) ) {
	$lona_extra['meta_query'] = array( array( 'key' => 'lona_featured', 'value' => '1' ) ); // phpcs:ignore WordPress.DB.SlowDBQuery
}
$lona_items = lona_query( 'lona_partner', 24, '', $lona_extra );
if ( ! $lona_items ) {
	echo lona_editor_notice( __( 'Aucun partenaire publié. Ajoutez les partenaires officiels dans Partenaires > Ajouter (logo = image principale).', 'fondation-lona' ) ); // phpcs:ignore WordPress.Security.EscapeOutput
	return;
}
?>
<ul <?php echo get_block_wrapper_attributes( array( 'class' => 'lona-partners' . ( ! empty( $attributes['showNames'] ) ? ' lona-partners--named' : '' ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<?php foreach ( $lona_items as $lona_post ) : ?>
		<?php
		$lona_url  = lona_meta( $lona_post->ID, 'url' );
		$lona_name = get_the_title( $lona_post );
		$lona_logo = has_post_thumbnail( $lona_post )
			? get_the_post_thumbnail( $lona_post, 'lona-logo', array( 'alt' => $lona_name, 'loading' => 'lazy' ) )
			: '<span class="lona-partner__wordmark">' . esc_html( $lona_name ) . '</span>';
		?>
		<li class="lona-partner">
			<?php if ( $lona_url ) : ?>
				<a href="<?php echo esc_url( $lona_url ); ?>" target="_blank" rel="noopener noreferrer"><?php echo $lona_logo; // phpcs:ignore WordPress.Security.EscapeOutput ?><span class="screen-reader-text"> <?php esc_html_e( '(nouvel onglet)', 'fondation-lona' ); ?></span></a>
			<?php else : ?>
				<?php echo $lona_logo; // phpcs:ignore WordPress.Security.EscapeOutput ?>
			<?php endif; ?>
			<?php if ( ! empty( $attributes['showNames'] ) ) : ?>
				<p class="lona-partner__name"><?php echo esc_html( $lona_name ); ?></p>
				<?php if ( $lona_post->post_excerpt ) : ?>
					<p class="lona-partner__desc"><?php echo esc_html( $lona_post->post_excerpt ); ?></p>
				<?php endif; ?>
			<?php endif; ?>
		</li>
	<?php endforeach; ?>
</ul>
