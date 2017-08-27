<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              kultivate.tech
 * @since             1.0.0
 * @package           Klt_Cannabis_Menu
 *
 * @wordpress-plugin
 * Plugin Name:       Kultivate Cannabis Menu
 * Plugin URI:        kultivate.tech
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Rich Staats
 * Author URI:        kultivate.tech
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       klt-cannabis-menu
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-klt-cannabis-menu-activator.php
 */
function activate_klt_cannabis_menu() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-klt-cannabis-menu-activator.php';
	Klt_Cannabis_Menu_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-klt-cannabis-menu-deactivator.php
 */
function deactivate_klt_cannabis_menu() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-klt-cannabis-menu-deactivator.php';
	Klt_Cannabis_Menu_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_klt_cannabis_menu' );
register_deactivation_hook( __FILE__, 'deactivate_klt_cannabis_menu' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-klt-cannabis-menu.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_klt_cannabis_menu() {

	$plugin = new Klt_Cannabis_Menu();
	$plugin->run();

}
run_klt_cannabis_menu();
