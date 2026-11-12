<?php
/**
 * Bloc lona/form — formulaires sécurisés (voir inc/forms.php).
 *
 * @package FondationLona
 * @var array $attributes
 */

defined( 'ABSPATH' ) || exit;

echo lona_render_form( (string) $attributes['type'], get_block_wrapper_attributes() ); // phpcs:ignore WordPress.Security.EscapeOutput
