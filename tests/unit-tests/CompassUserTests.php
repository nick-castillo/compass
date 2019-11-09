<?php
/**
 * Class CompassUserTests file.
 * 
 * @since 1.0.0
 * @package Compass
 * @subpackage Compass/tests/unit-tests
 */

use PHPUnit\Framework\TestCase;
use Compass\Compass_User;

// Test CMD: ./vendor/bin/phpunit tests/unit-tests/CompassUserTests

final class CompassUserTests extends TestCase {

    /**
     * Test the get_user_ip method.
     *
     * @since 1.0.0
     */
    public function test_get_user_ip() {
        $dummy_user_ip = getenv('USER_IP_ADDRESS');
        $_SERVER['REMOTE_ADDR'] = $dummy_user_ip;

        $user = new Compass_User();

        // Test to make sure we are getting the correct user ip address
        $this->assertEquals( $dummy_user_ip, $user->get_ip_address() );
    }
}