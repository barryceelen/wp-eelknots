<?php
/**
 * Main configuration file
 *
 * @package Todo
 */

if ( file_exists( dirname( __FILE__ ) . '/wp-config-local.php' ) ) {
	require_once dirname( __FILE__ ) . '/wp-config-local.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/wp-config-production.php' ) ) {
	require_once dirname( __FILE__ ) . '/wp-config-production.php';
} else {
	die( 'Config file missing.' );
}

define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', 'utf8_general_ci' );

$table_prefix = 'wp_';

define( 'WPLANG', '' );
define( 'WP_HOME', 'http://' . $_SERVER['SERVER_NAME'] );
define( 'WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . '/wp' );

// Todo: Change default theme name
define( 'WP_DEFAULT_THEME', 'theme' );
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/content' );
define( 'WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/content' );
define( 'WP_POST_REVISIONS', 3 );
define( 'EMPTY_TRASH_DAYS', 7 );
define( 'AUTOSAVE_INTERVAL', 120 );
define( 'CORE_UPGRADE_SKIP_NEW_BUNDLED', true );
define( 'DISALLOW_FILE_EDIT', true );
define( 'DISALLOW_FILE_MODS', true );

// phpcs:ignore Squiz.PHP.CommentedOutCode.Found
// define( 'TEMPLATEPATH', '/absolute/path/to/wp-content/themes/theme' );
// define( 'STYLESHEETPATH', '/absolute/path/to/wp-content/themes/theme' );

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
}

require_once ABSPATH . 'wp-settings.php';
