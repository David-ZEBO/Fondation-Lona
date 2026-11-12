<?php
/**
 * Formulaires : contact, partenariat, bénévolat, newsletter.
 *
 * Sécurité : nonce WordPress, champ piège (honeypot), délai minimal signé,
 * limitation de débit par IP (hachée), nettoyage/validation de chaque champ,
 * consentement RGPD obligatoire. Les demandes sont stockées en privé
 * (Fondation LONA > Demandes reçues) et notifiées par e-mail.
 *
 * @package FondationLona
 */

defined( 'ABSPATH' ) || exit;

/**
 * Définition des formulaires.
 *
 * @return array<string,array>
 */
function lona_forms(): array {
	$domains = lona_domains();
	$consent = array( 'type' => 'consent', 'label' => __( 'J\'accepte que mes données soient utilisées par la Fondation LONA pour traiter ma demande, conformément à la politique de confidentialité.', 'fondation-lona' ), 'required' => true );

	return array(
		'contact'    => array(
			'title'   => __( 'Formulaire de contact', 'fondation-lona' ),
			'submit'  => __( 'Envoyer le message', 'fondation-lona' ),
			'success' => __( 'Merci, votre message a bien été envoyé. Nous vous répondrons dans les meilleurs délais.', 'fondation-lona' ),
			'fields'  => array(
				'name'    => array( 'type' => 'text', 'label' => __( 'Nom et prénom', 'fondation-lona' ), 'required' => true, 'autocomplete' => 'name' ),
				'email'   => array( 'type' => 'email', 'label' => __( 'Adresse e-mail', 'fondation-lona' ), 'required' => true, 'autocomplete' => 'email' ),
				'phone'   => array( 'type' => 'tel', 'label' => __( 'Téléphone', 'fondation-lona' ), 'autocomplete' => 'tel' ),
				'subject' => array( 'type' => 'select', 'label' => __( 'Objet', 'fondation-lona' ), 'required' => true, 'options' => array( __( 'Demande d\'information', 'fondation-lona' ), __( 'Partenariat', 'fondation-lona' ), __( 'Presse et médias', 'fondation-lona' ), __( 'Programmes', 'fondation-lona' ), __( 'Autre', 'fondation-lona' ) ) ),
				'message' => array( 'type' => 'textarea', 'label' => __( 'Message', 'fondation-lona' ), 'required' => true, 'wide' => true ),
				'consent' => $consent,
			),
		),
		'partner'    => array(
			'title'   => __( 'Proposition de partenariat', 'fondation-lona' ),
			'submit'  => __( 'Envoyer la proposition', 'fondation-lona' ),
			'success' => __( 'Merci pour votre intérêt. Notre équipe partenariats reviendra vers vous rapidement.', 'fondation-lona' ),
			'fields'  => array(
				'organization' => array( 'type' => 'text', 'label' => __( 'Organisation', 'fondation-lona' ), 'required' => true, 'autocomplete' => 'organization' ),
				'name'         => array( 'type' => 'text', 'label' => __( 'Nom et prénom', 'fondation-lona' ), 'required' => true, 'autocomplete' => 'name' ),
				'position'     => array( 'type' => 'text', 'label' => __( 'Fonction', 'fondation-lona' ), 'autocomplete' => 'organization-title' ),
				'email'        => array( 'type' => 'email', 'label' => __( 'Adresse e-mail professionnelle', 'fondation-lona' ), 'required' => true, 'autocomplete' => 'email' ),
				'phone'        => array( 'type' => 'tel', 'label' => __( 'Téléphone', 'fondation-lona' ), 'autocomplete' => 'tel' ),
				'country'      => array( 'type' => 'text', 'label' => __( 'Pays', 'fondation-lona' ), 'autocomplete' => 'country-name' ),
				'kind'         => array( 'type' => 'select', 'label' => __( 'Type de partenariat', 'fondation-lona' ), 'required' => true, 'options' => array( __( 'Partenariat technique', 'fondation-lona' ), __( 'Partenariat financier', 'fondation-lona' ), __( 'Partenariat institutionnel', 'fondation-lona' ), __( 'Mécénat d\'entreprise', 'fondation-lona' ), __( 'Autre', 'fondation-lona' ) ) ),
				'domains'      => array( 'type' => 'checkboxes', 'label' => __( 'Domaines d\'intérêt', 'fondation-lona' ), 'options' => array_values( $domains ), 'wide' => true ),
				'message'      => array( 'type' => 'textarea', 'label' => __( 'Présentation de votre proposition', 'fondation-lona' ), 'required' => true, 'wide' => true ),
				'consent'      => $consent,
			),
		),
		'volunteer'  => array(
			'title'   => __( 'Candidature bénévole', 'fondation-lona' ),
			'submit'  => __( 'Envoyer ma candidature', 'fondation-lona' ),
			'success' => __( 'Merci pour votre engagement ! Nous étudions votre candidature et vous recontacterons.', 'fondation-lona' ),
			'fields'  => array(
				'name'         => array( 'type' => 'text', 'label' => __( 'Nom et prénom', 'fondation-lona' ), 'required' => true, 'autocomplete' => 'name' ),
				'email'        => array( 'type' => 'email', 'label' => __( 'Adresse e-mail', 'fondation-lona' ), 'required' => true, 'autocomplete' => 'email' ),
				'phone'        => array( 'type' => 'tel', 'label' => __( 'Téléphone', 'fondation-lona' ), 'required' => true, 'autocomplete' => 'tel' ),
				'city'         => array( 'type' => 'text', 'label' => __( 'Ville', 'fondation-lona' ), 'autocomplete' => 'address-level2' ),
				'availability' => array( 'type' => 'select', 'label' => __( 'Disponibilité', 'fondation-lona' ), 'required' => true, 'options' => array( __( 'Ponctuelle (événements)', 'fondation-lona' ), __( 'Quelques heures par mois', 'fondation-lona' ), __( 'Quelques heures par semaine', 'fondation-lona' ), __( 'À distance', 'fondation-lona' ) ) ),
				'domains'      => array( 'type' => 'checkboxes', 'label' => __( 'Domaines qui vous intéressent', 'fondation-lona' ), 'options' => array_values( $domains ), 'wide' => true ),
				'skills'       => array( 'type' => 'textarea', 'label' => __( 'Compétences et expériences', 'fondation-lona' ), 'required' => true, 'wide' => true ),
				'consent'      => $consent,
			),
		),
		'newsletter' => array(
			'title'   => __( 'Newsletter', 'fondation-lona' ),
			'submit'  => __( 'S\'inscrire', 'fondation-lona' ),
			'success' => __( 'Merci ! Votre inscription à la newsletter est enregistrée.', 'fondation-lona' ),
			'fields'  => array(
				'email'   => array( 'type' => 'email', 'label' => __( 'Votre adresse e-mail', 'fondation-lona' ), 'required' => true, 'autocomplete' => 'email' ),
				'consent' => array( 'type' => 'consent', 'label' => __( 'J\'accepte de recevoir les actualités de la Fondation. Désinscription possible à tout moment.', 'fondation-lona' ), 'required' => true ),
			),
		),
	);
}

