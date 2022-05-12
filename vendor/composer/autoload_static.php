<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit77201a06f1fe2f58ebd1a6207fa92e46
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Application\\Controller\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Application\\Controller\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Controller',
        ),
    );

    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/../..' . '/src',
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit77201a06f1fe2f58ebd1a6207fa92e46::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit77201a06f1fe2f58ebd1a6207fa92e46::$prefixDirsPsr4;
            $loader->fallbackDirsPsr4 = ComposerStaticInit77201a06f1fe2f58ebd1a6207fa92e46::$fallbackDirsPsr4;
            $loader->classMap = ComposerStaticInit77201a06f1fe2f58ebd1a6207fa92e46::$classMap;

        }, null, ClassLoader::class);
    }
}
