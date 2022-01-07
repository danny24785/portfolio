<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc0de7e09fe8f20f769d79a000406aee8
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Testtheme\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Testtheme\\' => 
        array (
            0 => __DIR__ . '/../..' . '/portfolio',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Portfolio\\Base\\Config' => __DIR__ . '/../..' . '/portfolio/Base/Config.php',
        'Portfolio\\Base\\Enqueue' => __DIR__ . '/../..' . '/portfolio/Base/Enqueue.php',
        'Portfolio\\Init' => __DIR__ . '/../..' . '/portfolio/Init.php',
        'Portfolio\\Menu\\Menu' => __DIR__ . '/../..' . '/portfolio/Menu/Menu.php',
        'Portfolio\\Overviews\\Excerpt' => __DIR__ . '/../..' . '/portfolio/Overviews/Excerpt.php',
        'Portfolio\\Widgets\\Widgets' => __DIR__ . '/../..' . '/portfolio/Widgets/Widgets.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc0de7e09fe8f20f769d79a000406aee8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc0de7e09fe8f20f769d79a000406aee8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc0de7e09fe8f20f769d79a000406aee8::$classMap;

        }, null, ClassLoader::class);
    }
}
