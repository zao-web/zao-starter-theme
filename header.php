<?php
/**
 * The template for displaying the header.
 *
 * @package ZaoStarterTheme
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php do_action( 'after_body' ); ?>

		<!-- .site-wrapper -->
		<div id="page" class="site">

		<!-- Skip to content -->
		<a href="#content" class="o-skip-to-content"><?php esc_html_e( 'Skip to Content', 'zao-starter-theme' ); ?></a>
		<!-- /Skip to content -->

		<!-- site-header -->
		<?php get_template_part( 'template-parts/site-header' ); ?>
		<!-- /site-header -->

		<!-- site-content -->
		<main id="content" class="site-content" role="main">
