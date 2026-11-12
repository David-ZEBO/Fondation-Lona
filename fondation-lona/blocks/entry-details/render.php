<?php
/**
 * Bloc lona/entry-details — fiche d'un programme, d'une réalisation ou d'un événement.
 *
 * Les résultats ne sont publiés que si « Résultats vérifiés » est coché.
 *
 * @package FondationLona
 * @var array    $attributes
 * @var WP_Block $block
 */

defined( 'ABSPATH' ) || exit;

$lona_id   = (int) ( $block->context['postId'] ?? get_the_ID() );
$lona_type = $lona_id ? get_post_type( $lona_id ) : '';
if ( ! in_array( $lona_type, array( 'lona_program', 'lona_project', 'lona_event' ), true ) ) {
	echo lona_editor_notice( __( 'Fiche détaillée : s\'affiche sur les programmes, réalisations et événements.', 'fondation-lona' ) ); // phpcs:ignore WordPress.Security.EscapeOutput
	return;
}

$lona_facts = array();
$lona_place = lona_meta( $lona_id, 'location' );
if ( 'lona_event' === $lona_type ) {
	$lona_start = lona_format_date( (string) lona_meta( $lona_id, 'start_date' ) );
	$lona_end   = lona_format_date( (string) lona_meta( $lona_id, 'end_date' ) );
	if ( $lona_start ) {
		$lona_facts[] = array( 'calendar', __( 'Date', 'fondation-lona' ), $lona_end && $lona_end !== $lona_start ? $lona_start . ' – ' . $lona_end : $lona_start );
	}
	if ( lona_meta( $lona_id, 'time' ) ) {
		$lona_facts[] = array( 'clock', __( 'Horaires', 'fondation-lona' ), lona_meta( $lona_id, 'time' ) );
	}
} else {
	$lona_date = lona_format_date( (string) lona_meta( $lona_id, 'lona_project' === $lona_type ? 'date' : 'start_date' ), 'F Y' );
	if ( $lona_date ) {
		$lona_facts[] = array( 'calendar', 'lona_project' === $lona_type ? __( 'Date', 'fondation-lona' ) : __( 'Lancement', 'fondation-lona' ), $lona_date );
	}
}
if ( $lona_place ) {
	$lona_facts[] = array( 'pin', __( 'Lieu', 'fondation-lona' ), $lona_place );
}
$lona_program = (int) lona_meta( $lona_id, 'program' );

