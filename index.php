<?php
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
 * @package EsportsClub
 */

get_header(); ?>


<div class="container splashBkg">
<h1 class="textarea"> Welcome to Gamers Hall </h1>

<div class="col-lg-6">
		<h2 class="tribe-events-page-title"><?php echo tribe_get_events_title() ?></h2>
	<?php
	$events = tribe_get_events( array(
	    'posts_per_page' => 5,

	) );

	// Loop through the events, displaying the title
	// and content for each
	foreach ( $events as $event ) {
	    echo "
	<h4>$event->event</h4>
";
	}
	?>
</p>



</div>
<div class="col-lg-6">
<h2> News</h2>
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
<!-- end container fluid  -->

<?php
get_sidebar();
get_footer();
