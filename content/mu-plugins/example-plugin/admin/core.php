<?php
/**
 * Contains admin functionality
 *
 * @package Example_Plugin
 */

namespace Example\Admin;

// Disable Welcome Screen and pointers.
add_action( 'admin_init', __NAMESPACE__ . '\remove_pointers' );

// Remove default dashboard widgets.
add_action( 'wp_dashboard_setup', __NAMESPACE__ . '\remove_dashboard_widgets' );

// Remove default meta boxes on post/page edit forms.
add_action( 'admin_menu', __NAMESPACE__ . '\remove_meta_boxes' );

/**
 * Disable Welcome Screen and pointers.
 *
 * @return void
 */
function remove_pointers() {

	remove_action(
		'admin_enqueue_scripts',
		array(
			'WP_Internal_Pointers',
			'enqueue_scripts',
		)
	);
}

/**
 * Remove default dashboard widgets.
 *
 * @see http://codex.wordpress.org/Plugin_API/Action_Reference/wp_dashboard_setup
 *
 * @return void
 */
function remove_dashboard_widgets() {

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
 * @return void
 */
function remove_meta_boxes() {

	remove_meta_box( 'postcustom', 'post', 'normal' );
	remove_meta_box( 'postcustom', 'page', 'normal' );
}
