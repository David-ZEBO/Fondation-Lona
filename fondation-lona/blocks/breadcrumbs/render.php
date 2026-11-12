<?php
/**
 * Bloc lona/breadcrumbs — fil d'Ariane (BreadcrumbList schema.org en microdonnées).
 *
 * @package FondationLona
 */

defined( 'ABSPATH' ) || exit;

if ( is_front_page() ) {
	return;
}

$lona_trail = array( array( __( 'Accueil', 'fondation-lona' ), home_url( '/' ) ) );

if ( is_singular() ) {
	$lona_obj  = get_queried_object();
	$lona_type = get_post_type( $lona_obj );
	if ( 'post' === $lona_type && get_option( 'page_for_posts' ) ) {
		$lona_trail[] = array( get_the_title( (int) get_option( 'page_for_posts' ) ), get_permalink( (int) get_option( 'page_for_posts' ) ) );
	} elseif ( 'page' !== $lona_type && 'post' !== $lona_type ) {
		$lona_pto = get_post_type_object( $lona_type );
		if ( $lona_pto && $lona_pto->has_archive ) {
			$lona_trail[] = array( $lona_pto->labels->name, get_post_type_archive_link( $lona_type ) );
		}
	}
	foreach ( array_reverse( get_post_ancestors( $lona_obj ) ) as $lona_parent ) {
		$lona_trail[] = array( get_the_title( $lona_parent ), get_permalink( $lona_parent ) );
	}
	$lona_trail[] = array( get_the_title( $lona_obj ), '' );
} elseif ( is_home() ) {
	$lona_trail[] = array( get_the_title( (int) get_option( 'page_for_posts' ) ) ?: __( 'Actualités', 'fondation-lona' ), '' );
} elseif ( is_post_type_archive() ) {
	$lona_trail[] = array( post_type_archive_title( '', false ), '' );
} elseif ( is_category() || is_tag() || is_tax() ) {
	$lona_trail[] = array( single_term_title( '', false ), '' );
} elseif ( is_search() ) {
	$lona_trail[] = array( __( 'Recherche', 'fondation-lona' ), '' );
} elseif ( is_404() ) {
	$lona_trail[] = array( __( 'Page introuvable', 'fondation-lona' ), '' );
} elseif ( is_archive() ) {
	$lona_trail[] = array( wp_strip_all_tags( get_the_archive_title() ), '' );
} else {
	return;
}
?>
<nav <?php echo get_block_wrapper_attributes( array( 'class' => 'lona-breadcrumbs' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?> aria-label="<?php esc_attr_e( 'Fil d\'Ariane', 'fondation-lona' ); ?>">
	<ol itemscope itemtype="https://schema.org/BreadcrumbList">
		<?php foreach ( $lona_trail as $lona_pos => list( $lona_label, $lona_url ) ) : ?>
			<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
				<?php if ( $lona_url ) : ?>
					<a itemprop="item" href="<?php echo esc_url( $lona_url ); ?>"><span itemprop="name"><?php echo esc_html( $lona_label ); ?></span></a>
				<?php else : ?>
					<span itemprop="name" aria-current="page"><?php echo esc_html( $lona_label ); ?></span>
				<?php endif; ?>
				<meta itemprop="position" content="<?php echo esc_attr( (string) ( $lona_pos + 1 ) ); ?>">
			</li>
		<?php endforeach; ?>
	</ol>
</nav>
