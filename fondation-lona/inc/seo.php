<?php
/**
 * SEO technique léger : description, Open Graph, Twitter, schema.org
 * (Organization, Article, Event), robots. Se désactive automatiquement si
 * une extension SEO (Yoast, Rank Math, SEOPress, AIOSEO) est active.
 *
 * Plan de site XML : natif WordPress (/wp-sitemap.xml), types publics inclus.
 * Hreflang et URL par langue : gérés par TranslatePress.
 *
 * @package FondationLona
 */

defined( 'ABSPATH' ) || exit;

/**
 * Une extension SEO est-elle active ?
 */
function lona_seo_plugin_active(): bool {
	return defined( 'WPSEO_VERSION' ) || defined( 'RANK_MATH_VERSION' ) || defined( 'SEOPRESS_VERSION' ) || defined( 'AIOSEO_VERSION' ) || defined( 'THE_SEO_FRAMEWORK_VERSION' );
}

/**
 * Description de la page courante.
 */
function lona_meta_description(): string {
	if ( is_singular() ) {
		$post = get_queried_object();
		$text = has_excerpt( $post ) ? $post->post_excerpt : wp_strip_all_tags( strip_shortcodes( excerpt_remove_blocks( $post->post_content ) ) );
		if ( '' === trim( $text ) && 'lona_program' === $post->post_type ) {
			$text = (string) lona_meta( $post->ID, 'tagline' );
		}
	} elseif ( is_category() || is_tag() || is_tax() ) {
		$text = term_description();
	} elseif ( is_post_type_archive() ) {
		$text = (string) get_the_post_type_description();
	} else {
		$text = '';
	}
	$text = trim( preg_replace( '/\s+/', ' ', wp_strip_all_tags( (string) $text ) ) );
	if ( '' === $text ) {
		$text = (string) get_bloginfo( 'description' );
	}
	return mb_substr( $text, 0, 160 );
}

/**
 * Image de partage.
 */
function lona_share_image(): string {
	if ( is_singular() && has_post_thumbnail() ) {
		$src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'lona-wide' );
		if ( $src ) {
			return $src[0];
		}
	}
	$logo = (int) get_theme_mod( 'custom_logo' );
	if ( ! $logo && function_exists( 'get_site_icon_url' ) ) {
		return (string) get_site_icon_url( 512 );
	}
	return $logo ? (string) wp_get_attachment_image_url( $logo, 'full' ) : '';
}

