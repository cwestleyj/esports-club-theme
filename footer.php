<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EsportsClub
 */



?>

	</div><!-- #content -->

	<footer class="footerBottom">

		<?php
				wp_nav_menu( array(
						'menu'              => 'footer',
						'theme_location'    => 'footer',
						'depth'             => 2,
						'container'         => 'div',
						'menu_class'        => 'nav navbar-nav',
						'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
						'walker'            => new wp_bootstrap_navwalker())
				);
		?>






<p class="sig">Gamers Hall is a student organization within the Indiana-Purdue University institution. </p>
<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'esports-club-theme' ) ); ?>"><?php
	/* translators: %s: CMS name, i.e. WordPress. */
	printf( esc_html__( 'Proudly powered by %s', 'esports-club-theme' ), 'WordPress' );
?></a>
<span class="sep"> | </span>
<?php
	/* translators: 1: Theme name, 2: Theme author. */
	printf( esc_html__( 'Theme: %1$s by %2$s.', 'esports-club-theme' ), 'esports-club-theme', '<a href="http://www.westleyj.com">Clinton Jones</a>' );
?>

</div><!-- .site-info -->
</footer><!-- #colophon -->
<footer style="text-align:center;">
	<?php if ( get_theme_mod( 'school_logo' ) ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="site-logo" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">

			<img class="schoolLogo" src="<?php echo get_theme_mod( 'school_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">

	</a>

	<?php else : ?>

	<hgroup>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<p class="site-description"><?php bloginfo( 'description' ); ?></p>

	</hgroup>

<?php endif; ?>

</footer>
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
