<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage vanlig
 * @since 1.0
 * @version 2.0
 */

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
  <div class="l-wrap">
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'c-news-content' ); ?>>
	  <header class="c-news-content__header">
		<?php the_title( '<h1 class="o-heading-1">', '</h1>' ); ?>
		<h4 class="heading-4">Posted by: <?php the_author(); ?></h4>
	  </header>
	  <div class="c-news-content__article wysiwyg">
		<?php the_content(); ?>
	  </div>

	  <!-- Comments -->
	  <?php comments_template(); ?>
	  <!-- Comments -->

	</article>
  </div>
<?php endwhile; ?>

<?php get_sidebar(); ?>
<?php
get_footer();
