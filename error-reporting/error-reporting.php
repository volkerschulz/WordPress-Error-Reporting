<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://example.com/
 * @since             1.0.0
 * @package           Error_Reporting
 *
 * @wordpress-plugin
 * Plugin Name:       Error Reporting
 * Plugin URI:        https://github.com/volkerschulz/WordPress-Error-Reporting
 * Description:       Allows Admins to granularly control PHP's error reporting level.
 * Version:           1.0.0
 * Author:            volkerschulz
 * Author URI:        https://volkerschulz.de
 * License:           GPLv3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       error-reporting
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
	// The following is unreachable and for PO-Edit only
	$unreachable = __('Allows Admins to granularly control PHP\'s error reporting level.', 'error-reporting');
	$unreachable = __('Settings', 'error-reporting');
}

/**
 * Currently plugin version.
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ERROR_REPORTING_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-error-reporting-activator.php
 */
function activate_error_reporting() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-error-reporting-activator.php';
	Error_Reporting_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-error-reporting-deactivator.php
 */
function deactivate_error_reporting() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-error-reporting-deactivator.php';
	Error_Reporting_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_error_reporting' );
register_deactivation_hook( __FILE__, 'deactivate_error_reporting' );

/**
 * Add link to setting in plugin overview
 */
function settings_link_for_error_reporting($links) {
	$url = esc_url( add_query_arg(
		'page',
		'error-reporting-plugin',
		get_admin_url() . 'options-general.php'
	) );
	$settings_link = "<a href='$url'>" . __( 'Settings' ) . '</a>';
	array_push(
		$links,
		$settings_link
	);
	return $links;
}

add_filter( 'plugin_action_links_error-reporting/error-reporting.php', 'settings_link_for_error_reporting' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-error-reporting.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_error_reporting() {
	$plugin = new Error_Reporting();
	$plugin->run();
}
run_error_reporting();