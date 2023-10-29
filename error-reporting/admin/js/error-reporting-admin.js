(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	$(document).ready(function() {
		// Add event listeners
		$('.error_reporting_single').on('change', function() {
			calculateSetting();
		});
		$('.error_reporting_set_all').on('click', function() {
			$('.error_reporting_single').each(function() {
				$(this).prop('checked', true);
			});
			calculateSetting();
		});
		$('.error_reporting_set_none').on('click', function() {
			$('.error_reporting_single').each(function() {
				$(this).prop('checked', false);
			});
			calculateSetting();
		});

		// Show initial settings
		var initial_level = parseInt($('.error_reporting_calculated_level').val());
		$('.error_reporting_single').each(function() {
			if(parseInt($(this).val()) & initial_level) {
				$(this).prop('checked', true);
			} else {
				$(this).prop('checked', false);
			}
		});
	});

	function calculateSetting() {
		var error_level = 0;
		$('.error_reporting_single').each(function() {
			if($(this).is(':checked')) {
				error_level = error_level | parseInt($(this).val());
			}
		});
		$('.error_reporting_calculated_level').val(error_level);
	}

})( jQuery );
