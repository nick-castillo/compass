# Compass
A location detection plugin for WordPress that uses the ipstack API.

## Assumptions
1. You have an [ipstack](https://ipstack.com/) account where you can get an access key.
1. Know the basics of how to navigate your machine using a terminal.
1. Have [composer](https://getcomposer.org/) installed on your machine.
1. If you are running a load balancer, the client's IP is getting passed down to the servers.

## Installation
1. Download or clone a copy of the repo to your machine.
1. Unzip the file and move the unzipped folder to the `wp-content/plugin` folder of your WordPress site.
1. Rename the folder from `compass-master` to `compass`. 
1. If you didn't do the steps above with a terminal, open one up, and `cd` into the compass plugin location.
1. Once you are in the root of the compass plugin, run: `composer install`. This will install the dependencies required by the plugin.
1. Optimize the autoload file: `composer dumpautoload -o`.
1. Edit your `wp-config.php` file and define: `IPSTACK_API_KEY` & `IP_STACK_MEMBERSHIP_TYPE`
    ```
    ...
    define('IPSTACK_API_KEY', 'enter_your_access_key_here');
    define('IP_STACK_MEMBERSHIP_TYPE', ''); // Values can be free or paid
    ...
    ```
1. Log into the WordPress Dashboard and activate the plugin.
1. Instantiate where you want to use and call get_user_location:
    ```
    $compass  = new Compass();
    $location = $compass->get_user_location();

    echo'<pre>'; print_r( $compass->get_user_location() ); echo'</pre>';

    // Should get an output that looks like this:
    Array
    (
        [data] => stdClass Object
            (
                [ip] => '...'
                [type] => '...'
                [continent_code] => '...' 
                [continent_name] => '...' 
                [country_code] => '...' 
                [country_name] => '...' 
                [region_code] => '...' 
                [region_name] => '...' 
                [city] => '...' 
                [zip] => '...' 
                [latitude] => '...' 
                [longitude] => '...' 
                [location] => stdClass Object
                    (
                        [geoname_id] => '...' 
                        [capital] => '...' 
                        [languages] => '...' 
                        [country_flag] => '...' 
                        [country_flag_emoji] => '...' 
                        [country_flag_emoji_unicode] => '...' 
                        [calling_code] => '...' 
                        [is_eu] => '...' 
                    )
            )
    )
    ```
1. That's it, happy coding!
