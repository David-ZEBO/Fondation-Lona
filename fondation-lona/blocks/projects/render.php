<?php
/**
 * Bloc lona/projects — réalisations en modules photographiques asymétriques.
 *
 * Grille à 12 colonnes à rythme fixe (grand / moyen / petit) : asymétrique mais alignée.
 *
 * @package FondationLona
 * @var array $attributes
 */

defined( 'ABSPATH' ) || exit;

$lona_items = lona_query( 'lona_project', (int) $attributes['count'], (string) $attributes['domain'] );
if ( ! $lona_items ) {
	echo lona_editor_notice( __( 'Aucune réalisation publiée. Ajoutez-en dans Réalisations > Ajouter.', 'fondation-lona' ) ); // phpcs:ignore WordPress.Security.EscapeOutput
	return;
}
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'lona-projects lona-projects--n' . count( $lona_items ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<?php foreach ( $lona_items as $lona_post ) : ?>
		<?php
		$lona_place  = lona_meta( $lona_post->ID, 'location' );
		$lona_date   = lona_format_date( (string) lona_meta( $lona_post->ID, 'date' ), 'F Y' );
		$lona_result = lona_meta( $lona_post->ID, 'verified' ) ? strtok( (string) lona_meta( $lona_post->ID, 'results' ), "\n" ) : '';
		?>
		<article class="lona-project reveal">
			<a class="lona-project__link" href="<?php echo esc_url( get_permalink( $lona_post ) ); ?>">
				<?php echo lona_post_image( $lona_post->ID, 'lona-wide' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
				<div class="lona-project__overlay">
					<p class="lona-project__meta">
						<?php if ( $lona_place ) : ?>
							<span><?php echo lona_icon( 'pin' ); // phpcs:ignore WordPress.Security.EscapeOutput ?><?php echo esc_html( $lona_place ); ?></span>
						<?php endif; ?>
						<?php if ( $lona_date ) : ?>
							<span><?php echo lona_icon( 'calendar' ); // phpcs:ignore WordPress.Security.EscapeOutput ?><?php echo esc_html( $lona_date ); ?></span>
						<?php endif; ?>
					</p>
					<h3 class="lona-project__title"><?php echo esc_html( get_the_title( $lona_post ) ); ?></h3>
					<p class="lona-project__text"><?php echo esc_html( wp_trim_words( get_the_excerpt( $lona_post ), 22 ) ); ?></p>
					<?php if ( $lona_result ) : ?>
						<p class="lona-project__result"><?php echo lona_icon( 'star' ); // phpcs:ignore WordPress.Security.EscapeOutput ?><?php echo esc_html( $lona_result ); ?></p>
					<?php endif; ?>
				</div>
			</a>
		</article>
	<?php endforeach; ?>
</div>