/**
 * Jeton temporel signé (anti-robots : envoi trop rapide ou formulaire trop ancien).
 */
function lona_form_timestamp(): string {
	$time = (string) time();
	return $time . '.' . wp_hash( 'lona_form_ts|' . $time );
}

/**
 * Rendu HTML d'un formulaire.
 *
 * @param string $type         Type de formulaire.
 * @param string $wrapper_attr Attributs du conteneur (bloc).
 */
function lona_render_form( string $type, string $wrapper_attr = '' ): string {
	$forms = lona_forms();
	if ( ! isset( $forms[ $type ] ) ) {
		return '';
	}
	$form    = $forms[ $type ];
	$uid     = 'lona-form-' . $type;
	$status  = isset( $_GET['lona_form'], $_GET['lona_status'] ) && $type === sanitize_key( wp_unslash( $_GET['lona_form'] ) ) ? sanitize_key( wp_unslash( $_GET['lona_status'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification
	$errors  = array(
		'invalid' => __( 'Certains champs obligatoires sont manquants ou invalides. Merci de vérifier votre saisie.', 'fondation-lona' ),
		'expired' => __( 'La session a expiré. Merci de renvoyer le formulaire.', 'fondation-lona' ),
		'limit'   => __( 'Trop d\'envois en peu de temps. Merci de réessayer dans quelques minutes.', 'fondation-lona' ),
		'error'   => __( 'Une erreur est survenue. Merci de réessayer ou de nous écrire directement.', 'fondation-lona' ),
	);

	ob_start();
	?>
	<div <?php echo $wrapper_attr; // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<form id="<?php echo esc_attr( $uid ); ?>" class="lona-form lona-form--<?php echo esc_attr( $type ); ?>" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
		<?php if ( 'success' === $status ) : ?>
			<div class="lona-form__notice is-success" role="status" tabindex="-1"><?php echo esc_html( $form['success'] ); ?></div>
		<?php elseif ( isset( $errors[ $status ] ) ) : ?>
			<div class="lona-form__notice is-error" role="alert" tabindex="-1"><?php echo esc_html( $errors[ $status ] ); ?></div>
		<?php endif; ?>

		<input type="hidden" name="action" value="lona_form">
		<input type="hidden" name="lona_type" value="<?php echo esc_attr( $type ); ?>">
		<input type="hidden" name="lona_ts" value="<?php echo esc_attr( lona_form_timestamp() ); ?>">
		<?php wp_nonce_field( 'lona_form_' . $type, 'lona_nonce', false ); ?>
		<div class="lona-form__hp" aria-hidden="true">
			<label for="<?php echo esc_attr( $uid ); ?>-website"><?php esc_html_e( 'Ne pas remplir ce champ', 'fondation-lona' ); ?></label>
			<input type="text" id="<?php echo esc_attr( $uid ); ?>-website" name="lona_website" value="" tabindex="-1" autocomplete="off">
		</div>

		<div class="lona-form__grid">
			<?php foreach ( $form['fields'] as $key => $field ) : ?>
				<?php
				$fid      = $uid . '-' . $key;
				$name     = 'lona_fields[' . $key . ']';
				$required = ! empty( $field['required'] );
				$req_attr = $required ? ' required aria-required="true"' : '';
				$classes  = 'lona-field' . ( ! empty( $field['wide'] ) || in_array( $field['type'], array( 'consent' ), true ) ? ' is-wide' : '' );
				$label    = esc_html( $field['label'] ) . ( $required ? ' <span class="lona-field__req" aria-hidden="true">*</span>' : '' );
				?>
				<div class="<?php echo esc_attr( $classes ); ?>">
					<?php if ( 'consent' === $field['type'] ) : ?>
						<label class="lona-check" for="<?php echo esc_attr( $fid ); ?>">
							<input type="checkbox" id="<?php echo esc_attr( $fid ); ?>" name="<?php echo esc_attr( $name ); ?>" value="1"<?php echo $req_attr; // phpcs:ignore WordPress.Security.EscapeOutput ?>>
							<span><?php echo $label; // phpcs:ignore WordPress.Security.EscapeOutput ?>
							<?php if ( get_privacy_policy_url() ) : ?>
								<a href="<?php echo esc_url( get_privacy_policy_url() ); ?>"><?php esc_html_e( 'Lire la politique de confidentialité', 'fondation-lona' ); ?></a>
							<?php endif; ?></span>
						</label>
					<?php elseif ( 'checkboxes' === $field['type'] ) : ?>
						<fieldset>
							<legend><?php echo $label; // phpcs:ignore WordPress.Security.EscapeOutput ?></legend>
							<div class="lona-chips">
								<?php foreach ( $field['options'] as $i => $option ) : ?>
									<label class="lona-chip" for="<?php echo esc_attr( $fid . '-' . $i ); ?>">
										<input type="checkbox" id="<?php echo esc_attr( $fid . '-' . $i ); ?>" name="<?php echo esc_attr( $name ); ?>[]" value="<?php echo esc_attr( $option ); ?>">
										<span><?php echo esc_html( $option ); ?></span>
									</label>
								<?php endforeach; ?>
							</div>
						</fieldset>
					<?php else : ?>
						<label for="<?php echo esc_attr( $fid ); ?>"><?php echo $label; // phpcs:ignore WordPress.Security.EscapeOutput ?></label>
						<?php if ( 'textarea' === $field['type'] ) : ?>
							<textarea id="<?php echo esc_attr( $fid ); ?>" name="<?php echo esc_attr( $name ); ?>" rows="6" maxlength="5000"<?php echo $req_attr; // phpcs:ignore WordPress.Security.EscapeOutput ?>></textarea>
						<?php elseif ( 'select' === $field['type'] ) : ?>
							<select id="<?php echo esc_attr( $fid ); ?>" name="<?php echo esc_attr( $name ); ?>"<?php echo $req_attr; // phpcs:ignore WordPress.Security.EscapeOutput ?>>
								<option value=""><?php esc_html_e( 'Choisir…', 'fondation-lona' ); ?></option>
								<?php foreach ( $field['options'] as $option ) : ?>
									<option value="<?php echo esc_attr( $option ); ?>"><?php echo esc_html( $option ); ?></option>
								<?php endforeach; ?>
							</select>
						<?php else : ?>
							<input type="<?php echo esc_attr( $field['type'] ); ?>" id="<?php echo esc_attr( $fid ); ?>" name="<?php echo esc_attr( $name ); ?>" maxlength="200" autocomplete="<?php echo esc_attr( $field['autocomplete'] ?? 'off' ); ?>"<?php echo $req_attr; // phpcs:ignore WordPress.Security.EscapeOutput ?>>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="lona-form__footer">
			<?php if ( 'newsletter' !== $type ) : ?>
				<p class="lona-form__hint"><?php esc_html_e( 'Les champs marqués d\'un astérisque (*) sont obligatoires.', 'fondation-lona' ); ?></p>
			<?php endif; ?>
			<div class="wp-block-button"><button type="submit" class="wp-block-button__link wp-element-button"><?php echo esc_html( $form['submit'] ); ?></button></div>
		</div>
	</form>
	</div>
	<?php
	return (string) ob_get_clean();
}

/**
 * Traitement des envois (visiteurs et utilisateurs connectés).
 */
function lona_handle_form(): void {
	$type  = isset( $_POST['lona_type'] ) ? sanitize_key( wp_unslash( $_POST['lona_type'] ) ) : '';
	$forms = lona_forms();
	$back  = wp_get_referer() ? wp_get_referer() : home_url( '/' );

	$redirect = static function ( string $status ) use ( $type, $back ): void {
		$url = add_query_arg( array( 'lona_form' => $type, 'lona_status' => $status ), remove_query_arg( array( 'lona_form', 'lona_status' ), $back ) );
		wp_safe_redirect( $url . '#lona-form-' . $type, 303 );
		exit;
	};

	if ( ! isset( $forms[ $type ] ) ) {
		wp_safe_redirect( home_url( '/' ) );
		exit;
	}

	// 1. Nonce.
	if ( ! isset( $_POST['lona_nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['lona_nonce'] ) ), 'lona_form_' . $type ) ) {
		$redirect( 'expired' );
	}

	// 2. Honeypot : un robot remplit le champ caché → réponse « succès » silencieuse.
	if ( ! empty( $_POST['lona_website'] ) ) {
		$redirect( 'success' );
	}

	// 3. Délai signé : au moins 3 secondes, au plus 24 heures.
	$ts_raw = isset( $_POST['lona_ts'] ) ? sanitize_text_field( wp_unslash( $_POST['lona_ts'] ) ) : '';
	$parts  = explode( '.', $ts_raw );
	if ( 2 !== count( $parts ) || ! hash_equals( wp_hash( 'lona_form_ts|' . $parts[0] ), $parts[1] ) ) {
		$redirect( 'expired' );
	}
	$elapsed = time() - (int) $parts[0];
	if ( $elapsed < 3 ) {
		$redirect( 'success' );
	}
	if ( $elapsed > DAY_IN_SECONDS ) {
		$redirect( 'expired' );
	}

	// 4. Limitation de débit : 5 envois / 15 min par IP (stockée hachée).
	$ip       = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '';
	$rate_key = 'lona_rl_' . md5( wp_hash( $ip ) );
	$count    = (int) get_transient( $rate_key );
	if ( $count >= (int) apply_filters( 'lona_form_rate_limit', 5 ) ) {
		$redirect( 'limit' );
	}
	set_transient( $rate_key, $count + 1, 15 * MINUTE_IN_SECONDS );

	// 5. Validation et nettoyage.
	$input = isset( $_POST['lona_fields'] ) && is_array( $_POST['lona_fields'] ) ? wp_unslash( $_POST['lona_fields'] ) : array(); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput -- nettoyé ci-dessous.
	$data  = array();
	foreach ( $forms[ $type ]['fields'] as $key => $field ) {
		$raw = $input[ $key ] ?? '';
		switch ( $field['type'] ) {
			case 'email':
				$value = sanitize_email( (string) $raw );
				$valid = '' === $value || is_email( $value );
				break;
			case 'textarea':
				$value = mb_substr( sanitize_textarea_field( (string) $raw ), 0, 5000 );
				$valid = true;
				break;
			case 'select':
				$value = sanitize_text_field( (string) $raw );
				$valid = '' === $value || in_array( $value, $field['options'], true );
				break;
			case 'checkboxes':
				$value = array_values( array_intersect( array_map( 'sanitize_text_field', (array) $raw ), $field['options'] ) );
				$valid = true;
				break;
			case 'consent':
				$value = ! empty( $raw ) ? __( 'Oui', 'fondation-lona' ) : '';
				$valid = true;
				break;
			case 'tel':
				$value = preg_replace( '/[^0-9+().\s-]/', '', sanitize_text_field( (string) $raw ) );
				$valid = true;
				break;
			default:
				$value = mb_substr( sanitize_text_field( (string) $raw ), 0, 200 );
				$valid = true;
		}
		if ( ! $valid || ( ! empty( $field['required'] ) && ( '' === $value || array() === $value ) ) ) {
			$redirect( 'invalid' );
		}
		$data[ $key ] = $value;
	}

	// 6. Newsletter : pas de doublon.
	if ( 'newsletter' === $type ) {
		$existing = get_posts( array( 'post_type' => 'lona_submission', 'post_status' => 'private', 'numberposts' => 1, 'fields' => 'ids', 'meta_query' => array( array( 'key' => 'lona_email', 'value' => $data['email'] ), array( 'key' => 'lona_form_type', 'value' => 'newsletter' ) ) ) ); // phpcs:ignore WordPress.DB.SlowDBQuery
		if ( $existing ) {
			$redirect( 'success' );
		}
	}

	// 7. Enregistrement privé.
	$who     = $data['name'] ?? $data['email'];
	$post_id = wp_insert_post(
		array(
			'post_type'   => 'lona_submission',
			'post_status' => 'private',
			'post_title'  => sprintf( '%s — %s', $forms[ $type ]['title'], $who ),
		),
		true
	);
	if ( is_wp_error( $post_id ) ) {
		$redirect( 'error' );
	}
	update_post_meta( $post_id, 'lona_form_type', $type );
	update_post_meta( $post_id, 'lona_email', $data['email'] ?? '' );
	update_post_meta( $post_id, 'lona_fields', $data );
	update_post_meta( $post_id, 'lona_page', esc_url_raw( $back ) );

	// 8. Notification e-mail.
	$to = lona_opt( 'notify_email', get_option( 'admin_email' ) );
	if ( 'newsletter' !== $type || apply_filters( 'lona_notify_newsletter', false ) ) {
		$lines = array();
		foreach ( $forms[ $type ]['fields'] as $key => $field ) {
			$value   = is_array( $data[ $key ] ) ? implode( ', ', $data[ $key ] ) : $data[ $key ];
			$lines[] = $field['label'] . ' : ' . ( '' === $value ? '—' : $value );
		}
		$lines[] = '';
		$lines[] = __( 'Page :', 'fondation-lona' ) . ' ' . $back;
		$lines[] = __( 'Consulter dans l\'administration :', 'fondation-lona' ) . ' ' . admin_url( 'post.php?post=' . $post_id . '&action=edit' );
		$headers = array( 'Content-Type: text/plain; charset=UTF-8' );
		if ( ! empty( $data['email'] ) ) {
			$headers[] = 'Reply-To: ' . $data['email'];
		}
		/* translators: 1: type de formulaire, 2: nom du site */
		wp_mail( $to, sprintf( __( '[%2$s] %1$s', 'fondation-lona' ), $forms[ $type ]['title'], wp_specialchars_decode( get_bloginfo( 'name' ), ENT_QUOTES ) ), implode( "\n", $lines ), $headers );
	}

	do_action( 'lona_form_submitted', $type, $data, $post_id );
	$redirect( 'success' );
}
add_action( 'admin_post_nopriv_lona_form', 'lona_handle_form' );
add_action( 'admin_post_lona_form', 'lona_handle_form' );

/**
 * Administration des demandes : colonnes, détail en lecture seule, export newsletter.
 */
add_filter(
	'manage_lona_submission_posts_columns',
	static function () {
		return array(
			'cb'        => '<input type="checkbox">',
			'title'     => __( 'Demande', 'fondation-lona' ),
			'lona_type' => __( 'Formulaire', 'fondation-lona' ),
			'lona_mail' => __( 'E-mail', 'fondation-lona' ),
			'date'      => __( 'Date', 'fondation-lona' ),
		);
	}
);
add_action(
	'manage_lona_submission_posts_custom_column',
	static function ( $column, $post_id ) {
		$forms = lona_forms();
		$type  = (string) get_post_meta( $post_id, 'lona_form_type', true );
		if ( 'lona_type' === $column ) {
			echo esc_html( $forms[ $type ]['title'] ?? $type );
		} elseif ( 'lona_mail' === $column ) {
			echo esc_html( (string) get_post_meta( $post_id, 'lona_email', true ) );
		}
	},
	10,
	2
);
add_action(
	'add_meta_boxes_lona_submission',
	static function () {
		add_meta_box(
			'lona-submission',
			__( 'Contenu de la demande', 'fondation-lona' ),
			static function ( WP_Post $post ) {
				$forms = lona_forms();
				$type  = (string) get_post_meta( $post->ID, 'lona_form_type', true );
				$data  = (array) get_post_meta( $post->ID, 'lona_fields', true );
				echo '<table class="widefat striped"><tbody>';
				foreach ( $data as $key => $value ) {
					$label = $forms[ $type ]['fields'][ $key ]['label'] ?? $key;
					printf( '<tr><th style="width:30%%">%s</th><td>%s</td></tr>', esc_html( $label ), nl2br( esc_html( is_array( $value ) ? implode( ', ', $value ) : (string) $value ) ) );
				}
				echo '</tbody></table>';
			},
			'lona_submission',
			'normal',
			'high'
		);
	}
);
add_action(
	'restrict_manage_posts',
	static function ( $post_type ) {
		if ( 'lona_submission' === $post_type && current_user_can( 'manage_options' ) ) {
			printf(
				'<a class="button" href="%s">%s</a>',
				esc_url( wp_nonce_url( admin_url( 'admin-post.php?action=lona_export_newsletter' ), 'lona_export_newsletter' ) ),
				esc_html__( 'Exporter la newsletter (CSV)', 'fondation-lona' )
			);
		}
	}
);
add_action(
	'admin_post_lona_export_newsletter',
	static function () {
		if ( ! current_user_can( 'manage_options' ) || ! check_admin_referer( 'lona_export_newsletter' ) ) {
			wp_die( esc_html__( 'Action non autorisée.', 'fondation-lona' ), 403 );
		}
		$ids = get_posts( array( 'post_type' => 'lona_submission', 'post_status' => 'private', 'numberposts' => -1, 'fields' => 'ids', 'meta_key' => 'lona_form_type', 'meta_value' => 'newsletter' ) ); // phpcs:ignore WordPress.DB.SlowDBQuery
		nocache_headers();
		header( 'Content-Type: text/csv; charset=UTF-8' );
		header( 'Content-Disposition: attachment; filename=newsletter-fondation-lona-' . gmdate( 'Y-m-d' ) . '.csv' );
		$out = fopen( 'php://output', 'w' );
		fwrite( $out, "\xEF\xBB\xBF" ); // BOM pour Excel.
		fputcsv( $out, array( 'email', 'date' ) );
		foreach ( $ids as $id ) {
			$email = (string) get_post_meta( $id, 'lona_email', true );
			// Neutralise l'injection de formules dans les tableurs.
			$email = preg_match( '/^[=+\-@]/', $email ) ? "'" . $email : $email;
			fputcsv( $out, array( $email, get_the_date( 'Y-m-d', $id ) ) );
		}
		fclose( $out ); // phpcs:ignore WordPress.WP.AlternativeFunctions
		exit;
	}
);
