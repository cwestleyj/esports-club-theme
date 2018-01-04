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

<div id="primary" class="content-area">
	<main id="main" class="site-main">

<div class="container-fluid splashBkg">
<h1 class="textarea"> Welcome to Gamers Hall </h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sed pharetra lectus. Vivamus egestas suscipit libero eget ultrices. Nunc lacinia urna at arcu hendrerit gravida. Praesent cursus tortor nulla, eu iaculis nulla pellentesque quis. Ut non ultrices est. Integer eu lacus id diam vestibulum rhoncus. Nullam at dapibus magna. Mauris fermentum, nibh vitae mattis luctus, mi velit elementum enim, tristique convallis quam augue ut velit. Sed luctus tincidunt risus eu elementum. Quisque ut aliquet enim.</p>

<div class="col-md-6 col-sm-12">
		<h2 class="tribe-events-page-title"><?php echo tribe_get_events_title() ?></h2>
		<div class="well">
	<?php
	$events = tribe_get_events( array(
	    'posts_per_page' => 5,

	) );

	// Loop through the events, displaying the title
	// and content for each
	foreach ( $events as $event ) {
	    echo "
			<ul>
	<li><a href='#'> <h4>$event->post_title</h4></a></li</ul>";
	}



	?>


	</div>
</div>

<div class="col-md-6 col-sm-12">
<h2> News</h2>

<div class="well">
<?php
// the query
$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
<?php if ( $wpb_all_query->have_posts() ) : ?>
		<ul>
    <!-- the loop -->
    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php endwhile; ?>
    <!-- end of the loop -->
		</ul>
    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
</div>


</div>




<!-- end container fluid -->
</div>



<div class="col-12-md">
<h1> Sticky posts </h1>
<div class="trending-right">
   <?php
     $sticky = get_option( 'sticky_posts' ); // Get all sticky posts
     rsort( $sticky ); // Sort the stickies, latest first
     $sticky = array_slice( $sticky, 0, 2 ); // Number of stickies to show
     query_posts( array( 'post__in' => $sticky, 'caller_get_posts' => 1 ) ); // The query

     if (have_posts() ) { while ( have_posts() ) : the_post(); ?>
     <div class="trend-post">

     <div class="thumb"><?php the_post_thumbnail(array(150,100)); ?></div>
     <div class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?>
		 </a></div>
		 <?php the_content(); ?>
     </div>
     <?php endwhile;?>
     <?php } else { echo ""; }
		 wp_reset_query();

		 ?>

</div>

</div>

<!-- end main -->
</main>

<!-- end content area -->
</div>


</body>
<!-- end container fluid  -->

<?php
get_sidebar();
get_footer();
