<?php
/**
 * Class CompassUserTests file.
 * 
 * @since 1.0.0
 * @package Compass
 * @subpackage Compass/tests/unit-tests
 */

use PHPUnit\Framework\TestCase;
use Compass\Compass_Ipstack;

// Test CMD: ./vendor/bin/phpunit --bootstrap tests/bootstrap.php tests/unit-tests/CompassIpstackTests

final class CompassIpstackTests extends TestCase {
    
    /**
     * Test to make sure we get an exception error if user does not
     * define membership type
     *
     * @since   1.0.0
     */
    public function test_undefined_membership_type() {
        $api_key = getenv('IPSTACK_API_KEY');
        
        // Expect error when membership type is not defined
        $this->expectException('Exception');
        $this->expectExceptionMessage('Membership type not set. Please make sure it is defined in the wp-config.php file.');
        
        $ip_stack = new Compass_Ipstack($api_key);
    }

    /**
     * Test ipstack api base url successful getter/setter methods
     *
     * @since 1.0.0
     */
    public function test_get_set_base_api_url() {
        $base_api_url    = 'http://api.ipstack.com';
        $api_key         = getenv('IPSTACK_API_KEY');
        $membership_type = getenv('IP_STACK_MEMBERSHIP_TYPE');

        define('IP_STACK_MEMBERSHIP_TYPE', $membership_type);

        $ip_stack = new Compass_Ipstack($api_key);

        // Test to see if we get the correct API key
        $this->assertEquals($base_api_url, $ip_stack->get_base_api_url());
    }

    /**
     * Test get_location method
     *
     * @since 1.0.0
     */
    public function test_get_location() {
        $membership_type = getenv('IP_STACK_MEMBERSHIP_TYPE');
        $ip_address      = getenv('USER_IP_ADDRESS');
        $api_key         = getenv('IPSTACK_API_KEY');

        define('IP_STACK_MEMBERSHIP_TYPE', $membership_type);

        $ip_stack = new Compass_Ipstack($api_key);
        $location = $ip_stack->get_user_location($ip_address);

        $this->assertIsArray($location);
    }
}
