<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.johnperricruz.com
 * @since      1.0.0
 *
 * @package    Primeview_Plugin
 * @subpackage Primeview_Plugin/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Primeview_Plugin
 * @subpackage Primeview_Plugin/includes
 * @author     John Perri Cruz <john@primeview.com>
 */
class Primeview_Plugin_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'primeview-plugin',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