$lona_lines = static function ( string $text ): array {
	return array_filter( array_map( 'trim', explode( "\n", $text ) ) );
};
$lona_objectives = $lona_lines( (string) lona_meta( $lona_id, 'objectives' ) );
$lona_results    = lona_meta( $lona_id, 'verified' ) ? $lona_lines( (string) lona_meta( $lona_id, 'results' ) ) : array();
$lona_gallery    = array_filter( array_map( 'intval', (array) lona_meta( $lona_id, 'gallery' ) ) );
$lona_video      = (string) lona_meta( $lona_id, 'video' );
$lona_partners   = array_filter( array_map( 'intval', (array) lona_meta( $lona_id, 'partners' ) ) );
$lona_register   = (string) lona_meta( $lona_id, 'register_url' );
$lona_cta_url    = (string) lona_meta( $lona_id, 'cta_url' );
$lona_cta_label  = (string) lona_meta( $lona_id, 'cta_label' );
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'lona-details' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<?php if ( $lona_facts || $lona_program ) : ?>
		<dl class="lona-details__facts">
			<?php foreach ( $lona_facts as list( $lona_icon, $lona_label, $lona_value ) ) : ?>
				<div><dt><?php echo lona_icon( $lona_icon ); // phpcs:ignore WordPress.Security.EscapeOutput ?><?php echo esc_html( $lona_label ); ?></dt><dd><?php echo esc_html( $lona_value ); ?></dd></div>
			<?php endforeach; ?>
			<?php if ( $lona_program && 'publish' === get_post_status( $lona_program ) ) : ?>
				<div><dt><?php echo lona_icon( 'star' ); // phpcs:ignore WordPress.Security.EscapeOutput ?><?php esc_html_e( 'Programme', 'fondation-lona' ); ?></dt><dd><a href="<?php echo esc_url( get_permalink( $lona_program ) ); ?>"><?php echo esc_html( get_the_title( $lona_program ) ); ?></a></dd></div>
			<?php endif; ?>
		</dl>
	<?php endif; ?>

	<?php if ( $lona_register || $lona_cta_url ) : ?>
		<div class="wp-block-buttons"><div class="wp-block-button is-style-gold"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $lona_register ? $lona_register : $lona_cta_url ); ?>"><?php echo esc_html( $lona_register ? __( 'S\'inscrire', 'fondation-lona' ) : ( $lona_cta_label ? $lona_cta_label : __( 'Participer', 'fondation-lona' ) ) ); ?></a></div></div>
	<?php endif; ?>

	<?php if ( $lona_objectives ) : ?>
		<section class="lona-details__block">
			<h2 class="lona-details__heading"><?php esc_html_e( 'Objectifs', 'fondation-lona' ); ?></h2>
			<ul class="is-style-stars"><?php foreach ( $lona_objectives as $lona_line ) : ?><li><?php echo esc_html( $lona_line ); ?></li><?php endforeach; ?></ul>
		</section>
	<?php endif; ?>

	<?php if ( $lona_results ) : ?>
		<section class="lona-details__block lona-details__results">
			<h2 class="lona-details__heading"><?php esc_html_e( 'Résultats vérifiés', 'fondation-lona' ); ?></h2>
			<ul class="is-style-stars"><?php foreach ( $lona_results as $lona_line ) : ?><li><?php echo esc_html( $lona_line ); ?></li><?php endforeach; ?></ul>
		</section>
	<?php endif; ?>

	<?php if ( $lona_video ) : ?>
		<section class="lona-details__block">
			<h2 class="lona-details__heading"><?php esc_html_e( 'En vidéo', 'fondation-lona' ); ?></h2>
			<div class="lona-details__video"><?php echo wp_oembed_get( $lona_video ); // phpcs:ignore WordPress.Security.EscapeOutput -- HTML oEmbed fourni par WordPress. ?></div>
		</section>
	<?php endif; ?>

	<?php if ( $lona_gallery ) : ?>
		<section class="lona-details__block">
			<h2 class="lona-details__heading"><?php esc_html_e( 'En images', 'fondation-lona' ); ?></h2>
			<?php
			$lona_gallery_markup = '<!-- wp:gallery {"linkTo":"none","sizeSlug":"large","className":"lona-gallery"} --><figure class="wp-block-gallery has-nested-images columns-default is-cropped lona-gallery">';
			foreach ( $lona_gallery as $lona_img ) {
				$lona_gallery_markup .= '<!-- wp:image {"id":' . $lona_img . ',"sizeSlug":"large","linkDestination":"none","lightbox":{"enabled":true}} --><figure class="wp-block-image size-large">' . wp_get_attachment_image( $lona_img, 'large', false, array( 'class' => 'wp-image-' . $lona_img ) ) . '</figure><!-- /wp:image -->';
			}
			$lona_gallery_markup .= '</figure><!-- /wp:gallery -->';
			echo do_blocks( $lona_gallery_markup ); // phpcs:ignore WordPress.Security.EscapeOutput
			?>
		</section>
	<?php endif; ?>

	<?php if ( $lona_partners ) : ?>
		<section class="lona-details__block">
			<h2 class="lona-details__heading"><?php esc_html_e( 'Avec le soutien de', 'fondation-lona' ); ?></h2>
			<ul class="lona-partners lona-partners--compact">
				<?php foreach ( $lona_partners as $lona_pid ) : ?>
					<?php if ( 'publish' !== get_post_status( $lona_pid ) ) { continue; } ?>
					<li class="lona-partner"><?php echo has_post_thumbnail( $lona_pid ) ? get_the_post_thumbnail( $lona_pid, 'lona-logo', array( 'alt' => get_the_title( $lona_pid ) ) ) : '<span class="lona-partner__wordmark">' . esc_html( get_the_title( $lona_pid ) ) . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput ?></li>
				<?php endforeach; ?>
			</ul>
		</section>
	<?php endif; ?>
</div>
