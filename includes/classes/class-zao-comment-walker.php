<?php
/**
 * Comment Walker
 *
 * @package WordPress
 * @subpackage ZaoStarterTheme
 * @since 1.0
 * @version 2.0
 */

/**
 * Create the Comment Walker
 *
 * Comment walker for wp_comments_list function.
 * Cleans up comment output and uses BEM syntax.
 *
 * @see Walker
 */
class Comment_Walker extends Walker_Comment {

	/**
	 * What the class handles.
	 *
	 * @since 2.7.0
	 * @var string
	 *
	 * @see Walker::$tree_type
	 */
	public $tree_type = 'comment';

	/**
	 * Database fields to use.
	 *
	 * @since 2.7.0
	 * @var array
	 *
	 * @see Walker::$db_fields
	 */
	public $db_fields = array(
		'parent' => 'comment_parent',
		'id'     => 'comment_ID',
	);

	/**
	 * Starts the list before the elements are added.
	 *
	 * @since 2.7.0
	 *
	 * @see Walker::start_lvl()
	 * @global int $comment_depth
	 *
	 * @param string $output Used to append additional content (passed by reference).
	 * @param int    $depth  Optional. Depth of the current comment. Default 0.
	 * @param array  $args   Optional. Uses 'style' argument for type of HTML list. Default empty array.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		// @codingStandardsIgnoreLine
		$GLOBALS['comment_depth'] = $depth + 2;
		$base_class               = 'c-comment';
		?>
		
		<ol class="<?php echo esc_attr( $base_class . '__child-comments' ); ?>">

		<?php
	}

	/**
	 * Ends the list of items after the elements are added.
	 *
	 * @since 2.7.0
	 *
	 * @see Walker::end_lvl()
	 * @global int $comment_depth
	 *
	 * @param string $output Used to append additional content (passed by reference).
	 * @param int    $depth  Optional. Depth of the current comment. Default 0.
	 * @param array  $args   Optional. Will only append content if style argument value is 'ol' or 'ul'.
	 *                       Default empty array.
	 */
	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		// @codingStandardsIgnoreLine
		$GLOBALS['comment_depth'] = $depth + 2;
		?>

		</ol>

		<?php
	}

	/**
	 * Starts the element output.
	 *
	 * @since 2.7.0
	 *
	 * @see Walker::start_el()
	 * @see wp_list_comments()
	 * @global int        $comment_depth
	 * @global WP_Comment $comment
	 *
	 * @param string     $output  Used to append additional content. Passed by reference.
	 * @param WP_Comment $comment Comment data object.
	 * @param int        $depth   Optional. Depth of the current comment in reference to parents. Default 0.
	 * @param array      $args    Optional. An array of arguments. Default empty array.
	 * @param int        $id      Optional. ID of the current comment. Default 0 (unused).
	 */
	public function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
		$depth++;
		// @codingStandardsIgnoreLine
		$GLOBALS['comment_depth'] = $depth;
		// @codingStandardsIgnoreLine
		$GLOBALS['comment']       = $comment;
		$base_class               = 'c-comment';

		?>

		<li <?php zao_comment_class(); ?> id="comment-<?php comment_ID(); ?>" itemprop="comment" itemscope itemtype="http://schema.org/Comment">
			<figure class="c-comment__gravatar"><?php echo get_avatar( $comment, 65, '[default gravatar URL]', 'Author’s gravatar' ); ?></figure>

			<div class="<?php echo esc_attr( $base_class . '__comment-meta' ); ?>" role="complementary">
				<h3 class="<?php echo esc_attr( $base_class . '__author' ); ?> o-heading-4">
					<a class="<?php echo esc_attr( $base_class . '__author-link' ); ?>" href="<?php esc_url( comment_author_url() ); ?>" itemprop="url"><span itemprop="creator"><?php esc_html( comment_author() ); ?></span></a>
				</h3>

				<time class="<?php echo esc_attr( $base_class . '__meta-item' ); ?>" datetime="<?php comment_date( 'Y-m-d' ); ?>T<?php comment_time( 'H:iP' ); ?>" itemprop="datePublished">
					<?php comment_date( 'jS F Y' ); ?>, <a href="#comment-<?php comment_ID(); ?>" itemprop="url"><?php comment_time(); ?></a>
				</time>

				<?php if ( current_user_can( 'edit_comment', $comment->comment_ID ) ) : ?>
					<a href="<?php echo esc_url( get_edit_comment_link( $comment ) ); ?>" class="<?php echo esc_attr( $base_class . '__edit-comment-link' ); ?>">
						<p class="<?php echo esc_attr( $base_class . '__meta-item' ); ?>"><?php esc_html_e( 'Edit this comment', 'zao-starter-theme' ); ?></p>
					</a>
				<?php endif; ?>

				<?php if ( '0' === $comment->comment_approved ) : ?>
					<p class="<?php echo esc_attr( $base_class . '__meta-item' ); ?>"><?php esc_html_e( 'Your comment is awaiting moderation.', 'zao-starter-theme-starter-theme' ); ?></p>
				<?php endif; ?>
			</div>
			<div class="<?php echo esc_attr( $base_class . '__content' ); ?>" itemprop="about">
				<?php comment_text(); ?>
				<?php
				comment_reply_link(
					array_merge(
						$args, array(
							'add_below' => 'comment',
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
						)
					)
				);
				?>
			</div>

		<?php
	}

	/**
	 * Ends the element output, if needed.
	 *
	 * @since 2.7.0
	 *
	 * @see Walker::end_el()
	 * @see wp_list_comments()
	 *
	 * @param string     $output  Used to append additional content. Passed by reference.
	 * @param WP_Comment $comment The current comment object. Default current comment.
	 * @param int        $depth   Optional. Depth of the current comment. Default 0.
	 * @param array      $args    Optional. An array of arguments. Default empty array.
	 */
	public function end_el( &$output, $comment, $depth = 0, $args = array() ) {
		?>

		</li>

		<?php
	}
}
