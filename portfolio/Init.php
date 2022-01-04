<?php
/**
 * @package portfolio
 */
namespace Portfolio;

/**
 * Main plugin class
 */
final class Init
{
    
    // Register and init classes
    public static function run($classMap)
    {
        foreach ($classMap as $class) {
            $service = new $class();
            if (method_exists($service, 'init')) {
                $service->init();
            }
        }
    }
}
    

