<?php
/**
 * Bloc lona/events — événements à venir / passés.
 *
 * @package FondationLona
 * @var array $attributes
 */

defined( 'ABSPATH' ) || exit;

$lona_today = current_time( 'Y-m-d' );
$lona_scope = (string) $attributes['scope'];
$lona_args  = array( 'meta_key' => 'lona_start_date', 'orderby' => 'meta_value', 'order' => 'upcoming' === $lona_scope ? 'ASC' : 'DESC' ); // phpcs:ignore WordPress.DB.SlowDBQuery
if ( 'all' !== $lona_scope ) {
	$lona_args['meta_query'] = array( // phpcs:ignore WordPress.DB.SlowDBQuery
		array( 'key' => 'lona_start_date', 'value' => $lona_today, 'compare' => 'upcoming' === $lona_scope ? '>=' : '<', 'type' => 'DATE' ),
	);
}
$lona_items = lona_query( 'lona_event', (int) $attributes['count'], '', $lona_args );
if ( ! $lona_items ) {
	if ( 'upcoming' === $lona_scope ) {
		echo '<p class="lona-empty">' . esc_html__( 'Aucun événement programmé pour le moment. Suivez nos actualités pour être informé des prochains rendez-vous.', 'fondation-lona' ) . '</p>';
	} else {
		echo lona_editor_notice( __( 'Aucun événement publié (pensez à renseigner la date de début).', 'fondation-lona' ) ); // phpcs:ignore WordPress.Security.EscapeOutput
	}
	return;
}
?>
<ol <?php echo get_block_wrapper_attributes( array( 'class' => 'lona-events' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<?php foreach ( $lona_items as $lona_post ) : ?>
		<?php
		$lona_start = (string) lona_meta( $lona_post->ID, 'start_date' );
		$lona_ts    = strtotime( $lona_start );
		$lona_place = lona_meta( $lona_post->ID, 'location' );
		$lona_time  = lona_meta( $lona_post->ID, 'time' );
		?>
		<li class="lona-event reveal">
			<time class="lona-event__date" datetime="<?php echo esc_attr( $lona_start ); ?>">
				<span class="lona-event__day"><?php echo esc_html( $lona_ts ? date_i18n( 'd', $lona_ts ) : '' ); ?></span>
				<span class="lona-event__month"><?php echo esc_html( $lona_ts ? date_i18n( 'M Y', $lona_ts ) : '' ); ?></span>
			</time>
			<div class="lona-event__body">
				<h3 class="lona-event__title"><a href="<?php echo esc_url( get_permalink( $lona_post ) ); ?>"><?php echo esc_html( get_the_title( $lona_post ) ); ?></a></h3>
				<p class="lona-event__meta">
					<?php if ( $lona_place ) : ?>
						<span><?php echo lona_icon( 'pin' ); // phpcs:ignore WordPress.Security.EscapeOutput ?><?php echo esc_html( $lona_place ); ?></span>
					<?php endif; ?>
					<?php if ( $lona_time ) : ?>
						<span><?php echo lona_icon( 'clock' ); // phpcs:ignore WordPress.Security.EscapeOutput ?><?php echo esc_html( $lona_time ); ?></span>
					<?php endif; ?>
				</p>
			</div>
			<a class="lona-event__more" href="<?php echo esc_url( get_permalink( $lona_post ) ); ?>" aria-hidden="true" tabindex="-1"><?php echo lona_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></a>
		</li>
	<?php endforeach; ?>
</ol>
