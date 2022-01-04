<?php
/**
 * @package portfolio
 */

namespace Portfolio\Base;

/**
 * Plugin config file
 */
class Config
{

    static $config = [];

    /**
     * Get config value
     * @param  string $key
     * @return string
     */
    public static function get($key = null)
    {
        return self::$config[$key];
    }

    /**
     * Set plugin config settings
     * @param array $config_array
     */
    public static function set($config_array)
    {
        if (is_array($config_array)) {
            foreach ($config_array as $key => $config) {
                self::$config[$key] = $config;
            }
        }
    }
}
