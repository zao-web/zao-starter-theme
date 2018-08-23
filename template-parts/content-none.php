<?php
/**
 * The template for displaying a message that posts cannot be found.
 *
 * @package ZaoStarterTheme
 */

?>

<h1 class="o-heading-1"><?php esc_html_e( 'Nothing Found', 'zao-starter-theme' ); ?></h1>

<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

	<p>
	<?php
	printf(
		wp_kses(
			/* translators: the edit post url */
			esc_html__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'zao-starter-theme' ),
			array(
				'a' => array(
					'href' => array(),
				),
			)
		),
		esc_url( admin_url( 'post-new.php' ) )
	);
	?>
	</p>

<?php elseif ( is_search() ) : ?>

	<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'zao-starter-theme' ); ?></p>
	<?php get_search_form(); ?>

<?php else : ?>

	<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'zao-starter-theme' ); ?></p>
	<?php get_search_form(); ?>
	
<?php endif; ?>
