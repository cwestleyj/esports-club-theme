<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EsportsClub
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

<!-- see footer for script link -->
	<?php wp_head(); ?>


</head>

<body <?php body_class(); ?>>

<!-- https://web-crunch.com/use-bootstrap-recreate-wordpress-menu-nav/ -->

	<!-- using bootstrap navwalker from github -->
	<!-- https://github.com/wp-bootstrap/wp-bootstrap-navwalker -->
	<header id="masthead" class="site-header" role="banner">
    <nav class="navbar navbar-inverse " role="navigation">
	        <!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
				<div class="esportsLogo">
					<?php the_custom_logo();?>
				</div>
				</div>


<!-- Populate links and hook into navwalker class -->
				<?php
				wp_nav_menu( array(
						'menu'              => 'primary',
						'theme_location'    => 'primary',
						'depth'             => 2,
						'container'         => 'div',
						'container_class'   => 'collapse navbar-collapse',
				'container_id'      => 'bs-example-navbar-collapse-1',
						'menu_class'        => 'nav navbar-nav',
						'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
						'walker'            => new wp_bootstrap_navwalker())
				);
				?>
	    </nav>

	<figure class="rolf">

		<?php the_header_image_tag(); ?>
	</figure>

	</header>
