<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita519f7e9c1c23ba5ca4eb5364a158a1d
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'App\\Classes\\Database' => __DIR__ . '/../..' . '/app/classes/Database.php',
        'App\\Classes\\Home' => __DIR__ . '/../..' . '/app/classes/Home.php',
        'App\\Route\\Route' => __DIR__ . '/../..' . '/app/route/Route.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita519f7e9c1c23ba5ca4eb5364a158a1d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita519f7e9c1c23ba5ca4eb5364a158a1d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita519f7e9c1c23ba5ca4eb5364a158a1d::$classMap;

        }, null, ClassLoader::class);
    }
}
