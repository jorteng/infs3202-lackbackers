<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit16c6ebc5d1a6a082eb406c31eabd817c
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit16c6ebc5d1a6a082eb406c31eabd817c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit16c6ebc5d1a6a082eb406c31eabd817c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
