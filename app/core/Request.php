<?php

namespace Core;

class Request
{
    public static function get(string $key = "")
    {
        if(!empty($key) && key_exists($key, $_GET)) {
            return $_GET[$key];
        }

        return $_GET;
    }

    public static function post(string $key = "")
    {
        if(!empty($key) && key_exists($key, $_POST)) {
            return $_POST[$key];
        }

        return $_POST;
    }

    public static function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function getUri(): string
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}