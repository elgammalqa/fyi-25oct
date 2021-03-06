<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3f6312b5f482eff0bda8de1fb7b3602e
{
    public static $prefixLengthsPsr4 = array (
        'n' => 
        array (
            'nadar\\quill\\' => 12,
        ),
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'nadar\\quill\\' => 
        array (
            0 => __DIR__ . '/..' . '/nadar/quill-delta-parser/src',
        ),
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/src/Twilio',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3f6312b5f482eff0bda8de1fb7b3602e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3f6312b5f482eff0bda8de1fb7b3602e::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
