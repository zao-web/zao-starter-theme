<?php
/**
 * Body Class Adjustment
 *
 * @package WordPress
 * @subpackage ZaoStarterTheme
 * @since 1.0
 * @version 2.0
 */

/**
 * Body Class Adjustment
 *
 * Adjusts the body_class() function and cleans up the output of them from template files
 *
 * @param array $classes All the body classes that already exist on the $classes array
 * @return array $classes Array of HTML classes for the body
 */
function body_class_adjust( $classes ) {
	global $post;
	// add a class for the name of the page - later might want to remove the auto generated pageid class which isn't very useful
	if ( is_page() ) {
		$pn        = $post->post_name;
		$classes[] = 'page--' . $pn;
	}

	if ( is_front_page() ) {
		$classes[] = 'page--front';
	}

	// add a class for the parent page name
	if ( is_page() && $post->post_parent ) {
		$post_parent = get_post( $post->post_parent );
		$parent_slug = $post_parent->post_name;
		$classes[]   = 'parent_' . $parent_slug;
	}

	// add class for the name of the custom template used (if any)
	$temp = get_page_template();

	if ( $temp ) {
		$path      = pathinfo( $temp );
		$tmp       = $path['filename'] . '.' . $path['extension'];
		$tn        = str_replace( '.php', '', $tmp );
		$classes[] = 'template--' . $tn;
	}

	return $classes;
}

add_filter( 'body_class', 'body_class_adjust' );
