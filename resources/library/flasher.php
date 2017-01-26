<?php

class Flasher
{
    private static $MESSAGE_PREFIX = 'flash_messages';
    const TYPES = array("success", "info", "warning", "danger");

    static function has($name)
    {
        return isset($_SESSION[self::$MESSAGE_PREFIX][$name]);
    }

    //Returns true only if at least one flash message is set
    static function hasMessage()
    {
        foreach (self::TYPES as $type)
        {
            if (self::has($type)) return true;
        }
        return false;
    }
    /**
     * Return flashed message.
     *
     * @param string $name Flash message name.
     * @return mixed
     */
    static function get($name)
    {
        if (!self::has($name)) {
            return null;
        }

        $value = $_SESSION[self::$MESSAGE_PREFIX][$name];

        unset($_SESSION[self::$MESSAGE_PREFIX][$name]);

        return $value;
    }

    static function peek($name)
    {
        if (!self::has($name)) {
            return null;
        }

        return $_SESSION[self::$MESSAGE_PREFIX][$name];
    }

    /**
     * Flash value.
     *
     * @param string $name Flash message name.
     * @param mixed $value Value to flash.
     * @return void
     */
    static function set($name, $value)
    {
        $_SESSION[self::$MESSAGE_PREFIX][$name] = $value;
    }
}