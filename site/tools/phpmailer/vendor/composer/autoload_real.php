<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitaffdb6c56a6e3cd60c1f101f4f76e049
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitaffdb6c56a6e3cd60c1f101f4f76e049', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitaffdb6c56a6e3cd60c1f101f4f76e049', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitaffdb6c56a6e3cd60c1f101f4f76e049::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}