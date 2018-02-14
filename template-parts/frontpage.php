<?php
/**
 * Template Name: Front Page
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EsportsClub
 */

get_header(); ?>

<body>
	<?php
get_sidebar();
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">

<div class="entry-content container-fluid splashBkg">
<h1 class="textarea"> Welcome to Gamers Hall </h1>
	<p>Gamers Guild and Esports are two organizations on campus combining under on name in order to push the growth of gaming as a whole on IUPUI campus. Both student organizations have their strengths and weaknesses and the merger allows the strengths of both sides of the relationship to show while making up for each others' weaknesses. We exist to provide our student body membership with a safe place to gather and play a wide spectrum of traditional and electronic games. We also provide a high quality eSports training enviroment for competitions taking place at the collegiate level. </p>

	<p> We're growing our eSports collegiate teams every semester! If you're interested in competing against other colleges in games like Dota 2, League of Legends, Overwatch, or Hearthstone, check out our page <a href="www.twitter.com/iupuigamershall" target="_blank">here.</a>
		<br/>



<div class="row">
<div class="entry-content col-sm-12 col-lg-6">
		<a href="www.twitter.com/iupuigamershall" title="Click here to visit the Gamers Hall Twitter page" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
		<p class="center">Follow <a href="https://www.twitter.com/iupuigamershall" target="_blank">@IUPUIGamersHall</a> for the latest on our Jaguar eSports teams.
</p>
</div>

<div class=" entry-content col-sm-12 col-lg-6">
	<a href="www.twitter.com/iupuigamershall" title="Click here to visit the Gamers Hall Facbook page" target="_blank">
		<i class="fa fa-facebook-official" aria-hidden="true"></i>
	</a>
<p class="center">Check out our <a href="https://www.facebook.com/groups/1444286732458754/" title="Click here to visit the Gamers Hall Facbook page"  target="_blank">Facebook for more pictures, posts, and giveaways.</a><i> Note:must be member or alumni of IUPUI.</i></p>
</div>
</div>


<div class="row">
	<div class="col-md-6 col-sm-12">
			<h2 class="fontPkg">Upcoming Events:</h2>
			<div class="well">
					<?php
					$wpb_all_query = new WP_Query(array('post_type'=>'tribe_events', 'post_status'=>'publish', 'posts_per_page'=>5)); ?>

					<?php if ( $wpb_all_query->have_posts() ) : ?>
							<ul>
					    <!-- the loop -->
					    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
										<li>
											<h4>
												<a class="tribe-event-url" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title_attribute() ?>" rel="bookmark">
													<?php the_title() ?>
													<?php echo tribe_events_event_schedule_details() ?>
												</a>
												<?php echo tribe_events_get_the_excerpt( null, wp_kses_allowed_html( 'post' ) ); ?>

											</h4>
										</li>
					    <?php endwhile; ?>
					    <!-- end of the loop -->
							</ul>
					    <?php wp_reset_postdata(); ?>
					<?php else : ?>
					    <p><?php _e( '<h3> Check back next semester for updates on future events! </h3>' ); ?></p>
					<?php endif; ?>
				</div>


			</div>
			<!-- end col 6 -->




	<div class="col-md-6 col-sm-12">
		<h2 class="fontPkg"> News</h2>

		<div class="well">
		<?php
		// the query
		$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>5)); ?>
		<?php if ( $wpb_all_query->have_posts() ) : ?>
				<ul>
		    <!-- the loop -->
		    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
							<li>
								<h4>
									<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
								</h4>
							</li>
		    <?php endwhile; ?>
		    <!-- end of the loop -->
				</ul>
		    <?php wp_reset_postdata(); ?>
		<?php else : ?>
		    <p><?php _e( 'No sticky posts present. Please contact gamehall@iupui.edu' ); ?></p>
		<?php endif; ?>
		</div>
		<!-- end well -->


</div>
<!-- end 2nd col 6 div -->



</div>
<!-- end row -->



<div class="col-12-md">
	<div class="row">
		<h1> Sticky posts </h1>
		<hr>
			<div class="trending-right">
	   			<?php
				     $sticky = get_option( 'sticky_posts' ); // Get all sticky posts
				     rsort( $sticky ); // Sort the stickies, latest first
				     $sticky = array_slice( $sticky, 0, 2 ); // Number of stickies to show
				     query_posts( array( 'post__in' => $sticky, 'caller_get_posts' => 1 ) );
						 // The query
				     if (have_posts() ) { while ( have_posts() ) : the_post(); ?>

	     <div class="title">
				 <a href="<?php the_permalink() ?>">
					 <?php the_title(); ?>
			 	 </a>
		 	 </div>

			 <div class="thumb">
				 <?php the_post_thumbnail(array(150,100)); ?>
			 </div>
			 <div class="container">
			 <?php the_content(); ?>
	     <?php endwhile;?>
		 <?php } else { echo "Whoops, no content here. Please contact gamehall@iupui.edu."; }
			 wp_reset_query();

			 ?>
		 </div>

	</div>
	<!-- end trending right -->

	</div>
	<!-- end row -->
</div>
<!-- end col-12 -->

<!-- end main -->
</main>

<!-- end content area -->
</div>



<!-- end container fluid -->
</div>


<?php

get_footer();
