<?php // phpcs:ignore Squiz.Commenting.FileComment.Missing
define( 'DB_NAME', '' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', '' );
define( 'DB_HOST', '127.0.0.1' );

// Todo: Salt all the things.
// https://api.wordpress.org/secret-key/1.1/salt
define( 'AUTH_KEY', 'put your unique phrase here' );
define( 'SECURE_AUTH_KEY', 'put your unique phrase here' );
define( 'LOGGED_IN_KEY', 'put your unique phrase here' );
define( 'NONCE_KEY', 'put your unique phrase here' );
define( 'AUTH_SALT', 'put your unique phrase here' );
define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
define( 'LOGGED_IN_SALT', 'put your unique phrase here' );
define( 'NONCE_SALT', 'put your unique phrase here' );

define( 'SCRIPT_DEBUG', true );
define( 'SAVEQUERIES', true );
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_DISPLAY', false );
define( 'WP_DEBUG_LOG', true );
define( 'WP_ENVIRONMENT_TYPE', 'local' );
define( 'WP_LOCAL_DEV', true );
