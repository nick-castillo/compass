<?php

namespace Compass;

use GuzzleHttp;

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
class Compass_Ipstack {

    /**
     * The api key that will be used to make calls to ipstack
     *
     * @since   1.0.0
     * @access  protected
     * @var     string
     */
    protected $api_key;

    /**
     * Membership type
     * 
     * 
     * @since   1.0.0
     * @access  protected
     */
    protected $membership_type = ['free', 'paid'];

    /**
     * Guzzle client instance
     * 
     * @since   1.0.0
     * @access  protected
     */
    protected $client;

    /**
     * Base API url
     * 
     * @access  protected
     * @since   1.0.0
     */
    protected $base_api_url;

    public function __construct( $api_key ) {
        $this->api_key = wp_kses($api_key, [], []);
        $this->client  = new \GuzzleHttp\Client();

        $this->set_base_api_url();
    }

    /**
     * Set the base url for ipstack
     *
     * @since   1.0.0
     * @access  private
     */
    private function set_base_api_url() {
        $ip_stack_home_url = 'api.ipstack.com';
        $protocol          = null;

        // echo'<pre>'; print_r('Belh'); echo'</pre>';
        // echo'<pre>'; print_r(IP_STACK_MEMBERSHIP_TYPE); echo'</pre>';
        // exit;

        if ( defined('IP_STACK_MEMBERSHIP_TYPE') ) {
            if ( IP_STACK_MEMBERSHIP_TYPE != '' ) {
                if ( $this->is_valid_membership(IP_STACK_MEMBERSHIP_TYPE) ) {
                    $protocol = (IP_STACK_MEMBERSHIP_TYPE == 'free') ? 'http' : 'https';
                }
            }
        }

        if ( is_null($protocol) ) {
            throw new \Exception('Membership type not set. Please make sure it is defined in the wp-config.php file.');
        } else {
            $this->base_api_url = sprintf('%s://%s', $protocol, $ip_stack_home_url);
        }
    }

    /**
     * Check to see if a membership type is the value that is getting passed 
     * is a valid value as needed by this object.
     *
     * @since   1.0.0
     * @access  private
     * @param   string  $membership
     * @return  boolean
     */
    private function is_valid_membership($membership) {
        return in_array($membership, $this->membership_type);
    }

    /**
     * Return the base url for the API calls that are
     * getting made.
     *
     * @since   1.0.0
     * @return string
     */
    public function get_base_api_url() {
        return $this->base_api_url;
    }

    /**
     * Make a request to the ipstack API and grab the user's location
     * using the ip address.
     *
     * @param   string  $ip_address
     * @return  array
     */
    public function get_user_location($ip_address) {
        $location = [ 
            'data' => null 
        ];

        $ip_address = wp_kses($ip_address, [], []);

        $api_endpoint = sprintf(
            '%s/%s?access_key=%s',
            $this->base_api_url,
            $ip_address,
            $this->api_key
        );

        $response    = $this->client->request('GET', $api_endpoint);
        $status_code = $response->getStatusCode();
        $body        = $response->getBody()->getContents();

        $location['data'] = json_decode($body);

        return $location;
    }
}
