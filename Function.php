<?php
/**
 * creative functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package creative
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function creative_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on creative, use a find and replace
		* to change 'creative' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'creative', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'creative' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'creative_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'creative_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function creative_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'creative_content_width', 640 );
}
add_action( 'after_setup_theme', 'creative_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function creative_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'creative' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'creative' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'creative_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function creative_scripts() {
	wp_enqueue_style( 'creative-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'creative-style', 'rtl', 'replace' );

	wp_enqueue_script( 'creative-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'creative_scripts' );

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

function theme_enqueue_styles_scripts() {
    // Enqueue Styles
	wp_enqueue_style('slick-css', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('slick-css', get_template_directory_uri() . '/css/slick-theme.css');

    wp_enqueue_style('main-style', get_stylesheet_uri()); // Loads style.css

    // Enqueue Scripts
	wp_enqueue_script('jquery-js', get_template_directory_uri() . '/js/jquery.js', array('jquery'), null, true);
	wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), null, true);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), null, true);
    wp_enqueue_script('slick-js', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles_scripts');



// Register Custom Post Type: Property
function register_property_post_type() {
    $labels = array(
        'name'               => 'Properties',
        'singular_name'      => 'Property',
        'menu_name'          => 'Properties',
        'name_admin_bar'     => 'Property',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Property',
        'new_item'           => 'New Property',
        'edit_item'          => 'Edit Property',
        'view_item'          => 'View Property',
        'all_items'          => 'All Properties',
        'search_items'       => 'Search Properties',
        'not_found'          => 'No properties found.',
        'not_found_in_trash' => 'No properties found in Trash.',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'properties'),
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'       => true, // Enables Gutenberg & REST API support
        'menu_icon'          => 'dashicons-admin-home',
    );

    register_post_type('property', $args);
}
add_action('init', 'register_property_post_type');

// Register Custom Taxonomy: Property Type
function register_property_type_taxonomy() {
    $labels = array(
        'name'              => 'Property Types',
        'singular_name'     => 'Property Type',
        'search_items'      => 'Search Property Types',
        'all_items'         => 'All Property Types',
        'parent_item'       => 'Parent Property Type',
        'parent_item_colon' => 'Parent Property Type:',
        'edit_item'         => 'Edit Property Type',
        'update_item'       => 'Update Property Type',
        'add_new_item'      => 'Add New Property Type',
        'new_item_name'     => 'New Property Type Name',
        'menu_name'         => 'Property Types',
    );

    $args = array(
        'hierarchical'      => true, // Set to false for tags-like behavior
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'rewrite'           => array('slug' => 'property-type'),
        'show_in_rest'      => true, // Enables Gutenberg & REST API support
    );

    register_taxonomy('property-type', array('property'), $args);
}
add_action('init', 'register_property_type_taxonomy');






function enqueue_property_ajax_scripts() {
    wp_enqueue_script('property-ajax', get_template_directory_uri() . '/js/property-ajax.js', array('jquery'), null, true);

    wp_localize_script('property-ajax', 'property_ajax_obj', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_property_ajax_scripts');


function load_more_properties_ajax() {
    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $term  = isset($_POST['property_type']) ? sanitize_text_field($_POST['property_type']) : '';

    $args = array(
        'post_type'      => 'property',
        'posts_per_page' => 3,
        'paged'          => $paged,
        'post_status'    => 'publish',
    );

    if ($term && $term !== 'all') {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'property-type',
                'field'    => 'slug',
                'terms'    => $term,
            ),
        );
    }

    $query = new WP_Query($args);

    // Debugging output
    error_log('WP_Query Args: ' . print_r($args, true));
    error_log('SQL Query: ' . $query->request);
    error_log('Found Posts: ' . $query->found_posts);

    if ($query->have_posts()) {
        ob_start();

        while ($query->have_posts()) : $query->the_post();
            get_template_part('template-parts/property-result');
        endwhile;

        wp_reset_postdata();
        echo ob_get_clean();
    } else {
        echo '<p>No properties found.</p>';
    }

    wp_die();
}




add_action('wp_ajax_load_more_properties', 'load_more_properties_ajax');

