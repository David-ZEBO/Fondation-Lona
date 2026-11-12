<?php
/**
 * Configuration du thème : supports, tailles d'images, styles de blocs, catégories de patterns.
 *
 * @package FondationLona
 */

defined( 'ABSPATH' ) || exit;

add_action(
	'after_setup_theme',
	static function () {
		load_theme_textdomain( 'fondation-lona', LONA_DIR . '/languages' );

		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'custom-logo', array( 'height' => 120, 'width' => 400, 'flex-height' => true, 'flex-width' => true ) );
		add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script', 'navigation-widgets' ) );
		remove_theme_support( 'core-block-patterns' );
		add_post_type_support( 'page', 'excerpt' ); // chapô des pages + méta description.

		add_editor_style( array( 'assets/css/main.css' ) );

		add_image_size( 'lona-card', 800, 600, true );
		add_image_size( 'lona-portrait', 640, 800, true );
		add_image_size( 'lona-wide', 1600, 900, true );
		add_image_size( 'lona-logo', 320, 160, false );
	}
);

/**
 * Catégories de patterns propres à la Fondation.
 */
add_action(
	'init',
	static function () {
		register_block_pattern_category( 'lona-home', array( 'label' => __( 'LONA — Accueil', 'fondation-lona' ) ) );
		register_block_pattern_category( 'lona-pages', array( 'label' => __( 'LONA — Pages', 'fondation-lona' ) ) );
		register_block_pattern_category( 'lona-sections', array( 'label' => __( 'LONA — Sections', 'fondation-lona' ) ) );

		$styles = array(
			'core/heading'   => array( 'editorial' => __( 'Éditorial (Playfair)', 'fondation-lona' ) ),
			'core/paragraph' => array(
				'eyebrow' => __( 'Surtitre doré', 'fondation-lona' ),
				'lead'    => __( 'Chapeau', 'fondation-lona' ),
			),
			'core/button'    => array(
				'gold'          => __( 'Or', 'fondation-lona' ),
				'outline-light' => __( 'Contour clair', 'fondation-lona' ),
				'link-arrow'    => __( 'Lien fléché', 'fondation-lona' ),
			),
			'core/group'     => array(
				'card'     => __( 'Carte', 'fondation-lona' ),
				'gold-rule' => __( 'Filet doré', 'fondation-lona' ),
			),
			'core/image'     => array(
				'arch'  => __( 'Arche (rappel du logo)', 'fondation-lona' ),
				'framed' => __( 'Cadre doré décalé', 'fondation-lona' ),
			),
			'core/separator' => array( 'gold-short' => __( 'Trait doré court', 'fondation-lona' ) ),
			'core/list'      => array( 'stars' => __( 'Puces étoiles', 'fondation-lona' ) ),
		);
		foreach ( $styles as $block => $variations ) {
			foreach ( $variations as $name => $label ) {
				register_block_style( $block, array( 'name' => $name, 'label' => $label ) );
			}
		}
	}
);

/**
 * Le thème n'utilise pas les emojis WordPress : allègement du <head>.
 */
add_action(
	'init',
	static function () {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
	}
);

/**
 * Logo clair (optionnel) : utilisé sur l'en-tête transparent de la page d'accueil.
 */
add_filter(
	'render_block_core/site-logo',
	static function ( $html ) {
		$light_id = (int) lona_opt( 'logo_light', 0 );
		if ( ! $light_id || ! $html ) {
			return $html;
		}
		$light = wp_get_attachment_image(
			$light_id,
			'lona-logo',
			false,
			array( 'class' => 'lona-logo-light', 'alt' => '', 'aria-hidden' => 'true', 'loading' => 'eager' )
		);
		return str_replace( '</a>', $light . '</a>', $html );
	}
);

/**
 * Classe de corps indiquant la présence d'un logo clair.
 */