add_action(
	'wp_head',
	static function () {
		if ( lona_seo_plugin_active() ) {
			return;
		}
		$desc  = lona_meta_description();
		$title = wp_get_document_title();
		$url   = is_singular() ? get_permalink() : ( is_front_page() ? home_url( '/' ) : '' );
		$image = lona_share_image();

		if ( $desc ) {
			printf( '<meta name="description" content="%s">' . "\n", esc_attr( $desc ) );
		}
		$og = array(
			'og:site_name'   => get_bloginfo( 'name' ),
			'og:locale'      => str_replace( '-', '_', get_bloginfo( 'language' ) ),
			'og:type'        => is_singular( 'post' ) ? 'article' : 'website',
			'og:title'       => $title,
			'og:description' => $desc,
			'og:url'         => $url,
			'og:image'       => $image,
		);
		foreach ( $og as $property => $content ) {
			if ( $content ) {
				printf( '<meta property="%s" content="%s">' . "\n", esc_attr( $property ), esc_attr( $content ) );
			}
		}
		if ( is_singular( 'post' ) ) {
			printf( '<meta property="article:published_time" content="%s">' . "\n", esc_attr( get_the_date( 'c' ) ) );
			printf( '<meta property="article:modified_time" content="%s">' . "\n", esc_attr( get_the_modified_date( 'c' ) ) );
		}
		printf( '<meta name="twitter:card" content="%s">' . "\n", $image ? 'summary_large_image' : 'summary' );

		$schema = lona_schema_graph();
		if ( $schema ) {
			echo '<script type="application/ld+json">' . wp_json_encode( array( '@context' => 'https://schema.org', '@graph' => $schema ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
		}
	},
	5
);

/**
 * Données structurées schema.org.
 */
function lona_schema_graph(): array {
	$org_id = home_url( '/#organization' );
	$logo   = (int) get_theme_mod( 'custom_logo' );
	$org    = array(
		'@type'      => 'NGO',
		'@id'        => $org_id,
		'name'       => get_bloginfo( 'name' ),
		'url'        => home_url( '/' ),
		'slogan'     => __( 'Ensemble, semons l\'excellence.', 'fondation-lona' ),
		'areaServed' => array( '@type' => 'Country', 'name' => 'République démocratique du Congo' ),
		'sameAs'     => array_values( wp_list_pluck( lona_social_links(), 'url' ) ),
	);
	if ( $logo ) {
		$org['logo'] = wp_get_attachment_image_url( $logo, 'full' );
	}
	if ( lona_opt( 'email' ) ) {
		$org['email'] = lona_opt( 'email' );
	}
	if ( lona_opt( 'phone' ) ) {
		$org['telephone'] = lona_opt( 'phone' );
	}
	if ( lona_opt( 'address' ) ) {
		$org['address'] = lona_opt( 'address' );
	}

	$graph = array( $org );

	if ( is_singular( 'post' ) ) {
		$post    = get_queried_object();
		$article = array(
			'@type'            => 'Article',
			'headline'         => get_the_title( $post ),
			'datePublished'    => get_the_date( 'c', $post ),
			'dateModified'     => get_the_modified_date( 'c', $post ),
			'mainEntityOfPage' => get_permalink( $post ),
			'author'           => array( '@id' => $org_id ),
			'publisher'        => array( '@id' => $org_id ),
			'inLanguage'       => get_bloginfo( 'language' ),
		);
		if ( has_post_thumbnail( $post ) ) {
			$article['image'] = get_the_post_thumbnail_url( $post, 'lona-wide' );
		}
		$graph[] = $article;
	}

	if ( is_singular( 'lona_event' ) ) {
		$post  = get_queried_object();
		$start = (string) lona_meta( $post->ID, 'start_date' );
		if ( $start ) {
			$event = array(
				'@type'               => 'Event',
				'name'                => get_the_title( $post ),
				'startDate'           => $start,
				'url'                 => get_permalink( $post ),
				'organizer'           => array( '@id' => $org_id ),
				'eventAttendanceMode' => 'https://schema.org/OfflineEventAttendanceMode',
				'eventStatus'         => 'https://schema.org/EventScheduled',
			);
			if ( lona_meta( $post->ID, 'end_date' ) ) {
				$event['endDate'] = lona_meta( $post->ID, 'end_date' );
			}
			if ( lona_meta( $post->ID, 'location' ) ) {
				$event['location'] = array( '@type' => 'Place', 'name' => lona_meta( $post->ID, 'location' ), 'address' => lona_meta( $post->ID, 'location' ) );
			}
			if ( has_post_thumbnail( $post ) ) {
				$event['image'] = get_the_post_thumbnail_url( $post, 'lona-wide' );
			}
			$graph[] = $event;
		}
	}

	return apply_filters( 'lona_schema_graph', $graph );
}

/**
 * Pas d'indexation des résultats de recherche et des pages 404.
 */
add_filter(
	'wp_robots',
	static function ( $robots ) {
		if ( is_search() || is_404() ) {
			$robots['noindex'] = true;
			$robots['follow']  = true;
		}
		return $robots;
	}
);

/**
 * Plan de site : exclusion des utilisateurs (pas de page auteur publique).
 */
add_filter(
	'wp_sitemaps_add_provider',
	static function ( $provider, $name ) {
		return 'users' === $name ? false : $provider;
	},
	10,
	2
);
