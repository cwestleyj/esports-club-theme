<?php
/**
 * EsportsClub functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package EsportsClub
 */

 remove_action( 'wpclubmanager_before_main_content', 'wpclubmanager_output_content_wrapper', 10);
remove_action( 'wpclubmanager_after_main_content', 'wpclubmanager_output_content_wrapper_end', 10);

if ( ! function_exists( 'esports_club_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function esports_club_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on EsportsClub, use a find and replace
		 * to change 'esports-club-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'esports-club-theme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'esports-club-theme' ),
			'footer' => esc_html__( 'Footer', 'esports-club-theme' ),
		) );
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'esports_club_theme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',

		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */


   add_theme_support( 'school-logo', array(
     'height'      => 100,
     'width'       => 100,
     'flex-width'  => true,
     'flex-height' => true,
   ) );
	}
endif;
add_action( 'after_setup_theme', 'esports_club_theme_setup' );

function school_customize_register( $wp_customize ) {
    $wp_customize->add_setting( 'school_logo' ); // Add setting for logo uploader

    // Add control for logo uploader (actual uploader)
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'School_logo', array(
        'label'    => __( 'Upload Your School Logo (replaces text)', 'School' ),
        'section'  => 'title_tagline',
        'settings' => 'school_logo',
        'class' => '.schoolLogo'
    ) ) );
}
add_action( 'customize_register', 'school_customize_register' );

/**
 * Add preconnect for Google Fonts. Taken from 2017 theme
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function esports_club_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'esports_club-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'esports_club_resource_hints', 10, 2 );






/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function esports_club_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'esports_club_theme_content_width', 700 );
}
add_action( 'after_setup_theme', 'esports_club_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function esports_club_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'esports-club-theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'esports-club-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'esports_club_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */	function esports_load_external_script() {

 	    wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
 	    wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), '3.3.7', true );
 	}
 	add_action('wp_enqueue_scripts', 'esports_load_external_script');



// BEGIN PLUGIN FUNCTIONS
function esports_club_theme_scripts() {


// Enqueue Google fonts
	wp_enqueue_style( 'Google Fonts', 'https://fonts.googleapis.com/css?family=Merriweather|Raleway' );

	wp_enqueue_script( 'esports-club-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'esports-club-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

		wp_enqueue_style( 'esports-club-theme-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'esports_club_theme_scripts' );



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// DEV FUNCTIONS BEGIN


// change excerpt length
function new_excerpt_length($length) {
return 100;
}
add_filter('excerpt_length', 'new_excerpt_length');

// Changing excerpt more
function new_excerpt_more($more) {
return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Register Custom Navigation Walker
require_once get_template_directory() . '/wp-bootstrap-navwalker.php';


// Add new sports to plugin hook
// function custom_add_new_sport( $sport ) {
// 	$sport['Overwatch'] = array(
// 		'name' => __( 'Overwatch', 'esports-club-theme' ),
// 		'terms' => array(
// 			'wpcm_position' => array(
// 				array(
// 					'name' => 'Tank',
// 					'slug' => 'tank',
// 				),
// 				array(
// 					'name' => 'Support',
// 					'slug' => 'support',
// 				),
// 				array(
// 					'name' => 'Core DPS',
// 					'slug' => 'core-dps',
// 				),
// 				array(
// 					'name' => 'Flex DPS',
// 					'slug' => 'flex-dps',
// 				),
// 			)
// 		)
//   ),
//
// 	return $sport;
// }
// );
// add_filter( 'wpcm_sports', 'custom_add_new_sport', 10, 1 );



// add login to nav
add_filter('wp_nav_menu_items', 'add_login_logout_link', 10, 2);
function add_login_logout_link($items, $args) {
        $loginoutlink = wp_loginout('index.php', false);
        $items .= '<li>'. $loginoutlink .'</li>';
    return $items;
}



// Hooks for footer


// Get IU Logo from image library


// Get the image first
function get_images_from_media_library() {
    $args = array(
        'post_type' => 'attachment',
        'post_mime_type' =>'image',
        'post_status' => 'inherit',
        'posts_per_page' => 1,

    );
    $query_images = new WP_Query( $args );
    $images = array();
    foreach ( $query_images->posts as $image) {
        $images[]= $image->guid;
    }
    return $images;
}

// display the image
function display_images_from_media_library() {

    $imgs = get_images_from_media_library();
    $html = '<div id="media-gallery">';

    foreach($imgs as $img) {

        $html .= '<img src="' . $img . '" alt="" />';

    }

    $html .= '</div>';

    return $html;

}

// Replace the wp-login page logo with your own

function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/ghlogo.png);
		height:75px;
		width:auto;
		background-size: 105px;
		background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_school_logo() { ?>
    <style type="text/css">
        .schoolLogo{
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/soic-logo.jpg);
		height:75px;
		width:auto;
		background-size: 105px;
		background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_school_logo' );


// font awesome
//enqueues our external font awesome stylesheet
function enqueue_our_required_stylesheets(){
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
}
add_action('wp_enqueue_scripts','enqueue_our_required_stylesheets');


// add hook for ordering events pro

add_action( 'pre_get_posts', 'tribe_post_date_ordering', 51 );

function tribe_post_date_ordering( $query ) {
	if ( ! empty( $query->tribe_is_multi_posttype ) ) {
		remove_filter( 'posts_fields', array( 'Tribe__Events__Query', 'multi_type_posts_fields' ) );
		$query->set( 'order', 'DESC' );
	}
}

// declare wp club manager support
add_theme_support( 'wpclubmanager' );

// unhook wp club add_theme_support
remove_action( 'wpclubmanager_before_main_content', 'wpclubmanager_output_content_wrapper', 10);
remove_action( 'wpclubmanager_after_main_content', 'wpclubmanager_output_content_wrapper_end', 10);


add_action('wpclubmanager_before_main_content', 'my_theme_wrapper_start', 10);
add_action('wpclubmanager_after_main_content', 'my_theme_wrapper_end', 10);
function my_theme_wrapper_start() {
	echo '<section id="main_wpclub_template">';
}
function my_theme_wrapper_end() {
	echo '</section>';
}
