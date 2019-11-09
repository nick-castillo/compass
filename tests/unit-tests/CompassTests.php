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
    public function test_get_user_ip()
    {
        $dummy_user_ip = '11.11.11.11';
        $_SERVER['REMOTE_ADDR'] = $dummy_user_ip;

        $compass = new Compass();

        $this->assertEquals( $dummy_user_ip, $compass->get_user_ip() );
    }
}