<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package _s
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function nd_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Add sidebar class for blog posts and archives
	if ( is_single() || is_archive() || is_home() || is_search() ) {
		if ( is_active_sidebar( 'sidebar-1' ) ) {
			$classes[] = 'has-sidebar';
		} else {
			$classes[] = 'no-sidebar';
		}
	} else {
		// For pages, check if using sidebar template
		if ( is_page_template( 'page-sidebar.php' ) && is_active_sidebar( 'sidebar-1' ) ) {
			$classes[] = 'has-sidebar';
		} else {
			$classes[] = 'no-sidebar';
		}
	}

	return $classes;
}
add_filter( 'body_class', 'nd_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function nd_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'nd_pingback_header' );
