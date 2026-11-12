<?php
/**
 * Page d'administration « Fondation LONA » : coordonnées, réseaux, chiffres d'impact,
 * formulaires, dons et logo clair.
 *
 * @package FondationLona
 */

defined( 'ABSPATH' ) || exit;

/**
 * Nombre d'indicateurs d'impact modifiables.
 */
const LONA_STATS_COUNT = 6;

/**
 * Définition des réglages par section.
 */
function lona_settings_schema(): array {
	$stats = array();
	$defaults = array(
		__( 'Personnes accompagnées', 'fondation-lona' ),
		__( 'Projets réalisés', 'fondation-lona' ),
		__( 'Communautés touchées', 'fondation-lona' ),
		__( 'Partenaires mobilisés', 'fondation-lona' ),
	);
	for ( $i = 1; $i <= LONA_STATS_COUNT; $i++ ) {
		/* translators: %d: numéro de l'indicateur */
		$stats[ 'stat_' . $i . '_label' ] = array( 'type' => 'text', 'label' => sprintf( __( 'Indicateur %d — intitulé', 'fondation-lona' ), $i ), 'placeholder' => $defaults[ $i - 1 ] ?? '' );
		/* translators: %d: numéro de l'indicateur */
		$stats[ 'stat_' . $i . '_value' ] = array( 'type' => 'number', 'label' => sprintf( __( 'Indicateur %d — valeur vérifiée', 'fondation-lona' ), $i ), 'help' => __( 'Laisser vide tant que la donnée n\'est pas validée : l\'indicateur ne sera pas affiché.', 'fondation-lona' ) );
		/* translators: %d: numéro de l'indicateur */
		$stats[ 'stat_' . $i . '_suffix' ] = array( 'type' => 'text', 'label' => sprintf( __( 'Indicateur %d — suffixe (ex. : +, %%)', 'fondation-lona' ), $i ) );
	}
	$stats['stats_source'] = array( 'type' => 'text', 'label' => __( 'Source / période des chiffres', 'fondation-lona' ), 'help' => __( 'Ex. : Rapport d\'activité 2025. Affiché sous les chiffres.', 'fondation-lona' ) );

	return array(
		'contact' => array(
			'title'  => __( 'Coordonnées officielles', 'fondation-lona' ),
			'fields' => array(
				'address' => array( 'type' => 'textarea', 'label' => __( 'Adresse', 'fondation-lona' ) ),
				'phone'   => array( 'type' => 'text', 'label' => __( 'Téléphone', 'fondation-lona' ) ),
				'email'   => array( 'type' => 'email', 'label' => __( 'E-mail de contact public', 'fondation-lona' ) ),
				'hours'   => array( 'type' => 'text', 'label' => __( 'Horaires d\'accueil', 'fondation-lona' ) ),
				'about_short' => array( 'type' => 'textarea', 'label' => __( 'Présentation courte (pied de page)', 'fondation-lona' ) ),
			),
		),
		'social'  => array(
			'title'  => __( 'Réseaux sociaux', 'fondation-lona' ),
			'fields' => array(
				'social_linkedin'  => array( 'type' => 'url', 'label' => 'LinkedIn', 'placeholder' => 'https://www.linkedin.com/company/fondationlona/' ),
				'social_facebook'  => array( 'type' => 'url', 'label' => 'Facebook' ),
				'social_instagram' => array( 'type' => 'url', 'label' => 'Instagram' ),
				'social_x'         => array( 'type' => 'url', 'label' => 'X (Twitter)' ),
				'social_youtube'   => array( 'type' => 'url', 'label' => 'YouTube' ),
			),
		),
		'stats'   => array(
			'title'  => __( 'Impact en chiffres', 'fondation-lona' ),
			'intro'  => __( 'Ne saisir que des chiffres vérifiés. Un indicateur sans valeur n\'est pas affiché.', 'fondation-lona' ),
			'fields' => $stats,
		),
		'forms'   => array(
			'title'  => __( 'Formulaires et dons', 'fondation-lona' ),
			'fields' => array(
				'notify_email' => array( 'type' => 'email', 'label' => __( 'E-mail de réception des formulaires', 'fondation-lona' ), 'help' => __( 'Par défaut : e-mail d\'administration du site.', 'fondation-lona' ) ),
				'donate_url'   => array( 'type' => 'url', 'label' => __( 'Lien de la plateforme de don en ligne', 'fondation-lona' ), 'help' => __( 'Plateforme sécurisée externe (ex. : HelloAsso, Stripe, PayPal). Le site ne collecte aucune donnée bancaire.', 'fondation-lona' ) ),
				'donate_info'  => array( 'type' => 'textarea', 'label' => __( 'Autres modalités de don (virement, mobile money…)', 'fondation-lona' ) ),
			),
		),
		'brand'   => array(
			'title'  => __( 'Identité', 'fondation-lona' ),
			'fields' => array(
				'logo_light' => array( 'type' => 'image', 'label' => __( 'Logo version claire (pour l\'en-tête transparent)', 'fondation-lona' ), 'help' => __( 'Le logo principal se règle dans Apparence > Éditeur > En-tête (bloc Logo du site).', 'fondation-lona' ) ),
			),
		),
	);
}

