<?php
/**
 * Contains the core plugin functionality
 *
 * @package Example_Plugin
 */

namespace Example;

// Register our theme directory.
add_action( 'muplugins_loaded', __NAMESPACE__ . '\register_custom_theme_directory' );

/**
 * Register our theme directory.
 *
 * @return void
 */
function register_custom_theme_directory() {
	register_theme_directory( EXAMPLE_PLUGIN_DIR . 'themes' );
}
