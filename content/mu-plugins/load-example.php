<?php
/*
 * Plugin Name: Load Must-Use Plugins
 * Description: WordPress only looks for PHP files right inside the mu-plugins directory, and (unlike for normal plugins) not for files in subdirectories. Load these plugins by renaming this file to load.php and adding them to the $plugins array.
 * Author: Todo
 * Version: 1.0.0
 * Author URI: Todo
 */

$plugins = array(
	'/example-plugin/example-plugin.php',
);

foreach ( $plugins as $plugin ) {
	if ( file_exists( WPMU_PLUGIN_DIR . $plugin ) ) {
		require WPMU_PLUGIN_DIR . $plugin;
	}
}