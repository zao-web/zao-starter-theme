<?php
/**
 * The template for displaying the a post item.
 *
 * @package WordPress
 * @subpackage ZaoStarterTheme
 * @since 1.0
 * @version 2.0
 */

?>

 <article id="post-<?php the_ID(); ?>" <?php post_class( 'o-post-teaser' ); ?>>
	<header class="o-post-teaser__header">
	  <h2 class="o-post-teaser__title o-heading-3">
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	  </h2>
	  <time class="o-post-teaser__date"><?php echo get_the_date(); ?></time>
		<?php the_post_thumbnail(); ?>
	</header>
	<div class="o-post-teaser__content">
		<?php the_excerpt(); ?>
	</div>
	<footer class="o-post-teaser__footer">
	  <a class="o-btn o-btn--primary" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'zao-starter-theme' ); ?></a>
	</footer>
</article>
