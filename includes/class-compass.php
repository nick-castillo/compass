<?php

namespace Compass;

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://nick-castillo.ca
 * @since      1.0.0
 *
 * @package    Compass
 * @subpackage Compass/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Compass
 * @subpackage Compass/includes
 * @author     Nick Castillo <cstllnick@gmail.com>
 */
class Compass {

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string
	 */
	protected $version;

	/**
	 * User object that holds info about the current user.
	 *
	 * @since	1.0.0
	 * @access	protected
	 * @var		Compass\Compass_User
	 */
	protected $user;

	/**
	 * The api key for ipstack
	 *
	 * @since 	1.0.0
	 * @access	protected
	 * @var		string
	 */
	protected $api_key;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'COMPASS_VERSION' ) ) {
			$this->version = COMPASS_VERSION;
		} else {
			$this->version = '1.0.0';
		}

		$this->plugin_name = 'compass';
		
		$this->load_dependencies();
	}

	/**
	 * Load all the class dependencies of Compass
	 *
	 * @since	1.0.0
	 * @access 	private
	 */
	private function load_dependencies() {
		$this->set_api_key();

		$this->user = new Compass_User();
	}

	/**
	 * Set the api_key property if we have one. If we don't, let
	 * us throw a new Exception.
	 *
	 * @since	1.0.0
	 * @access	private
	 */
	private function set_api_key() {
		$api_key = null;

		// Let's see if we have an key defined
		if ( defined('IPSTACK_API_KEY') ) {
			if( IPSTACK_API_KEY != '') {
				$api_key = IPSTACK_API_KEY;
			}
		}

		// Depending on the result above:
		if ( is_null($api_key) ) {
			// Throw error if we have no key
			throw new \Exception('API key not set. Please make sure it is defined in the wp-config.php file.');
		} else {
			// Otherwise, let set our property
			$this->api_key = $api_key;
		}
	}
	
	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * Get the user ip address
	 *
	 * @since	1.0.0
	 * @return	string	The user ip address or null
	 */
	public function get_user_ip() {
		return $this->user->get_ip();
	}

	/**
	 * Get IPSTACK api key
	 *
	 * @since 1.0.0
	 * @return	string	The api key or null
	 */
	public function get_api_key() {
		return $this->api_key;
	}
}
