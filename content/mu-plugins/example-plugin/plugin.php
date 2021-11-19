<?php
/**
 * Main plugin file
 *
 * Plugin Name: Example Plugin
 * Plugin URI: Todo
 * Description: Todo
 * Author: Todo
 * Version: 1.0.0
 * Author URI: Todo
 * License: GPL3+
 * Text Domain: example-plugin
 * Domain Path: /languages/
 *
 * @package   Example_Plugin
 */

namespace Example;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'EXAMPLE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'EXAMPLE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

add_action( 'init', __NAMESPACE__ . '\load_textdomain' );

/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function load_textdomain() {

	if ( false !== strpos( __FILE__, basename( WPMU_PLUGIN_DIR ) ) ) {
		load_muplugin_textdomain( 'example-plugin', 'example-plugin/languages' ); // Todo: Make dir variable.
	} else {
		load_plugin_textdomain( 'example-plugin', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}
}

require_once plugin_dir_path( __FILE__ ) . 'includes/core.php';

if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {
	require_once plugin_dir_path( __FILE__ ) . 'admin/core.php';
} else {
	require_once plugin_dir_path( __FILE__ ) . 'public/core.php';
}
