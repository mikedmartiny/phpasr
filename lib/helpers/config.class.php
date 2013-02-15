<?php
/**
 * @package phpasr
 * @author Thomas Palmer
 * @version v1.0.0 13/02/2013 NEW FILE
 */

class config {
    public static function get($key) {
        $config = require appConfig . 'config.php';

        return $config[$key];
    }
}