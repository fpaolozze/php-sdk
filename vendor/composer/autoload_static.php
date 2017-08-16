<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcad8efd584ac2297f03ebb9b72150c7a
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Paggi\\' => 6,
        ),
        'C' => 
        array (
            'Curl\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Paggi\\' => 
        array (
            0 => __DIR__ . '/../..' . '/lib',
        ),
        'Curl\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-curl-class/php-curl-class/src/Curl',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcad8efd584ac2297f03ebb9b72150c7a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcad8efd584ac2297f03ebb9b72150c7a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
