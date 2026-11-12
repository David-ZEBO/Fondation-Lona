<?php
/**
 * Bloc lona/site-header — barre utilitaire + barre principale + méga-menu + menu mobile.
 *
 * Accessibilité : boutons aria-expanded/aria-controls, fermeture avec Échap,
 * navigation au clavier, panneaux masqués avec l'attribut hidden.
 *
 * @package FondationLona
 */

defined( 'ABSPATH' ) || exit;

$lona_menu    = lona_menu_tree( 'primary' );
$lona_utility = lona_menu_tree( 'utility' );
$lona_lang    = render_block( array( 'blockName' => 'lona/language-switcher', 'attrs' => array(), 'innerBlocks' => array(), 'innerHTML' => '', 'innerContent' => array() ) );
$lona_logo    = render_block( array( 'blockName' => 'core/site-logo', 'attrs' => array( 'width' => 170, 'shouldSyncIcon' => false ), 'innerBlocks' => array(), 'innerHTML' => '', 'innerContent' => array() ) );
$lona_default_icons = array( 'star', 'heart', 'cap', 'news', 'star', 'heart' );
$lona_promo = array(
	'title' => __( 'Ensemble, faisons grandir l\'espoir', 'fondation-lona' ),
	'text'  => __( 'Don, partenariat ou bénévolat : chaque engagement compte pour la jeunesse et les femmes congolaises.', 'fondation-lona' ),
	'cta'   => __( 'Nous soutenir', 'fondation-lona' ),
	'url'   => home_url( '/nous-soutenir/' ),
);
$lona_linkedin = lona_social_links()['linkedin']['url'] ?? '';
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'lona-header' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?> data-lona-header>
	<div class="lona-topbar">
		<div class="lona-topbar__inner">
			<p class="lona-topbar__tagline"><?php esc_html_e( 'Ensemble, semons l\'excellence.', 'fondation-lona' ); ?></p>
			<ul class="lona-topbar__links">
				<?php foreach ( $lona_utility as $lona_link ) : ?>
					<li><a href="<?php echo esc_url( $lona_link['url'] ); ?>"><?php echo esc_html( $lona_link['title'] ); ?></a></li>
				<?php endforeach; ?>
				<?php if ( $lona_linkedin ) : ?>
					<li><a href="<?php echo esc_url( $lona_linkedin ); ?>" target="_blank" rel="noopener noreferrer me" class="lona-topbar__social"><?php echo lona_icon( 'linkedin' ); // phpcs:ignore WordPress.Security.EscapeOutput ?><span class="screen-reader-text">LinkedIn</span></a></li>
				<?php endif; ?>
			</ul>
			<?php if ( $lona_lang ) : ?>
				<div class="lona-topbar__lang"><?php echo $lona_lang; // phpcs:ignore WordPress.Security.EscapeOutput ?></div>
			<?php endif; ?>
		</div>
	</div>

	<div class="lona-mainbar">
		<div class="lona-mainbar__inner">
			<div class="lona-mainbar__brand"><?php echo $lona_logo; // phpcs:ignore WordPress.Security.EscapeOutput ?></div>

			<nav class="lona-mega" aria-label="<?php esc_attr_e( 'Navigation principale', 'fondation-lona' ); ?>">
				<ul class="lona-mega__list">
					<?php foreach ( $lona_menu as $lona_i => $lona_item ) : ?>
						<?php
						$lona_icon_name = $lona_item['icon'] ?: $lona_default_icons[ $lona_i ] ?? 'star';
						$lona_badge     = '<span class="lona-mega__badge lona-mega__badge--' . ( $lona_i % 4 ) . '" aria-hidden="true">' . lona_icon( $lona_icon_name ) . '</span>';
						?>
						<?php if ( ! empty( $lona_item['children'] ) ) : ?>
							<?php $lona_pid = 'lona-mega-panel-' . $lona_i; ?>
							<li class="lona-mega__item has-panel">
								<button type="button" class="lona-mega__trigger" aria-expanded="false" aria-controls="<?php echo esc_attr( $lona_pid ); ?>">
									<?php echo $lona_badge; // phpcs:ignore WordPress.Security.EscapeOutput ?>
									<span><?php echo esc_html( $lona_item['title'] ); ?></span>
									<svg class="lona-mega__chevron" width="12" height="12" viewBox="0 0 24 24" aria-hidden="true"><path d="m6 9 6 6 6-6" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
								</button>
								<div class="lona-mega__panel" id="<?php echo esc_attr( $lona_pid ); ?>" hidden>
									<div class="lona-mega__panel-inner">
										<div class="lona-mega__cols">
											<?php foreach ( lona_menu_columns( $lona_item['children'] ) as $lona_col ) : ?>
												<div class="lona-mega__col">
													<p class="lona-mega__col-title"><?php echo $lona_col['title'] ? esc_html( $lona_col['title'] ) : '&nbsp;'; ?></p>
													<ul>
														<?php foreach ( $lona_col['links'] as $lona_link ) : ?>
															<li>
																<a href="<?php echo esc_url( $lona_link['url'] ); ?>"<?php echo lona_menu_is_current( (string) $lona_link['url'] ) ? ' aria-current="page"' : ''; ?>>
																	<strong><?php echo esc_html( $lona_link['title'] ); ?></strong>
																	<?php if ( ! empty( $lona_link['desc'] ) ) : ?>
																		<span><?php echo esc_html( $lona_link['desc'] ); ?></span>
																	<?php endif; ?>
																</a>
															</li>
														<?php endforeach; ?>
													</ul>
												</div>
											<?php endforeach; ?>
										</div>
										<aside class="lona-mega__promo">
											<p class="lona-mega__promo-title"><?php echo esc_html( $lona_promo['title'] ); ?></p>
											<p><?php echo esc_html( $lona_promo['text'] ); ?></p>
											<a class="lona-mega__promo-btn" href="<?php echo esc_url( $lona_promo['url'] ); ?>"><?php echo esc_html( $lona_promo['cta'] ); ?> <?php echo lona_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></a>
										</aside>
									</div>
								</div>
							</li>
						<?php else : ?>
							<li class="lona-mega__item">
								<a class="lona-mega__trigger" href="<?php echo esc_url( $lona_item['url'] ); ?>"<?php echo lona_menu_is_current( (string) $lona_item['url'] ) ? ' aria-current="page"' : ''; ?>>
									<?php echo $lona_badge; // phpcs:ignore WordPress.Security.EscapeOutput ?>
									<span><?php echo esc_html( $lona_item['title'] ); ?></span>
								</a>
							</li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			</nav>

			<div class="lona-mainbar__actions">
				<a class="lona-mainbar__link" href="<?php echo esc_url( home_url( '/devenir-partenaire/' ) ); ?>"><?php esc_html_e( 'Devenir partenaire', 'fondation-lona' ); ?></a>
				<a class="lona-btn-cta" href="<?php echo esc_url( home_url( '/nous-soutenir/' ) ); ?>"><?php esc_html_e( 'Nous soutenir', 'fondation-lona' ); ?></a>
			</div>

			<button type="button" class="lona-burger" aria-expanded="false" aria-controls="lona-mobile-menu">
				<span class="lona-burger__lines" aria-hidden="true"><span></span><span></span></span>
				<span class="screen-reader-text"><?php esc_html_e( 'Ouvrir le menu', 'fondation-lona' ); ?></span>
			</button>
		</div>

		<div class="lona-mobile" id="lona-mobile-menu" hidden>
			<nav aria-label="<?php esc_attr_e( 'Navigation mobile', 'fondation-lona' ); ?>">
				<ul class="lona-mobile__list">
					<?php foreach ( $lona_menu as $lona_i => $lona_item ) : ?>
						<li class="lona-mobile__item">
							<?php if ( ! empty( $lona_item['children'] ) ) : ?>
								<?php $lona_mid = 'lona-mobile-sub-' . $lona_i; ?>
								<button type="button" class="lona-mobile__toggle" aria-expanded="false" aria-controls="<?php echo esc_attr( $lona_mid ); ?>">
									<span><?php echo esc_html( $lona_item['title'] ); ?></span>
									<svg width="16" height="16" viewBox="0 0 24 24" aria-hidden="true"><path d="m6 9 6 6 6-6" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
								</button>
								<div class="lona-mobile__sub" id="<?php echo esc_attr( $lona_mid ); ?>" hidden>
									<?php foreach ( lona_menu_columns( $lona_item['children'] ) as $lona_col ) : ?>
										<?php if ( $lona_col['title'] ) : ?>
											<p class="lona-mega__col-title"><?php echo esc_html( $lona_col['title'] ); ?></p>
										<?php endif; ?>
										<ul>
											<?php foreach ( $lona_col['links'] as $lona_link ) : ?>
												<li><a href="<?php echo esc_url( $lona_link['url'] ); ?>"><?php echo esc_html( $lona_link['title'] ); ?></a></li>
											<?php endforeach; ?>
										</ul>
									<?php endforeach; ?>
								</div>
							<?php else : ?>
								<a class="lona-mobile__link" href="<?php echo esc_url( $lona_item['url'] ); ?>"><?php echo esc_html( $lona_item['title'] ); ?></a>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
					<?php foreach ( $lona_utility as $lona_link ) : ?>
						<li class="lona-mobile__item"><a class="lona-mobile__link" href="<?php echo esc_url( $lona_link['url'] ); ?>"><?php echo esc_html( $lona_link['title'] ); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</nav>
			<div class="lona-mobile__actions">
				<a class="lona-btn-outline" href="<?php echo esc_url( home_url( '/devenir-partenaire/' ) ); ?>"><?php esc_html_e( 'Devenir partenaire', 'fondation-lona' ); ?></a>
				<a class="lona-btn-cta" href="<?php echo esc_url( home_url( '/nous-soutenir/' ) ); ?>"><?php esc_html_e( 'Nous soutenir', 'fondation-lona' ); ?></a>
			</div>
			<?php if ( $lona_lang ) : ?>
				<div class="lona-mobile__lang"><?php echo $lona_lang; // phpcs:ignore WordPress.Security.EscapeOutput ?></div>
			<?php endif; ?>
		</div>
	</div>
</div>
