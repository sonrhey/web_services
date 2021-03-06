<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcc06b8e08faf8de5fab124282d5668f7
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/src/Twilio',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcc06b8e08faf8de5fab124282d5668f7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcc06b8e08faf8de5fab124282d5668f7::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
