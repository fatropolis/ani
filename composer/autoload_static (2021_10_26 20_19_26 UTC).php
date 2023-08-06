<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6cdd36c740bfa33566a5c4cb9e4c7877
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6cdd36c740bfa33566a5c4cb9e4c7877::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6cdd36c740bfa33566a5c4cb9e4c7877::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6cdd36c740bfa33566a5c4cb9e4c7877::$classMap;

        }, null, ClassLoader::class);
    }
}
