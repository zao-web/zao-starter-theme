<?php
/**
 * The template for displaying the logo.
 *
 * @package WordPress
 * @subpackage ZaoStartTheme
 * @since 1.0
 * @version 2.0
 */

?>

<div itemscope itemtype="http://schema.org/Organization">
	<a itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<?php
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$logo           = wp_get_attachment_image_src( $custom_logo_id, 'full' );
		$alt_text       = get_post_meta( $custom_logo_id, '_wp_attachment_image_alt', true );
		?>

		<?php if ( has_custom_logo() ) : ?>

			<img class="o-site-header__logo-image" itemprop="logo" src="<?php echo esc_url( $logo[0] ); ?>" alt="<?php echo esc_attr( $alt_text ); ?>">
			<span class="o-screen-reader-text"><?php get_bloginfo( 'name' ); ?></span>

		<?php else : ?>

			<h1 class="o-site-header__site-title"><?php get_bloginfo( 'name' ); ?></h1>

		<?php endif; ?>
	</a>
</div>
