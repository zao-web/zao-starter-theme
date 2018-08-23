<?php
/**
 * The template for displaying the search results.
 *
 * @package ZaoStarterTheme
 */

get_header(); ?>

<div itemscope itemtype="https://schema.org/SearchResultsPage">

<?php if ( have_posts() ) : ?>

	<!-- Title for search results containing search term -->
	<h1 class="o-heading-1">
	<?php
		printf( esc_html__( 'Search Results for: %s', 'zao-starter-theme' ), '<span>' . esc_html( get_search_query() ) . '</span>' );
	?>
	</h1>

	<ol class="c-search-list">
	<?php
	/* Start the Loop */
	while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/content', 'search' );
	endwhile;
	?>
	</ol>

	<?php

	the_posts_navigation();

else :

	get_template_part( 'template-parts/content', 'none' );

endif;
?>

</div>

<?php get_footer(); ?>
