<?php
define('WP_ROOT', '/var/www/html');
define('WP_USE_THEMES', false);

/* bootstrap WordPress */
require_once WP_ROOT . '/wp-load.php';

/* composer autoload */
require_once dirname(__DIR__, 1) . '/vendor/autoload.php';
