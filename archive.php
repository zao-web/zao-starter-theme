<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage ZaoStarterTheme
 * @since 1.0
 * @version 2.0
 */

get_header();
?>

<?php
if ( have_posts() ) :
	?>

<!-- posts container -->
<section class="c-articles">

  <div class="c-articles__grid">
	<?php
	/* Start the Loop */
	while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/post-teaser' );
		endwhile;
	?>
  </div>

  <!-- sidebar -->
  <div class="c-articles-sidebar">
	<?php get_sidebar(); ?>
  </div>
  <!-- sidebar -->

</section>
<!-- /posts container -->

<!-- posts pagination -->
<div class="c-articles-pagination">
	<?php pagination(); ?>
</div>
<!-- posts pagination -->

	<?php
	endif;
?>

<?php
get_footer();
