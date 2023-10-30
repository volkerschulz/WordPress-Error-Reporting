<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://example.com/
 * @since      1.0.0
 *
 * @package    Error_Reporting
 * @subpackage Error_Reporting/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Error_Reporting
 * @subpackage Error_Reporting/admin
 */
class Error_Reporting_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $error_reporting    The ID of this plugin.
	 */
	private $error_reporting;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $error_reporting       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $error_reporting, $version ) {

		$this->error_reporting = $error_reporting;
		$this->version = $version;

	}

	/**
	 * Adds the settings page to the menu
	 *
	 * @since    1.0.0
	 * @return void
	 */
	public function add_menu_page() {
		add_options_page(__('Error Reporting Settings', 'error-reporting'), __('Error Reporting', 'error-reporting'), 'manage_options', 'error-reporting-plugin', [$this, 'settings_page']);
	}

	/**
	 * Outputs the settings page
	 *
	 * @since    1.0.0
	 * @return void
	 */
	public function settings_page() {
		$this->processSubmit();
		$init_value = (int)error_reporting();
		?>
		<div class="wrap">
			<h1><?= __('Error Reporting Settings', 'error-reporting'); ?></h1>
			<h2><?= __('Error level', 'error-reporting'); ?></h2>
			<form class="error_reporting_set_form" action="" method="POST">
				<input type="hidden" name="error_reporting_set_level" class="error_reporting_calculated_level" value="<?= $init_value ?>" />
				<a class="error_reporting_set_all" href="" onclick="return false"><?= __('Set all', 'error-reporting'); ?></a>
				<a class="error_reporting_set_none" href="" onclick="return false"><?= __('Unset all', 'error-reporting'); ?></a>
				<input type="submit" class="button button-primary" name="error_reporting_form_submit" value="<?= __('Save', 'error-reporting'); ?>" />
			</form>
			<hr>
			<?php
			foreach(Error_Reporting_Errorlevels::getAll() as $value => $name) {
				?>
				<label class="error_reporting_label"><input type="checkbox" class="error_reporting_value error_reporting_single" value="<?= $value ?>" /><?= $name ?></label><br />
				<?php
			}
			?>
		</div>
		<?php
	}

	/**
	 * Save changes
	 *
	 * @since    1.0.0
	 * @return void
	 */
	private function processSubmit() {
		if(!empty($_POST['error_reporting_form_submit']) && current_user_can('manage_options')) {
			if(isset($_POST['error_reporting_set_level']) && is_numeric($_POST['error_reporting_set_level'])) {
				$new_level = (int)$_POST['error_reporting_set_level'];
				error_reporting($new_level);
				update_option('error-reporting-error_level', $new_level, true);
			}
		}
	}


	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Error_Reporting_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Error_Reporting_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->error_reporting, plugin_dir_url( __FILE__ ) . 'css/error-reporting-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Error_Reporting_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Error_Reporting_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->error_reporting, plugin_dir_url( __FILE__ ) . 'js/error-reporting-admin.js', array( 'jquery' ), $this->version, false );

	}

}