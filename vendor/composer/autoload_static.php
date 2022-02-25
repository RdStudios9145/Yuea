<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5dd8d63b5376ec8fb0579e7d752de44f
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit5dd8d63b5376ec8fb0579e7d752de44f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5dd8d63b5376ec8fb0579e7d752de44f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5dd8d63b5376ec8fb0579e7d752de44f::$classMap;

        }, null, ClassLoader::class);
    }
}
