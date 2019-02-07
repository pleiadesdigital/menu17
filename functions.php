<?php
/* SETUP FUNCTIONS */
if (!function_exists('menu17_setup')) :
	function menu17_setup() {
		// TRANSLATION
		load_theme_textdomain('menu17', get_template_directory() . '/languages');
		// TEMPLATE TAGS
		add_theme_support( 'title-tag' );
		add_theme_support('post-thumbnails');
		// REGISTER NAV MENUS
		register_nav_menus(array(
			'top' 		=> esc_html__('Top Menu', 'menu17'),
			'social' 	=> esc_html__('Social Menu Links', 'menu17'),
		));
		// VALID HTML5
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));
		// CUSTOM LOGO
		add_theme_support('custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		));
	}
endif;
add_action('after_setup_theme', 'menu17_setup');

/* WIDGET AREAS */
function menu17_widgets_init() {
	register_sidebar(array(
		'name'          => esc_html__('Sidebar', 'menu17'),
		'id'            => 'sidebar-1',
		'description'   => esc_html__('Add widgets here.', 'menu17'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
}
add_action('widgets_init', 'menu17_widgets_init');

/* SCRIPTS AND STYLES */
function menu17_scripts() {

	/* STYLES AND FONTS */

	// Main Styles
	wp_enqueue_style('menu17-style', get_stylesheet_uri());

	// Google Fonts
	wp_enqueue_style('menu17-fonts', 'https://fonts.googleapis.com/css?family=Titillium+Web:300,400,400i,600,700');

	/* SCRIPTS */
	// Main Navigation
	wp_enqueue_script('menu17-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20151215', true);

	// Setup menu17ScreenReaderText for 2017 navigation to work
	wp_localize_script('menu17-navigation', 'menu17ScreenReaderText' , array(
		'expand'			=> __('Expand child menu', 'menu17'),
		'collapse'		=> __('Collapse child menu', 'menu17')
	));

	// Skip Link Focus
	wp_enqueue_script('menu17-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

	// Comments Replay
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'menu17_scripts');

/* Add Preconnect for Google Fonts */
function menu17_resource_hints($urls, $relation_type) {
	if (wp_style_is('menu17-fonts', 'queue') && 'preconnect' === $relation_type) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}
	return $urls;
}
add_filter('wp_resource_hints', 'menu17_resource_hints', 10, 2);

/* Implement the Custom Header feature */
require get_template_directory() . '/inc/custom-header.php';

/* Custom template tags for this theme */
require get_template_directory() . '/inc/template-tags.php';

/* Functions which enhance the theme by hooking into WordPress */
require get_template_directory() . '/inc/template-functions.php';

// SVG icons functions and filters
require get_parent_theme_file_path('/inc/icon-functions.php');

/* Customizer additions */
// require get_template_directory() . '/inc/customizer.php';

/* Load Jetpack compatibility file */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

// JavaScript detection
function menu17_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action('wp_head', 'menu17_javascript_detection', 0);


