<?php
/**
 * Class CompassUserTests file.
 * 
 * @since 1.0.0
 * @package Compass
 * @subpackage Compass/tests
 */

use PHPUnit\Framework\TestCase;
use Compass\Compass;

// Test CMD: ./vendor/bin/phpunit --bootstrap tests/bootstrap.php tests/unit-tests/CompassTests

final class CompassTests extends TestCase {

    /**
     * Test the get_user_ip method.
     *
     * @since 1.0.0
     */
    public function test_get_user_ip() {
        $dummy_user_ip = getenv('USER_IP_ADDRESS');
        $_SERVER['REMOTE_ADDR'] = $dummy_user_ip;

        $compass = new Compass();

        $this->assertEquals( $dummy_user_ip, $compass->get_user_ip() );
    }

    /**
     * Test ipstack api_key getter/setter methods
     *
     * @since 1.0.0
     */
    public function test_get_set_api_key() {
        $api_key = getenv('IPSTACK_API_KEY');

        // Grab key without it getting defined anywhere
        $compass_one = new Compass();
        $this->assertNull( $compass_one->get_api_key() );

        // Grab key successfully
        define('IPSTACK_API_KEY', $api_key);
        $compass_two = new Compass();
        $this->assertEquals( $api_key, $compass_two->get_api_key() );
    }

    /**
     * Test the get_user_location method.
     *
     * @since 1.0.0
     */
    // public function test_get_user_location() {

    // }
}