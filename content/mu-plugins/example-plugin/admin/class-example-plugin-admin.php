<?php
/**
 * Contains the admin plugin class
 *
 * @package   Todo
 * @author    Todo
 * @license   GPL-3.0+
 * @link      Todo
 * @copyright Todo
 */

/**
 * Example plugin admin class.
 */
class Example_Plugin_Admin {
	/**
	 * Instance of this class.
	 *
	 * @since 1.0.0
	 *
	 * @var object
	 */
	protected static $instance = null;

	/**
	 * Initialize the plugin by setting actions and filters.
	 *
	 * @since 1.0.0
	 */
	private function __construct() {

		// Disable Welcome Screen and pointers.
		add_action( 'admin_init', array( $this, 'remove_pointers' ) );

		// Remove dashboard widgets.
		add_action( 'wp_dashboard_setup', array( $this, 'wp_dashboard_setup' ) );

		// Remove meta boxes.
		add_action( 'admin_menu', array( $this, 'remove_meta_boxes' ) );
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
	 * Remove WordPress admin pointer tooltips.
	 *
	 * @since 1.0.0
	 */
	function remove_pointers() {
		remove_action( 'admin_enqueue_scripts', array( 'WP_Internal_Pointers', 'enqueue_scripts' ) );
	}

	/**
	 * Unset default dashboard widgets.
	 *
	 * @see http://codex.wordpress.org/Plugin_API/Action_Reference/wp_dashboard_setup
	 *
	 * @since 1.0.0
	 */
	function wp_dashboard_setup() {

		remove_action( 'welcome_panel', 'wp_welcome_panel' );

		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
	}

	/**
	 * Unset default meta boxes on post/page edit forms.
	 *
	 * @see http://codex.wordpress.org/Function_Reference/remove_meta_box
	 *
	 * @since 1.0.0
	 */
	function remove_meta_boxes() {

		remove_meta_box( 'postcustom', 'post', 'normal' );
		remove_meta_box( 'postcustom', 'page', 'normal' );
	}
}

global $example_plugin_admin;
$example_plugin_admin = Example_Plugin_Admin::get_instance();
