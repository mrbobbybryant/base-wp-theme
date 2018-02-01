<?php
namespace <%= namespace %>\Theme\Core;

/**
 * Set up theme defaults and register supported WordPress features.
 *
 * @since 0.1.0
 *
 * @uses add_action()
 *
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'after_setup_theme', $n( 'i18n' ) );
	add_action( 'admin_enqueue_scripts', $n( 'admin_scripts' ) );
	add_action( 'wp_enqueue_scripts', $n( 'scripts' ) );
}

/**
 * Loads all JS, CSS, Fonts asset for the site. Also handles localizing all the
 * data for the React Frontend.
 *
 * @return void
 */
function scripts() {
	wp_enqueue_script(
		'<%= projectName %>-js',
		get_stylesheet_directory_uri() . '/dist/frontend.bundle.js',
		array(),
		<%= namespace.toUpperCase() %>_VERSION,
		true
	);

	wp_enqueue_style(
		'<%= projectName %>-css',
		get_stylesheet_directory_uri() . '/dist/frontend.bundle.css',
		array(),
		<%= namespace.toUpperCase() %>_VERSION
	);

	wp_localize_script(
		'<%= projectName %>-js',
		'<%= namespace %>',
		[
			'siteUrl'     => site_url(),
		]
	);
}

/**
 * Makes WP Theme available for translation.
 *
 * Translations can be added to the /lang directory.
 * If you're building a theme based on WP Theme, use a find and replace
 * to change 'wptheme' to the name of your theme in all template files.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 *
 * @since 0.1.0
 *
 * @return void
 */
function i18n() {
	add_theme_support( 'post-thumbnails' );
	register_nav_menu( 'header', esc_html__( 'Header' ) );
	register_nav_menu( 'work', esc_html__( 'Our Work' ) );
}

/**
 * Loads all admin CSS and JS files needed for this theme.
 *
 * @return void
 */
function admin_scripts() {
	wp_enqueue_script(
		'<%= projectName %>-admin',
		<%= namespace.toUpperCase() %>_TEMPLATE_URL . '/dist/admin.bundle.js',
		array(),
		<%= namespace.toUpperCase() %>_VERSION,
		true
	);

	wp_localize_script(
		'<%= projectName %>-admin',
		'<%= namespace %>',
		[
			'siteUrl'     => site_url(),
		]
	);
}
