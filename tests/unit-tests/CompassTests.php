<?php
/**
 * Class CompassTests file.
 * 
 * @since 1.0.0
 * @package Compass
 * @subpackage Compass/tests/unit-tests
 */

use PHPUnit\Framework\TestCase;
use Compass\Compass;

// Test CMD: ./vendor/bin/phpunit --bootstrap tests/unit-tests/CompassTests

final class CompassTests extends TestCase {

    /**
     * Test to check if for undefined ipstack api key
     *
     * @since 1.0.0
     */
    public function test_undefined_ipstack_api_key() {
        // Test to make sure we get the correct error when no API key is defined
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
        $api_key = getenv('IPSTACK_API_KEY');

        define('IPSTACK_API_KEY', $api_key);
        $compass = new Compass();

        // Test to see if we get the correct API key
        $this->assertEquals($api_key, $compass->get_api_key());
    }

    /**
     * Test the get_user_location method.
     *
     * @since 1.0.0
     */
    // public function test_get_user_location() {
    //     $compass = new Compass();
    //     $user_location = $compass->get_user_location();

    //     // Test to see if we are getting all the data for user's
    //     $this->assertArrayHasKey('ip', $user_location);
    //     $this->assertArrayHasKey('type', $user_location);
    //     $this->assertArrayHasKey('continent_code', $user_location);
    //     $this->assertArrayHasKey('continent_name', $user_location);
    //     $this->assertArrayHasKey('country_code', $user_location);
    //     $this->assertArrayHasKey('country_name', $user_location);
    //     $this->assertArrayHasKey('region_code', $user_location);
    //     $this->assertArrayHasKey('region_name', $user_location);
    //     $this->assertArrayHasKey('city', $user_location);
    //     $this->assertArrayHasKey('zip', $user_location);
    // }
}