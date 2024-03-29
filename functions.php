<?php
/**
 * anthonyfajardo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package anthonyfajardo
 */

if ( ! function_exists( 'anthonyfajardo_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function anthonyfajardo_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on anthonyfajardo, use a find and replace
		 * to change 'anthonyfajardo' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'anthonyfajardo', get_template_directory() . '/languages' );

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
			'primary' => esc_html__( 'primary', 'anthonyfajardo' ),
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
		add_theme_support( 'custom-background', apply_filters( 'anthonyfajardo_custom_background_args', array(
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
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'anthonyfajardo_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function anthonyfajardo_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'anthonyfajardo_content_width', 640 );
}
add_action( 'after_setup_theme', 'anthonyfajardo_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function anthonyfajardo_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'anthonyfajardo' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'anthonyfajardo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'anthonyfajardo_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

function anthonyfajardo_styles() {
	wp_enqueue_style( 'anthonyfajardo-style', get_stylesheet_uri() );

	wp_enqueue_style( 'anthonyfajardo-fonts', 'https://fonts.googleapis.com/css?family=Lora:400,700&display=swap');
}
add_action( 'wp_enqueue_scripts', 'anthonyfajardo_styles');

function anthonyfajardo_scripts() {

	wp_enqueue_script( 'minified javascript', get_template_directory_uri(). '/scripts.min.js', array('jquery'), '20151215', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'anthonyfajardo_scripts' );


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



/***************************
*
*	CUSTOM FUNCTIONS 
*
***************************/

/* dump() - makes for easy debugging. <?php dump($post); ?> */
function dump($obj) {
	echo "<pre>";
	print_r($obj);
	echo "</pre>";
}

/*
Show featured image as background image
*/

function featured_image_url($currentPost){
	$image_id = get_post_thumbnail_id($currentPost->ID);
	$image_url= wp_get_attachment_url($image_id);
	return $image_url;
}


/*
Numeric Pagination for Blog Posts (not single post) 
*/

function numeric_pagination(){
	if( is_singular() )
	        return;
	 
	    global $wp_query;
	 
	    /** Stop execution if there's only 1 page */
	    if( $wp_query->max_num_pages <= 1 )
	        return;
	 
	    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	    $max   = intval( $wp_query->max_num_pages );
	 
	    /** Add current page to the array */
	    if ( $paged >= 1 )
	        $links[] = $paged;
	 
	    /** Add the pages around the current page to the array */
	    if ( $paged >= 3 ) {
	        $links[] = $paged - 1;
	        $links[] = $paged - 2;
	    }
	 
	    if ( ( $paged + 2 ) <= $max ) {
	        $links[] = $paged + 2;
	        $links[] = $paged + 1;
	    }
	 
	    echo '<div class="pagination"><ul>' . "\n";
	 
	    /** Previous Post Link */
	    if ( get_previous_posts_link() )
	        printf( '<li class="previous">%s</li>' . "\n", get_previous_posts_link() );
	 
	    /** Link to first page, plus ellipses if necessary */
	    if ( ! in_array( 1, $links ) ) {
	        $class = 1 == $paged ? ' class="active"' : '';
	 
	        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
	 
	        if ( ! in_array( 2, $links ) )
	            echo '<li>…</li>';
	    }
	 
	    /** Link to current page, plus 2 pages in either direction if necessary */
	    sort( $links );
	    foreach ( (array) $links as $link ) {
	        $class = $paged == $link ? ' class="active"' : '';
	        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	    }
	 
	    /** Link to last page, plus ellipses if necessary */
	    if ( ! in_array( $max, $links ) ) {
	        if ( ! in_array( $max - 1, $links ) )
	            echo '<li>…</li>' . "\n";
	 
	        $class = $paged == $max ? ' class="active"' : '';
	        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	    }
	 
	    /** Next Post Link */
	    if ( get_next_posts_link() )
	        printf( '<li class="next">%s</li>' . "\n", get_next_posts_link() );
	 
	    echo '</ul></div>' . "\n";	
}