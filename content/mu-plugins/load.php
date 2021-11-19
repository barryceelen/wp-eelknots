<?php
/**
 * Plugin Name: Load Must-Use Plugins
 * Description: Loads must-use plugins from subfolders in /mu-plugins.
 * Author: Todo
 * Version: 1.0.0
 * Author URI: Todo
 *
 * @package Example
 */

$plugins = array(
	'/example-plugin/plugin.php',
);

foreach ( $plugins as $plugin ) {
	if ( file_exists( WPMU_PLUGIN_DIR . $plugin ) ) {
		require WPMU_PLUGIN_DIR . $plugin;
	}
}
