<?php

namespace Compass;

/**
 * The compass user class.
 * 
 * This is used to determine some user info, where and
 * how to store them.
 * 
 * @since 1.0.0
 * @package Compass
 * @subpackage Compass/includes
 */
class Compass_User {

    /**
     * The user's ip address
     *
     * @since   1.0.0
     * @var     string
     */
    protected $ip_address;

    /**
     * On creation of new instance, set the ip address right away
     * 
     * @since   1.0.0
     */
    public function __construct() {
        $this->set_ip_address();
    }

    /**
     * Set the user's IP address
     *
     * @since   1.0.0
     * @access  protected
     */
    protected function set_ip_address() {
        $ip_address = null;

        if ( isset($_SERVER['HTTP_CLIENT_IP']) ) {
            $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        } elseif ( isset($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif ( isset($_SERVER['HTTP_X_FORWARDED']) ) {
            $ip_address = $_SERVER['HTTP_X_FORWARDED'];
        } elseif ( isset($_SERVER['HTTP_FORWARDED_FOR']) ) {
            $ip_address = $_SERVER['HTTP_FORWARDED_FOR'];
        } elseif ( isset($_SERVER['HTTP_FORWARDED']) ) {
            $ip_address = $_SERVER['HTTP_FORWARDED'];
        } elseif ( isset($_SERVER['REMOTE_ADDR']) ) {
            $ip_address = $_SERVER['REMOTE_ADDR'];
        }

        $this->ip_address = $ip_address;
    }

    /**
     * Return the user's IP adress
     *
     * @since   1.0.0
     * @return  string  The user's IP address or null 
     */
    public function get_ip_address() {
        return $this->ip_address;
    }
}
