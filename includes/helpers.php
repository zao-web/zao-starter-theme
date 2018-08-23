<?php
/**
 * Utility (helper) functions
 *
 * @package WordPress
 * @subpackage ZaoStarterTheme
 */

/**
 * Generates semantic classes for each comment element.
 *
 * @global int $comment_alt
 * @global int $comment_depth
 * @global int $comment_thread_alt
 *
 * @param string|array   $class      Optional. One or more classes to add to the class list. Default empty.
 * @param int|WP_Comment $comment_id Comment ID or WP_Comment object. Default current comment.
 * @param int|WP_Post    $post_id    Post ID or WP_Post object. Default current post.
 * @return string   The class will be returned.
 */
function zao_comment_class( $class = '', $comment_id = null, $post_id = null ) {
	global $comment_alt, $comment_depth, $comment_thread_alt;

	$classes = array();
	$zao_comment_alt = $comment_alt;
	$zao_comment_depth = $comment_depth;
	$zao_thread_alt = $comment_thread_alt;

	$comment = get_comment( $comment_id );
	if ( ! $comment ) {
		return $classes;
	}

	// Base BEMIT class to use with other classes
	$base_class = 'c-comment';

	// Get the comment type (comment, trackback),
	$classes[] = ( empty( $comment->comment_type ) ) ? $base_class : $comment->comment_type;

	// Add classes for comment authors that are registered users.
	if ( $comment->user_id > 0 && get_userdata( $comment->user_id === $user ) ) {
		$classes[] = $base_class . '--byuser';
		// For comment authors who are the author of the post
		if ( get_post( $post_id ) === $post ) {
			if ( $comment->user_id === $post->post_author ) {
				$classes[] = $base_class . '--bypostauthor';
			}
		}
	}

	// Add class if comment is a parent comment and has children
	empty( $args['has_children'] ) ? '' : $base_class . '--has-children';

	// Determine if comment is odd, even or alt
	if ( empty( $zao_comment_alt ) ) {
		$zao_comment_alt = 0;
	}
	if ( empty( $zao_comment_depth ) ) {
		$zao_comment_depth = 1;
	}
	if ( empty( $zao_thread_alt ) ) {
		$zao_thread_alt = 0;
	}

	if ( $zao_comment_alt % 2 ) {
		$classes[] = 'is-odd';
		$classes[] = 'is-alt';
	} else {
		$classes[] = 'is-even';
	}

	$zao_comment_alt++;

	// Alt for top-level comments
	if ( 1 == $zao_comment_depth ) {
		if ( $zao_thread_alt % 2 ) {
			$classes[] = 'is-thread-odd';
			$classes[] = 'is-thread-alt';
		} else {
			$classes[] = 'is-thread-even';
		}
		$zao_thread_alt++;
	}

	$classes[] = $base_class . '--depth-' . $zao_comment_depth;

	if ( ! empty( $class ) ) {
		if ( ! is_array( $class ) ) {
			$class = preg_split( '#\s+#', $class );
		}
		$classes = array_merge( $classes, $class );
	}

	$classes = array_map( 'esc_attr', $classes );

	echo 'class="' . esc_attr( join( ' ', $classes ) . '"' );
}
