<?php
/**
 * Lazy Boy white label theme functions and definitions\
 *
 * @package LazyBoy
 * @since Lazy Boy 1.0
 */

 /**
  * Enqueues stylesheets in the head
  */
function rhm_add_scripts() {
	wp_enqueue_style( 'lazyboy-style', get_stylesheet_uri() );
}
  add_action( 'wp_enqueue_scripts', 'rhm_add_scripts' );

  /**
   * Lazyboy theme setup
   */
function lazyboy_setup() {
	/**
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 *
	 * @link https://developer.wordpress.org/reference/functions/wp_title/
	 */
	add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'lazyboy_setup' );

/**
 * Register Navigation Menu
 */
function register_my_menu() {
	register_nav_menu( 'header-menu', __( 'Header Menu' ) );
}
add_action( 'init', 'register_my_menu' );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		// Set up nav menus for the areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "header" location.
			'header-menu' => array(
				'name'  => __( 'Top Menu', 'lazyboy' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),
		),
	);
	/**
	 * Register sidebar
	 */
	function lazyboy_widgets_init() {
		register_sidebar(
			array(
				'name'          => __( 'Sidebar', 'lazyboy' ),
				'id'            => 'sidebar-1',
				'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'lazyboy' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => __( 'Archive Sidebar', 'lazyboy' ),
				'id'            => 'archive',
				'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'lazyboy' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}
	add_action( 'widgets_init', 'lazyboy_widgets_init' );

	if ( ! function_exists( 'hagil_posted_on' ) ) :
		/**
		 * Prints HTML with meta information for the current post-date/time
		 */
		function hagil_posted_on() {
			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
				$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time> <br><time class="updated" datetime="%3$s">(Modified %4$s)</time>';
			}

			$time_string = sprintf(
				$time_string,
				esc_attr( get_the_date( 'c' ) ), // %1$s: Original post date, formatted as ISO 8601, e.g. "2004-02-12T15:19:21+00:00".
				esc_html( get_the_date() ), // %2$s: Original post date formatted per "WP Admin > General" settings, e.g. "April 3, 2018".
				esc_attr( get_the_modified_date( 'c' ) ), // %3$s: Updated post date, formatted as ISO 8601, e.g. "2004-02-12T15:19:21+00:00".
				esc_html( get_the_modified_date() ) // %2$s: Updated post date formatted per "WP Admin > General" settings, e.g. "April 3, 2018".
			);

			$posted_on = sprintf(

				/*
				* translators: %s is the post date.
				*/
				esc_html_x( '%1$s%2$s', 'post date', 'lazyboy' ),
				'<span class="screen-reader-text">Posted on </span>',
				'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
			);

			echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

		}
endif;

