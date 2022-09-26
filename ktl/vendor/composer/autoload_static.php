<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc5e6a8bf8c4fde2ea1a74bbc793d2456
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc5e6a8bf8c4fde2ea1a74bbc793d2456::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc5e6a8bf8c4fde2ea1a74bbc793d2456::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc5e6a8bf8c4fde2ea1a74bbc793d2456::$classMap;

        }, null, ClassLoader::class);
    }
}
