<?php

/**
 * Fired during plugin activation
 *
 * @link       https://example.com/
 * @since      1.0.0
 *
 * @package    Error_Reporting
 * @subpackage Error_Reporting/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Error_Reporting
 * @subpackage Error_Reporting/includes
 */
class Error_Reporting_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		if(!file_exists(WPMU_PLUGIN_DIR)) {
			if(!mkdir(WPMU_PLUGIN_DIR)) {
				trigger_error(
					'Directory for mu-plugins does not exist and could not be created', 
					E_USER_ERROR
				);
			}
		}
		$target_file = WPMU_PLUGIN_DIR . '/__set-error-reporting.php';
		if(!copy(plugin_dir_path(__FILE__) . '__set-error-reporting.php', $target_file)) {
			trigger_error(
				'Could not copy mu-file', 
				E_USER_ERROR
			);
		}
		update_option('error-reporting-mu-file', $target_file, false);
		//trigger_error('DIR: ' . WPMU_PLUGIN_DIR ,E_USER_ERROR);
	}

}