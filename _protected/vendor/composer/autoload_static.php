<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita1a2029af97aaf57a43ecb6bb92f72cb
{
    public static $files = array (
        '2cffec82183ee1cea088009cef9a6fc3' => __DIR__ . '/..' . '/ezyang/htmlpurifier/library/HTMLPurifier.composer.php',
        '2c102faa651ef8ea5874edb585946bce' => __DIR__ . '/..' . '/swiftmailer/swiftmailer/lib/swift_required.php',
        '180092cfc969a12e06f2132a203a3184' => __DIR__ . '/..' . '/codeception/verify/src/Codeception/function.php',
    );

    public static $prefixLengthsPsr4 = array (
        'y' => 
        array (
            'yii\\swiftmailer\\' => 16,
            'yii\\gii\\' => 8,
            'yii\\faker\\' => 10,
            'yii\\debug\\' => 10,
            'yii\\composer\\' => 13,
            'yii\\codeception\\' => 16,
            'yii\\bootstrap\\' => 14,
            'yii\\' => 4,
        ),
        'n' => 
        array (
            'nenad\\passwordStrength\\' => 23,
            'nenad\\' => 6,
        ),
        'm' => 
        array (
            'mihaildev\\ckeditor\\' => 19,
        ),
        'k' => 
        array (
            'kartik\\social\\' => 14,
            'kartik\\base\\' => 12,
        ),
        'c' => 
        array (
            'cebe\\markdown\\' => 14,
        ),
        'F' => 
        array (
            'Faker\\' => 6,
            'Facebook\\' => 9,
        ),
        'D' => 
        array (
            'DeepCopy\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'yii\\swiftmailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-swiftmailer',
        ),
        'yii\\gii\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-gii',
        ),
        'yii\\faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-faker',
        ),
        'yii\\debug\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-debug',
        ),
        'yii\\composer\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-composer',
        ),
        'yii\\codeception\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-codeception',
        ),
        'yii\\bootstrap\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-bootstrap',
        ),
        'yii\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2',
        ),
        'nenad\\passwordStrength\\' => 
        array (
            0 => __DIR__ . '/..' . '/nenad/yii2-password-strength',
        ),
        'nenad\\' => 
        array (
            0 => __DIR__ . '/..' . '/nenad/yii2-widgets-base',
            1 => __DIR__ . '/..' . '/nenad/yii2-strength-meter',
        ),
        'mihaildev\\ckeditor\\' => 
        array (
            0 => __DIR__ . '/..' . '/mihaildev/yii2-ckeditor',
        ),
        'kartik\\social\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/yii2-social',
        ),
        'kartik\\base\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/yii2-krajee-base',
        ),
        'cebe\\markdown\\' => 
        array (
            0 => __DIR__ . '/..' . '/cebe/markdown',
        ),
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fzaninotto/faker/src/Faker',
        ),
        'Facebook\\' => 
        array (
            0 => __DIR__ . '/..' . '/facebook/php-sdk-v4/src/Facebook',
        ),
        'DeepCopy\\' => 
        array (
            0 => __DIR__ . '/..' . '/myclabs/deep-copy/src/DeepCopy',
        ),
    );

    public static $prefixesPsr0 = array (
        'H' => 
        array (
            'HTMLPurifier' => 
            array (
                0 => __DIR__ . '/..' . '/ezyang/htmlpurifier/library',
            ),
        ),
        'D' => 
        array (
            'Diff' => 
            array (
                0 => __DIR__ . '/..' . '/phpspec/php-diff/lib',
            ),
        ),
        'C' => 
        array (
            'Codeception\\' => 
            array (
                0 => __DIR__ . '/..' . '/codeception/specify/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita1a2029af97aaf57a43ecb6bb92f72cb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita1a2029af97aaf57a43ecb6bb92f72cb::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInita1a2029af97aaf57a43ecb6bb92f72cb::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
