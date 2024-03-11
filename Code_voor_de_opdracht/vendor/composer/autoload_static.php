<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4650fe6242bcf42ab8a6ed71c760e709
{
    public static $prefixLengthsPsr4 = array (
        'l' => 
        array (
            'loginOpdracht\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'loginOpdracht\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4650fe6242bcf42ab8a6ed71c760e709::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4650fe6242bcf42ab8a6ed71c760e709::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4650fe6242bcf42ab8a6ed71c760e709::$classMap;

        }, null, ClassLoader::class);
    }
}
