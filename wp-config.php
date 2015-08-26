<?php
if ( file_exists( dirname( __FILE__ ) . '/wp-config-local.php' ) ) {
	require_once( dirname( __FILE__ ) . '/wp-config-local.php' );
	define('WP_DEBUG', true);
	define('WP_LOCAL_DEV', true);
	define('SCRIPT_DEBUG', true);
	//define('SAVEQUERIES', true);
} elseif ( file_exists( dirname( __FILE__ ) . '/wp-config-production.php' ) ) {
	require_once( dirname( __FILE__ ) . '/wp-config-production.php' );
	define('WP_DEBUG', false);
	define('WP_LOCAL_DEV', false);
} else {
	die('Config file missing.');
}

define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_general_ci');

// Todo: Salt all the things.
// https://api.wordpress.org/secret-key/1.1/salt
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

// Todo: Specify table prefix
$table_prefix  = 'wp_';

define('WPLANG', '');
define('WP_HOME', 'http://'.$_SERVER['SERVER_NAME']);
define('WP_SITEURL', 'http://'.$_SERVER['SERVER_NAME'].'/wp');

// Todo: Change default theme name
define('WP_DEFAULT_THEME', 'theme');
define('WP_CONTENT_DIR', dirname( __FILE__ ) . '/content');
define('WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/content');
define('WP_POST_REVISIONS', 3);
define('EMPTY_TRASH_DAYS', 7);
define('AUTOSAVE_INTERVAL', 120);
define('DISALLOW_FILE_EDIT', true);
//define('DISALLOW_FILE_MODS',true);

//define('TEMPLATEPATH', '/absolute/path/to/wp-content/themes/theme');
//define('STYLESHEETPATH', '/absolute/path/to/wp-content/themes/theme');

if ( !defined('ABSPATH') ) {
	define('ABSPATH', dirname(__FILE__) . '/wp/');
}

require_once(ABSPATH . 'wp-settings.php');
