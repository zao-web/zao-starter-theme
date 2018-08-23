<?php
/**
 * The template part for displaying search results content.
 *
 * @package ZaoStarterTheme
 */

?>

<li class="c-search-list__item" itemscope itemtype="https://schema.org/Thing">
	<?php

	/*
	 * Customize w/ get_the_post_thumbnail() to add schema
	 * @link https://developer.wordpress.org/reference/functions/get_the_post_thumbnail
	 */
	if ( has_post_thumbnail() ) {
		the_post_thumbnail();
	}
	?>

	<!-- Standard URL and name itemprops -->
	<?php the_title( '<span class="c-search-list__title" itemprop="name"><a href="' . esc_url( get_permalink() ) . '" itemprop="url">', '</a></span>' ); ?>

	<!-- A description of the post content - the excerpt -->
	<div class="c-search-list__description" itemprop="description">
	<?php
	/**
	 * Customize the Read More link by using the "excerpt_more" filter
	 *
	 * @link https://developer.wordpress.org/reference/functions/the_excerpt/
	 * @link https://codex.wordpress.org/Customizing_the_Read_More
	 */

	the_excerpt();
	?>
	</div><!--/itemprop=description-->
</li>