add_action(
	'admin_menu',
	static function () {
		add_menu_page( __( 'Fondation LONA', 'fondation-lona' ), __( 'Fondation LONA', 'fondation-lona' ), 'manage_options', 'lona-settings', 'lona_render_settings_page', 'dashicons-star-filled', 3 );
		add_submenu_page( 'lona-settings', __( 'Réglages', 'fondation-lona' ), __( 'Réglages', 'fondation-lona' ), 'manage_options', 'lona-settings', 'lona_render_settings_page' );
	}
);

add_action(
	'admin_init',
	static function () {
		register_setting(
			'lona_settings_group',
			'lona_settings',
			array( 'type' => 'array', 'sanitize_callback' => 'lona_sanitize_settings', 'default' => array() )
		);
	}
);

/**
 * Nettoyage des réglages.
 *
 * @param mixed $input Données soumises.
 */
function lona_sanitize_settings( $input ): array {
	$input = is_array( $input ) ? $input : array();
	$clean = array();
	foreach ( lona_settings_schema() as $section ) {
		foreach ( $section['fields'] as $key => $field ) {
			$value = $input[ $key ] ?? '';
			switch ( $field['type'] ) {
				case 'url':
					$clean[ $key ] = esc_url_raw( (string) $value );
					break;
				case 'email':
					$clean[ $key ] = sanitize_email( (string) $value );
					break;
				case 'textarea':
					$clean[ $key ] = sanitize_textarea_field( (string) $value );
					break;
				case 'number':
					$clean[ $key ] = '' === trim( (string) $value ) ? '' : (string) max( 0, (float) str_replace( array( ' ', ',' ), array( '', '.' ), (string) $value ) );
					break;
				case 'image':
					$clean[ $key ] = absint( $value );
					break;
				default:
					$clean[ $key ] = sanitize_text_field( (string) $value );
			}
		}
	}
	return $clean;
}

/**
 * Rendu de la page de réglages.
 */
function lona_render_settings_page(): void {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	$options = get_option( 'lona_settings', array() );
	?>
	<div class="wrap lona-settings">
		<h1><?php esc_html_e( 'Fondation LONA — Réglages', 'fondation-lona' ); ?></h1>
		<p class="lona-settings__intro"><?php esc_html_e( 'Ces informations alimentent automatiquement le pied de page, la page Contact, les chiffres d\'impact et les formulaires.', 'fondation-lona' ); ?></p>
		<form method="post" action="options.php">
			<?php settings_fields( 'lona_settings_group' ); ?>
			<?php foreach ( lona_settings_schema() as $section_id => $section ) : ?>
				<div class="lona-settings__card" id="lona-<?php echo esc_attr( $section_id ); ?>">
					<h2><?php echo esc_html( $section['title'] ); ?></h2>
					<?php if ( ! empty( $section['intro'] ) ) : ?>
						<p class="description"><?php echo esc_html( $section['intro'] ); ?></p>
					<?php endif; ?>
					<table class="form-table" role="presentation">
						<?php
						foreach ( $section['fields'] as $key => $field ) :
							$id    = 'lona-opt-' . $key;
							$name  = 'lona_settings[' . $key . ']';
							$value = $options[ $key ] ?? '';
							?>
							<tr>
								<th scope="row"><label for="<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $field['label'] ); ?></label></th>
								<td>
									<?php if ( 'textarea' === $field['type'] ) : ?>
										<textarea id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>" rows="3" class="large-text"><?php echo esc_textarea( (string) $value ); ?></textarea>
									<?php elseif ( 'image' === $field['type'] ) : ?>
										<input type="hidden" id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( (string) $value ); ?>" class="lona-image-input">
										<div class="lona-image-preview"><?php echo $value ? wp_get_attachment_image( (int) $value, 'medium' ) : ''; ?></div>
										<button type="button" class="button lona-image-button" data-target="<?php echo esc_attr( $id ); ?>"><?php esc_html_e( 'Choisir une image', 'fondation-lona' ); ?></button>
										<button type="button" class="button-link lona-image-remove" data-target="<?php echo esc_attr( $id ); ?>"><?php esc_html_e( 'Retirer', 'fondation-lona' ); ?></button>
									<?php else : ?>
										<input type="<?php echo esc_attr( 'number' === $field['type'] ? 'text' : $field['type'] ); ?>" <?php echo 'number' === $field['type'] ? 'inputmode="decimal"' : ''; ?> id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( (string) $value ); ?>" placeholder="<?php echo esc_attr( $field['placeholder'] ?? '' ); ?>" class="regular-text">
									<?php endif; ?>
									<?php if ( ! empty( $field['help'] ) ) : ?>
										<p class="description"><?php echo esc_html( $field['help'] ); ?></p>
									<?php endif; ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</table>
				</div>
			<?php endforeach; ?>
			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}

/**
 * Indicateurs d'impact renseignés (jamais de valeur inventée).
 *
 * @return array<int,array{label:string,value:string,suffix:string}>
 */
function lona_get_stats(): array {
	$stats = array();
	for ( $i = 1; $i <= LONA_STATS_COUNT; $i++ ) {
		$value = lona_opt( 'stat_' . $i . '_value' );
		$label = lona_opt( 'stat_' . $i . '_label' );
		if ( '' !== $value && '' !== $label ) {
			$stats[] = array( 'label' => $label, 'value' => (string) $value, 'suffix' => (string) lona_opt( 'stat_' . $i . '_suffix' ) );
		}
	}
	return $stats;
}
