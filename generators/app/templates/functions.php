<?php
/**
 * Develop With WP functions and definitions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * @package Develop With WP
 * @since 0.1.0
 */

// Useful global constants.
define( '<%= namespace.toUpperCase() %>_VERSION', '1.0.0' );
define( '<%= namespace.toUpperCase() %>_URL', get_stylesheet_directory_uri() );
define( '<%= namespace.toUpperCase() %>_TEMPLATE_URL', get_template_directory_uri() );
define( '<%= namespace.toUpperCase() %>_PATH', get_template_directory() . '/' );
define( '<%= namespace.toUpperCase() %>_INC', <%= namespace.toUpperCase() %>_PATH . 'includes/' );

if ( file_exists( <%= namespace.toUpperCase() %>_PATH . 'vendor/autoload.php' ) ) {
	require <%= namespace.toUpperCase() %>_PATH . 'vendor/autoload.php';

	\AaronHolbrook\Autoload\autoload( <%= namespace.toUpperCase() %>_INC );

	// Run the setup functions.
	<%= namespace %>\Theme\Core\setup();
}