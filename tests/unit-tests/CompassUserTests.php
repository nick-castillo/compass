<?php
/**
 * Class CompassUserTests file.
 * 
 * @since 1.0.0
 * @package Compass
 * @subpackage Compass/tests
 */

use PHPUnit\Framework\TestCase;
use Compass\Compass_User;

// Test CMD: ./vendor/bin/phpunit --bootstrap tests/bootstrap.php tests/unit-tests/CompassUserTests

final class CompassUserTests extends TestCase {
    public function test_get_user_ip()
    {
        $compass_user = new Compass_User();

        $this->assertIsString( $compass_user->get_ip() );
    }
}