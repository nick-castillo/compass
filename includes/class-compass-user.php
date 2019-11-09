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
     * Grab the user's IP adress
     *
     * @since   1.0.0
     * @return  string  The user's IP address or null 
     */
    public function get_ip() {
        $ipaddress = null;

        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        } else if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else if(isset($_SERVER['HTTP_X_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        } else if(isset($_SERVER['HTTP_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        } else if(isset($_SERVER['HTTP_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        } else if(isset($_SERVER['REMOTE_ADDR'])) {
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        }

        return $ipaddress;
    }
}
