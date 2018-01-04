

<?php
// Template Name: wednesdaycomp

get_header(); ?>


<div class="container splashBkg">
<h1>Yeah boi</h1>

<div class="container col-lg-6">
	<h2> Upcoming Events:</h2>
	<table>
		<th>
			FARTS
		</th>
		<th>
			PIZZA
		</th>
		<th>
			PIE
		</th>
		<tbody>
			<th>what</th>
			<td>7</td>
			<th>what</th>
			<td>7</td>
			<td>7</td><?php
			/**
			 * The main template file
			 *
			 * This is the most generic template file in a WordPress theme
			 * and one of the two required files for a theme (the other being style.css).
			 * It is used to display a page when nothing more specific matches a query.
			 * E.g., it puts together the home page when no home.php file exists.
			 *
			 * @link https://codex.wordpress.org/Template_Hierarchy
			 *
			 * @package WordPress
			 * @subpackage Twenty_Seventeen
			 * @since 1.0
			 * @version 1.0
			 */

			get_header(); ?>

			<div class="wrap">
				<?php if ( is_home() && ! is_front_page() ) : ?>
					<header class="page-header">
						<h1 class="page-title"><?php single_post_title(); ?></h1>
					</header>
				<?php else : ?>
				<header class="page-header">
					<h2 class="page-title"><?php _e( 'Posts', 'twentyseventeen' ); ?></h2>
				</header>
				<?php endif; ?>

				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

						<?php
						if ( have_posts() ) :

							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/post/content', get_post_format() );

							endwhile;

							the_posts_pagination( array(
								'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
								'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
							) );

						else :

							get_template_part( 'template-parts/post/content', 'none' );

						endif;
						?>

					</main><!-- #main -->
				</div><!-- #primary -->
				<?php get_sidebar(); ?>
			</div><!-- .wrap -->

			<?php get_footer();

			<td>7</td>
			<td>7</td>
		</tbody>
	</table>
	<p class="well"></p>


</div>
<div class="container col-lg-6">
<h2> other shit</h2>
	<p class="well">omg oh boi</p>
</div>


	</div><!-- #container-fluid -->
