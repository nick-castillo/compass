<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://nick-castillo.ca
 * @since             1.0.0
 * @package           Compass
 *
 * @wordpress-plugin
 * Plugin Name:       Compass
 * Plugin URI:        https://nick-castillo.ca/scribbles/compass
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Nick Castillo
 * Author URI:        https://nick-castillo.ca
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       compass
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'COMPASS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-compass-activator.php
 */
function activate_compass() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-compass-activator.php';
	Compass_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-compass-deactivator.php
 */
function deactivate_compass() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-compass-deactivator.php';
	Compass_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_compass' );
register_deactivation_hook( __FILE__, 'deactivate_compass' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-compass.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_compass() {

	$plugin = new Compass();
	$plugin->run();

}
run_compass();
