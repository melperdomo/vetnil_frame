<?php

namespace Core\Helper;

class Session
{
    public static function get(string $key)
    {
        @session_start();
        return $_SESSION[$key];
    }

    public static function set(string $key, $value)
    {
        @session_start();
        return $_SESSION[$key] = $value;
    }
}