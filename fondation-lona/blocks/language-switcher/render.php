<?php
/**
 * Bloc lona/language-switcher — s'appuie sur TranslatePress (recommandé) ou Polylang.
 *
 * TranslatePress : Réglages > TranslatePress > Langues : Français (par défaut),
 * English, Lingála. Il gère les URL par langue (/en/, /ln/) et les balises hreflang.
 *
 * @package FondationLona
 */

defined( 'ABSPATH' ) || exit;

$lona_switcher = '';
if ( shortcode_exists( 'language-switcher' ) ) {
	$lona_switcher = do_shortcode( '[language-switcher]' );
} elseif ( function_exists( 'pll_the_languages' ) ) {
	$lona_switcher = '<ul class="lona-lang__list">' . pll_the_languages( array( 'echo' => 0, 'display_names_as' => 'slug', 'hide_if_no_translation' => 0 ) ) . '</ul>';
}

if ( ! $lona_switcher ) {
	// Aide affichée uniquement dans l'éditeur (pas dans l'en-tête public).
	if ( ! wp_is_json_request() ) {
		return;
	}
	echo lona_editor_notice( __( 'Langues : installez TranslatePress pour activer le sélecteur FR / EN / LN.', 'fondation-lona' ) ); // phpcs:ignore WordPress.Security.EscapeOutput
	return;
}
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'lona-lang' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?> role="navigation" aria-label="<?php esc_attr_e( 'Choix de la langue', 'fondation-lona' ); ?>">
	<?php echo $lona_switcher; // phpcs:ignore WordPress.Security.EscapeOutput -- sortie de l'extension multilingue. ?>
</div>
