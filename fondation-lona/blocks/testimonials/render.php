<?php
/**
 * Bloc lona/testimonials — seuls les témoignages avec autorisation sont affichés.
 *
 * @package FondationLona
 * @var array $attributes
 */

defined( 'ABSPATH' ) || exit;

$lona_items = lona_query(
	'lona_testimonial',
	(int) $attributes['count'],
	(string) $attributes['domain'],
	array(
		'orderby'    => array( 'menu_order' => 'ASC', 'date' => 'DESC' ),
		'meta_query' => array_filter( // phpcs:ignore WordPress.DB.SlowDBQuery
			array(
				array( 'key' => 'lona_consent', 'value' => '1' ),
				// Sur la fiche d'un programme : uniquement ses témoignages.
				is_singular( 'lona_program' ) ? array( 'key' => 'lona_program', 'value' => (string) get_queried_object_id() ) : null,
			)
		),
	)
);
if ( ! $lona_items ) {
	echo lona_editor_notice( __( 'Aucun témoignage autorisé. Ajoutez-en dans Témoignages et cochez « Autorisation écrite de publication obtenue ».', 'fondation-lona' ) ); // phpcs:ignore WordPress.Security.EscapeOutput
	return;
}
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'lona-testimonials lona-testimonials--n' . count( $lona_items ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<?php foreach ( $lona_items as $lona_post ) : ?>
		<?php
		$lona_anon    = (bool) lona_meta( $lona_post->ID, 'anonymous' );
		$lona_role    = lona_meta( $lona_post->ID, 'role' );
		$lona_program = (int) lona_meta( $lona_post->ID, 'program' );
		?>
		<figure class="lona-testimonial reveal">
			<?php echo lona_icon( 'quote' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
			<blockquote class="lona-testimonial__quote"><?php echo wp_kses_post( wpautop( $lona_post->post_content ) ); ?></blockquote>
			<figcaption class="lona-testimonial__author">
				<?php if ( ! $lona_anon && has_post_thumbnail( $lona_post ) ) : ?>
					<?php echo get_the_post_thumbnail( $lona_post, 'thumbnail', array( 'class' => 'lona-testimonial__photo', 'alt' => '', 'loading' => 'lazy' ) ); ?>
				<?php endif; ?>
				<span>
					<strong><?php echo esc_html( $lona_anon ? __( 'Témoignage anonyme', 'fondation-lona' ) : get_the_title( $lona_post ) ); ?></strong>
					<?php if ( $lona_role ) : ?>
						<span class="lona-testimonial__role"><?php echo esc_html( $lona_role ); ?></span>
					<?php endif; ?>
					<?php if ( $lona_program && 'publish' === get_post_status( $lona_program ) ) : ?>
						<a class="lona-testimonial__program" href="<?php echo esc_url( get_permalink( $lona_program ) ); ?>"><?php echo esc_html( get_the_title( $lona_program ) ); ?></a>
					<?php endif; ?>
				</span>
			</figcaption>
		</figure>
	<?php endforeach; ?>
</div>
