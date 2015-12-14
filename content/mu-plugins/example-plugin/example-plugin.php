<?php
/*
 * Plugin Name: Todo
 * Plugin URI: Todo
 * Description: Todo
 * Author: Todo
 * Version: 1.0.0
 * Author URI: Todo
 * License: GPL2+
 * Text Domain: Todo
 * Domain Path: /languages/
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-example-plugin-admin.php' );
	add_action( 'plugins_loaded', array( 'Example_Admin', 'get_instance' ) );
}