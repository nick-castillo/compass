<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfb8f12fb54a109f0429d85d2a5259908
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Compass\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Compass\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static $classMap = array (
        'Compass\\Compass_Loader' => __DIR__ . '/../..' . '/includes/class-compass-loader.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfb8f12fb54a109f0429d85d2a5259908::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfb8f12fb54a109f0429d85d2a5259908::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfb8f12fb54a109f0429d85d2a5259908::$classMap;

        }, null, ClassLoader::class);
    }
}