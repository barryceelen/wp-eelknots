<?php
/**
 * Contains the main plugin class
 *
 * @package   Todo
 * @author    Todo
 * @license   GPL-3.0+
 * @link      Todo
 * @copyright Todo
 */

/**
 * Example plugin class.
 */
class Example_Plugin {

	/**
	 * Instance of this class.
	 *
	 * @since 1.0.0
	 *
	 * @var object
	 */
	protected static $instance = null;

	/**
	 * Initialize the plugin by setting localization, actions and filters.
	 *
	 * @since 1.0.0
	 */
	private function __construct() {

		$this->add_actions_and_filters();

	}

	/**
	 * Return an instance of this class.
	 *
	 * @since 1.0.0
	 *
	 * @return object A single instance of this class.
	 */
	public static function get_instance() {
		// If the single instance hasn't been set, set it now.
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Add actions and filters.
	 *
	 * @since 1.0.0
	 */
	public function add_actions_and_filters() {

		// Register our theme directory.
		add_action( 'muplugins_loaded', array( $this, 'register_theme_directory' ) );
	}

	/**
	 * Register our theme directory.
	 *
	 * @since 1.0.0
	 */
	public function register_theme_directory() {
		register_theme_directory( EXAMPLE_PLUGIN_DIR . 'themes' );
	}
}

global $example_plugin;
$example_plugin = Example_Plugin::get_instance();
