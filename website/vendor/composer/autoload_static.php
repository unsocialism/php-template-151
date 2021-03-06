<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd2f09be74d72f5729ea84d8e202ffed0
{
    public static $files = array (
        '2c102faa651ef8ea5874edb585946bce' => __DIR__ . '/..' . '/swiftmailer/swiftmailer/lib/swift_required.php',
    );

    public static $prefixLengthsPsr4 = array (
        'U' => 
        array (
            'Unsocialism\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Unsocialism\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd2f09be74d72f5729ea84d8e202ffed0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd2f09be74d72f5729ea84d8e202ffed0::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
