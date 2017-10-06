<?php
/**
 * Main plugin file
 *
 * @package   Todo
 * @author    Todo
 * @license   GPL-3.0+
 * @link      Todo
 * @copyright Todo
 */

/*
 * Plugin Name: Todo
 * Plugin URI: Todo
 * Description: Todo
 * Author: Todo
 * Version: 1.0.0
 * Author URI: Todo
 * License: GPL3+
 * Text Domain: example-plugin
 * Domain Path: /languages/
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'EXAMPLE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'EXAMPLE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

add_action( 'init', 'example_plugin_load_textdomain' );

/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function example_plugin_load_textdomain() {

	if ( false !== strpos( __FILE__, basename( WPMU_PLUGIN_DIR ) ) ) {
		load_muplugin_textdomain( 'example-plugin', 'example-plugin/languages' ); // Todo: Make dir variable.
	} else {
		load_plugin_textdomain( 'example-plugin', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}
}

require_once( plugin_dir_path( __FILE__ ) . 'includes/class-example-plugin.php' );

if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-example-plugin-admin.php' );
} else {
	require_once( plugin_dir_path( __FILE__ ) . 'public/class-example-plugin-public.php' );
}