add_filter(
	'body_class',
	static function ( $classes ) {
		if ( lona_opt( 'logo_light' ) ) {
			$classes[] = 'has-lona-light-logo';
		}
		return $classes;
	}
);

/**
 * Lecture vidéo respectueuse de la vie privée : YouTube en mode « nocookie ».
 */
add_filter(
	'embed_oembed_html',
	static function ( $html ) {
		return str_replace( array( 'www.youtube.com/embed/', 'youtube.com/embed/' ), 'www.youtube-nocookie.com/embed/', $html );
	}
);

/**
 * Vidéos tierces chargées uniquement après consentement (clic ou acceptation des cookies).
 * Désactivable : add_filter( 'lona_embed_consent', '__return_false' );
 */
add_filter(
	'render_block_core/embed',
	static function ( $html, $block ) {
		if ( is_admin() || wp_is_json_request() || ! apply_filters( 'lona_embed_consent', true ) || ! str_contains( $html, '<iframe' ) ) {
			return $html;
		}
		$provider = ucfirst( (string) ( $block['attrs']['providerNameSlug'] ?? __( 'un service tiers', 'fondation-lona' ) ) );
		$html     = preg_replace( '/<iframe([^>]*?)\ssrc=/i', '<iframe$1 data-lona-src=', $html, 1 );
		$box      = sprintf(
			'<div class="lona-embed-consent__box"><button type="button" class="lona-embed-consent__btn">%1$s</button><p>%2$s</p></div>',
			esc_html__( 'Afficher la vidéo', 'fondation-lona' ),
			/* translators: %s: fournisseur (YouTube, Vimeo…) */
			esc_html( sprintf( __( 'Cette vidéo est hébergée par %s. En l\'affichant, vous acceptez les conditions de ce service.', 'fondation-lona' ), $provider ) )
		);
		return preg_replace( '/(<div class="wp-block-embed__wrapper">)/', '$1<div class="lona-embed-consent">' . $box, $html, 1 ) . '';
	},
	10,
	2
);
add_filter(
	'render_block_core/embed',
	static function ( $html ) {
		// Ferme le conteneur de consentement ouvert ci-dessus.
		return str_contains( $html, 'lona-embed-consent' ) ? preg_replace( '/(<\/iframe>)/', '$1</div>', $html, 1 ) : $html;
	},
	11
);

/**
 * Cartes d'actualités sans image à la une : visuel provisoire aux couleurs de la Fondation
 * (évite les cartes déséquilibrées).
 */
add_filter(
	'render_block_core/post-featured-image',
	static function ( $html, $block ) {
		$class = (string) ( $block['attrs']['className'] ?? '' );
		if ( '' !== trim( $html ) || ! str_contains( $class, 'lona-news__image' ) ) {
			return $html;
		}
		return sprintf(
			'<figure class="wp-block-post-featured-image %1$s"><img src="%2$s" alt="" class="lona-placeholder" loading="lazy" decoding="async" width="800" height="600" style="aspect-ratio:4/3;object-fit:cover"></figure>',
			esc_attr( $class ),
			esc_url( lona_placeholder_url() )
		);
	},
	10,
	2
);

/**
 * Logo officiel embarqué : affiché tant qu'aucun logo n'a été choisi dans l'éditeur.
 */
add_filter(
	'render_block_core/site-logo',
	static function ( $html, $block ) {
		if ( '' !== trim( (string) $html ) ) {
			return $html;
		}
		$width = (int) ( $block['attrs']['width'] ?? 170 );
		return sprintf(
			'<div class="wp-block-site-logo"><a href="%1$s" class="custom-logo-link" rel="home"><img src="%2$s" class="custom-logo" alt="%3$s" width="%4$d" height="%5$d" decoding="async"></a></div>',
			esc_url( home_url( '/' ) ),
			esc_url( lona_logo_url() ),
			esc_attr( get_bloginfo( 'name' ) ),
			$width,
			(int) round( $width * 222 / 870 )
		);
	},
	5,
	2
);
