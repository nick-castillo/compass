<?php
/**
 * Class CompassTests file.
 * 
 * @since 1.0.0
 * @package Compass
 * @subpackage Compass/tests/unit-tests
 */

use PHPUnit\Framework\TestCase;
use Compass;

// Test CMD: ./vendor/bin/phpunit tests/unit-tests/CompassTests

final class CompassTests extends TestCase {

    /**
     * Test to check if for undefined ipstack api key
     *
     * To make sure this test runs properly, ensure that the wp-config
     * is clear of any defined constants related to Compass.
     * 
     * @since 1.0.0
     */
    public function test_undefined_ipstack_api_key() {
        // Expect error when no API key is defined
        $this->expectException('Exception');
        $this->expectExceptionMessage('API key not set. Please make sure it is defined in the wp-config.php file.');

        $compass = new Compass();
    }

    /**
     * Test ipstack api_key successful getter/setter methods
     *
     * @since 1.0.0
     */
    public function test_get_set_api_key() {
        $api_key         = getenv('IPSTACK_API_KEY');
        $membership_type = getenv('IP_STACK_MEMBERSHIP_TYPE');

        define('IPSTACK_API_KEY', $api_key);
        define('IP_STACK_MEMBERSHIP_TYPE', $membership_type);

        $compass = new Compass();

        // Test to see if we get the correct API key
        $this->assertEquals($api_key, $compass->get_api_key());
    }

    /**
     * Test the get_user_location method.
     *
     * @since 1.0.0
     */
    public function test_get_user_location() {
        $api_key         = getenv('IPSTACK_API_KEY');
        $membership_type = getenv('IP_STACK_MEMBERSHIP_TYPE');
        $dummy_user_ip   = getenv('USER_IP_ADDRESS');

        
        $_SERVER['REMOTE_ADDR'] = $dummy_user_ip;
        
        define('IP_STACK_MEMBERSHIP_TYPE', $membership_type);
        define('IPSTACK_API_KEY', $api_key);

        $compass = new Compass();
        $user_location = $compass->get_user_location();

        // Test to see if we are getting all the data for user's
        $this->assertObjectHasAttribute('ip', $user_location['data']);
        $this->assertObjectHasAttribute('type', $user_location['data']);
        $this->assertObjectHasAttribute('continent_code', $user_location['data']);
        $this->assertObjectHasAttribute('continent_name', $user_location['data']);
        $this->assertObjectHasAttribute('country_code', $user_location['data']);
        $this->assertObjectHasAttribute('country_name', $user_location['data']);
        $this->assertObjectHasAttribute('region_code', $user_location['data']);
        $this->assertObjectHasAttribute('region_name', $user_location['data']);
        $this->assertObjectHasAttribute('city', $user_location['data']);
        $this->assertObjectHasAttribute('zip', $user_location['data']);
    }
}