<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit86de2bfd1b9c30c309ccccd6f8a895fd
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit86de2bfd1b9c30c309ccccd6f8a895fd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit86de2bfd1b9c30c309ccccd6f8a895fd::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}