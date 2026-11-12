<?php
/**
 * Bloc lona/impact-stats — uniquement des chiffres vérifiés saisis par l'administration.
 *
 * @package FondationLona
 * @var array $attributes
 */

defined( 'ABSPATH' ) || exit;

$lona_stats = lona_get_stats();
if ( ! $lona_stats ) {
	echo lona_editor_notice( __( 'Chiffres d\'impact non renseignés : saisissez les valeurs vérifiées dans Fondation LONA > Réglages > Impact en chiffres. Rien n\'est affiché aux visiteurs tant qu\'aucune valeur n\'est validée.', 'fondation-lona' ) ); // phpcs:ignore WordPress.Security.EscapeOutput
	return;
}
$lona_source = lona_opt( 'stats_source' );
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'lona-stats lona-stats--' . sanitize_html_class( $attributes['tone'] ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<dl class="lona-stats__list">
		<?php foreach ( $lona_stats as $lona_stat ) : ?>
			<?php $lona_num = (float) $lona_stat['value']; ?>
			<div class="lona-stat reveal">
				<dt class="lona-stat__label"><?php echo esc_html( $lona_stat['label'] ); ?></dt>
				<dd class="lona-stat__value">
					<span class="lona-counter" data-target="<?php echo esc_attr( (string) $lona_num ); ?>"><?php echo esc_html( number_format_i18n( $lona_num, floor( $lona_num ) == $lona_num ? 0 : 1 ) ); ?></span><?php echo esc_html( $lona_stat['suffix'] ); ?>
				</dd>
			</div>
		<?php endforeach; ?>
	</dl>
	<?php if ( $lona_source ) : ?>
		<p class="lona-stats__source"><?php echo esc_html( $lona_source ); ?></p>
	<?php endif; ?>
</div>
