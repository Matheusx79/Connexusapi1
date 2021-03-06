<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitec1bc00cfb2fcfdf76544113e7c9a11c
{
    public static $prefixLengthsPsr4 = array (
        'f' => 
        array (
            'facades\\' => 8,
        ),
        'c' => 
        array (
            'core\\' => 5,
            'con\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'facades\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/facades',
        ),
        'core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/core',
        ),
        'con\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controller',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitec1bc00cfb2fcfdf76544113e7c9a11c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitec1bc00cfb2fcfdf76544113e7c9a11c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
