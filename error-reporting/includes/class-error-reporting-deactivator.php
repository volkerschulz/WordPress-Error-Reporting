<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://example.com/
 * @since      1.0.0
 *
 * @package    Error_Reporting
 * @subpackage Error_Reporting/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Error_Reporting
 * @subpackage Error_Reporting/includes
 */
class Error_Reporting_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		$target_file = get_option('error-reporting-mu-file');
		if(!empty($target_file)) {
			if(file_exists($target_file) && !unlink($target_file)) {
				trigger_error(
					'Could not unlink mu-file', 
					E_USER_WARNING
				);
			}
			delete_option('error-reporting-mu-file');
		}
	}

}