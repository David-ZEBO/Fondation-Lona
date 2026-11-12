<?php
/**
 * Bloc lona/team — gouvernance et équipe.
 *
 * @package FondationLona
 * @var array $attributes
 */

defined( 'ABSPATH' ) || exit;

$lona_extra = array( 'orderby' => array( 'menu_order' => 'ASC', 'title' => 'ASC' ) );
if ( ! empty( $attributes['group'] ) ) {
	$lona_extra['tax_query'] = array( array( 'taxonomy' => 'lona_team_group', 'field' => 'slug', 'terms' => sanitize_title( $attributes['group'] ) ) ); // phpcs:ignore WordPress.DB.SlowDBQuery
}
$lona_items = lona_query( 'lona_team', 24, '', $lona_extra );
if ( ! $lona_items ) {
	echo lona_editor_notice( __( 'Aucun membre publié. Ajoutez les membres dans Équipe > Ajouter.', 'fondation-lona' ) ); // phpcs:ignore WordPress.Security.EscapeOutput
	return;
}
?>
<ul <?php echo get_block_wrapper_attributes( array( 'class' => 'lona-team' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<?php foreach ( $lona_items as $lona_post ) : ?>
		<?php $lona_li = lona_meta( $lona_post->ID, 'linkedin' ); ?>
		<li class="lona-member reveal">
			<div class="lona-member__photo"><?php echo lona_post_image( $lona_post->ID, 'lona-portrait', array( 'alt' => get_the_title( $lona_post ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?></div>
			<h3 class="lona-member__name"><?php echo esc_html( get_the_title( $lona_post ) ); ?></h3>
			<p class="lona-member__role"><?php echo esc_html( (string) lona_meta( $lona_post->ID, 'role' ) ); ?></p>
			<?php if ( $lona_post->post_content ) : ?>
				<div class="lona-member__bio"><?php echo wp_kses_post( wpautop( wp_trim_words( $lona_post->post_content, 40 ) ) ); ?></div>
			<?php endif; ?>
			<?php if ( $lona_li ) : ?>
				<a class="lona-member__linkedin" href="<?php echo esc_url( $lona_li ); ?>" target="_blank" rel="noopener noreferrer">
					<?php echo lona_icon( 'linkedin' ); // phpcs:ignore WordPress.Security.EscapeOutput ?><span class="screen-reader-text"><?php echo esc_html( sprintf( /* translators: %s: nom */ __( 'Profil LinkedIn de %s', 'fondation-lona' ), get_the_title( $lona_post ) ) ); ?></span>
				</a>
			<?php endif; ?>
		</li>
	<?php endforeach; ?>
</ul>
