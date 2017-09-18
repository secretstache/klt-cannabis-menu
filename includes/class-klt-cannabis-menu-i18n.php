<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       kultivate.tech
 * @since      0.1.0
 *
 * @package    Klt_Cannabis_Menu
 * @subpackage Klt_Cannabis_Menu/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      0.1.0
 * @package    Klt_Cannabis_Menu
 * @subpackage Klt_Cannabis_Menu/includes
 * @author     Rich Staats <rich@secretstache.com>
 */
class Klt_Cannabis_Menu_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    0.1.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'klt-cannabis-menu',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
