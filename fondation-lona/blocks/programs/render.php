<?php
/**
 * Bloc lona/programs — programmes en composition éditoriale.
 *
 * @package FondationLona
 * @var array $attributes
 */

defined( 'ABSPATH' ) || exit;

$lona_items = lona_query( 'lona_program', (int) $attributes['count'], (string) $attributes['domain'], array( 'orderby' => array( 'menu_order' => 'ASC', 'date' => 'DESC' ) ) );
if ( ! $lona_items ) {
	echo lona_editor_notice( __( 'Aucun programme publié. Ajoutez-en dans Programmes > Ajouter.', 'fondation-lona' ) ); // phpcs:ignore WordPress.Security.EscapeOutput
	return;
}
$lona_status = array( 'active' => __( 'En cours', 'fondation-lona' ), 'upcoming' => __( 'À venir', 'fondation-lona' ), 'done' => __( 'Terminé', 'fondation-lona' ) );
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'lona-programs lona-programs--' . sanitize_html_class( $attributes['layout'] ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<?php foreach ( $lona_items as $lona_i => $lona_post ) : ?>
		<?php
		$lona_link   = get_permalink( $lona_post );
		$lona_tag    = lona_meta( $lona_post->ID, 'tagline' );
		$lona_state  = lona_meta( $lona_post->ID, 'status' );
		$lona_domain = lona_post_domain_label( $lona_post->ID );
		?>
		<article class="lona-program reveal">
			<a class="lona-program__media" href="<?php echo esc_url( $lona_link ); ?>" tabindex="-1" aria-hidden="true">
				<?php echo lona_post_image( $lona_post->ID, 0 === $lona_i ? 'lona-wide' : 'lona-card' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
			</a>
			<div class="lona-program__body">
				<p class="lona-program__index" aria-hidden="true"><?php echo esc_html( str_pad( (string) ( $lona_i + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></p>
				<?php if ( $lona_domain || isset( $lona_status[ $lona_state ] ) ) : ?>
					<p class="lona-kicker">
						<?php echo esc_html( $lona_domain ); ?>
						<?php if ( isset( $lona_status[ $lona_state ] ) ) : ?>
							<span class="lona-badge"><?php echo esc_html( $lona_status[ $lona_state ] ); ?></span>
						<?php endif; ?>
					</p>
				<?php endif; ?>
				<h3 class="lona-program__title"><a href="<?php echo esc_url( $lona_link ); ?>"><?php echo esc_html( get_the_title( $lona_post ) ); ?></a></h3>
				<p class="lona-program__text"><?php echo esc_html( $lona_tag ? $lona_tag : wp_trim_words( get_the_excerpt( $lona_post ), 28 ) ); ?></p>
				<a class="lona-link-arrow" href="<?php echo esc_url( $lona_link ); ?>">
					<?php esc_html_e( 'Découvrir le programme', 'fondation-lona' ); ?><span class="screen-reader-text"> : <?php echo esc_html( get_the_title( $lona_post ) ); ?></span>
					<?php echo lona_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
				</a>
			</div>
		</article>
	<?php endforeach; ?>
</div>
