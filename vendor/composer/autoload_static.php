<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0edc58b16ab78e5c285efa1f7b1eb2e2
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WPJuniorPostPrint\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WPJuniorPostPrint\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0edc58b16ab78e5c285efa1f7b1eb2e2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0edc58b16ab78e5c285efa1f7b1eb2e2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0edc58b16ab78e5c285efa1f7b1eb2e2::$classMap;

        }, null, ClassLoader::class);
    }
}
