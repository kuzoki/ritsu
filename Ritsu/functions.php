<?php
/**
 * Ritsu-Blog Template functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ritsu-Blog_Template
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'ritsu_blog_template_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ritsu_blog_template_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Ritsu-Blog Template, use a find and replace
		 * to change 'ritsu-blog-template' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ritsu-blog-template', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'ritsu-blog-template' ),
				'menu-2' => esc_html__( 'Primary-icons', 'ritsu-blog-template' ),
				'footer-menu' => esc_html__( 'Footer-icons', 'ritsu-blog-template' ),
				'side-bar-social' => esc_html__( 'SideBar-scoial', 'ritsu-blog-template' ),
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
				'ritsu_blog_template_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'ritsu_blog_template_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ritsu_blog_template_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ritsu_blog_template_content_width', 640 );
}
add_action( 'after_setup_theme', 'ritsu_blog_template_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ritsu_blog_template_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ritsu-blog-template' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ritsu-blog-template' ),
			'before_widget' => '<div id="%1$s" class="sidebar-sec">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="side-section-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'ritsu_blog_template_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ritsu_blog_template_scripts() {
	wp_enqueue_style( 'ritsu-blog-template-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'ritsu-blog-template-style', 'rtl', 'replace' );

	wp_enqueue_script( 'ritsu-blog-template-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ritsu_blog_template_scripts' );

/**
 * Enqueue scripts and My Custom styles and script.
 */

require get_template_directory() . '/inc/script_load.php';



/*
 	***** Customizer additions.
*/
require get_template_directory() . '/inc/customizer.php';


/*
 	 	FaceBook Widget

*/

require get_template_directory() . '/inc/facebook_widget.php';


/*
 	 	Author_widget Widget

*/


require get_template_directory() . '/inc/author_widget.php';


/*
 	 	Filter Search In post Only

*/

function SearchFilter($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}
add_filter('pre_get_posts','SearchFilter');

/**
 * 	Add Active Class To menu
 * 
 */
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'active ';
  }
  return $classes;
}

	
/**
 *  Comment Function
 */

require get_template_directory() . '/inc/comment-fun.php';


/*
    @package Alex Template

    ============================================
        Required Plugin Setting (TGM)
    =============================================

*/
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/inc/required-plugins.php';




