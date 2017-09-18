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
 * @since             0.1.0
 * @package           Klt_Cannabis_Menu
 *
 * @wordpress-plugin
 * Plugin Name:       Kultivate Cannabis Menu
 * Plugin URI:        kultivate.tech
 * Description:       Cannabis Menus for the Kultivate.tech network.
 * Version:           0.1.1
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
 * Define the globals
 */
define( 'KLT_CANNABIS_MENU_DIR', plugin_dir_path( __FILE__ ) );

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
 * The code that connects with kernl to set up UI plugin updates.
 */
require plugin_dir_path( __FILE__ ) . 'includes/plugin_update_check.php';

$pluginUpdateChecker = new PluginUpdateChecker_2_0 (
	'https://kernl.us/api/v1/updates/59bff87c9e7ec8707b8e5e02/',
	__FILE__,
	'klt-cannabis-menu',
	1
);

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.1.0
 */
function run_klt_cannabis_menu() {

	$plugin = new Klt_Cannabis_Menu();
	$plugin->run();

}

run_klt_cannabis_menu();
