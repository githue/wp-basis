<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package basis
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function basis_body_classes($classes)
{

	$post_id = get_the_ID();

	if ($post_id) {
		$str = get_post_meta($post_id, 'body_classes', true);

		$post_classes = explode(" ", $str);

		$classes = array_merge($classes, $post_classes);
	}

	// Adds a class of hfeed to non-singular pages.
	if (!is_singular()) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if (!is_active_sidebar('sidebar-1')) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter('body_class', 'basis_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function basis_pingback_header()
{
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
	}
}
add_action('wp_head', 'basis_pingback_header');
