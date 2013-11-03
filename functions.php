<?php
/**
 * Extra functionality for Twenty Twelve EDD
 *
 * @package Twenty_Twelve_EDD
 * @since Twenty Twelve EDD 1.0
 */

/**
 * Setup theme features/functionality
 *
 * @since Twenty Twelve EDD 1.0
 */
function twentytwelve_edd_setup() {
	// Load the textdomain
	load_child_theme_textdomain( 'twentytwelve-edd', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'twentytwelve_edd_setup' );

/**
 * Register and enqueue scripts
 *
 * @since Twenty Twelve EDD 1.0
 */
function twentytwelve_edd_enqueue_scripts() {
	global $post;

	if ( ! ( 
		is_post_type_archive( 'download' ) ||
		is_tax( array( 'download_category', 'download_tag' ) ) ||
		is_singular( 'download' ) || 
		has_shortcode( is_object( $post ) ? $post->post_content : null, 'downloads' )
	) )
		return;

	$deps = array( 'jquery' );

	wp_enqueue_script( 'salvattore', get_stylesheet_directory_uri() . '/js/salvattore.min.js', array(), null, true );
	wp_enqueue_script( 'twentytwelve-edd-app', get_stylesheet_directory_uri() . '/js/app.js', $deps );
}
add_action( 'wp_enqueue_scripts', 'twentytwelve_edd_enqueue_scripts' );

/**
 * Registers our download widget area.
 *
 * @since Twenty Twelve EDD 1.0
 */
function twentytwelve_edd_widgets_init() {
	register_widget( 'TwentyTwelve_EDD_Widget_Stats' );
	
	register_sidebar( array(
		'name' => __( 'Download Widget Area', 'twentytwelve-edd' ),
		'id' => 'sidebar-4',
		'description' => __( 'Appears above the download description.', 'twentytwelve-edd' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'twentytwelve_edd_widgets_init' );

/**
 * Extends the default WordPress body class to denote:
 * 1. Using a full-width layout, when no active widgets in the sidebar
 *    or full-width template.
 *
 * @since Twenty Twelve EDD 1.0
 *
 * @param array Existing class values.
 * @return array Filtered class values.
 */
function twentytwelve_edd_body_class( $classes ) {
	global $post;

	if ( 
		is_singular( 'download' ) || 
		is_post_type_archive( 'download' ) ||
		is_tax( array( 'download_category', 'download_tag' ) )
	)
		$classes[] = 'full-width';

	if ( 
		is_post_type_archive( 'download' ) ||
		is_tax( array( 'download_category', 'download_tag' ) ) ||
		has_shortcode( isset( $post ) ? $post->post_content : null, 'downloads' )
	)
		$classes[] = 'download-grid';

	return $classes;
}
add_filter( 'body_class', 'twentytwelve_edd_body_class' );

/**
 * EDD Download Shortcode Attributes
 *
 * @since Twenty Twelve EDD 1.0
 *
 * @param array $atts
 * @return array $atts
 */
function twentytwelve_edd_shortcode_atts_downloads( $atts ) {
	$atts[ 'excerpt' ]      = 'no';
	$atts[ 'full_content' ] = 'no';
	$atts[ 'price' ]        = 'no';
	$atts[ 'buy_button' ]   = 'no';

	return $atts;
}
add_filter( 'shortcode_atts_downloads', 'twentytwelve_edd_shortcode_atts_downloads' );

/**
 * Salvattore on the [downloads] shortcode.
 *
 * There is no direct filter for the output, so we have to search the
 * whole string markup and add our data attribute where we need to.
 *
 * @since Twenty Twelve EDD 1.0
 *
 * @param string $display
 * @return string $display
 */
function twentytwelve_edd_downloads_shortcode( $display ) {
	$display = str_replace( 'class="edd_downloads_list', 'data-columns class="edd_downloads_list', $display );

	return $display;
}
add_filter( 'downloads_shortcode', 'twentytwelve_edd_downloads_shortcode' );

/**
 * Custom widgets
 */
require get_stylesheet_directory() . '/inc/class-widget.php';
require get_stylesheet_directory() . '/inc/class-widget-item-stats.php';