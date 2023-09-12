<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit26ee07e936dd7b64dc5799db31a64821
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

        spl_autoload_register(array('ComposerAutoloaderInit26ee07e936dd7b64dc5799db31a64821', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit26ee07e936dd7b64dc5799db31a64821', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit26ee07e936dd7b64dc5799db31a64821::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}