<?php

namespace Core\Helper;

class Session
{
    public static function get(string $key)
    {
        $value = empty($_SESSION[$key]) ? null: $_SESSION[$key];
        return $value;
    }

    public static function set(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function unset(string $key)
    {
        unset($_SESSION[$key]);
    }
}