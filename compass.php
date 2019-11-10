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
 * Autoload the plugin classes
 */
function load_compass() {
	require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-compass.php';
}
add_action( 'plugins_loaded', 'load_compass' );
