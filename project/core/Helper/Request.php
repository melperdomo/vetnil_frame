<?php

namespace Core\Helper;

class Request
{
    public static function get(string $key = "")
    {
        if(!empty($key) && key_exists($key, $_GET)) {
            return $_GET[$key];
        }

        if(!empty($key) && key_exists($key, $_GET) == false) {
            return NULL;
        }

        return $_GET;
    }

    public static function post(string $key = "")
    {
        if(!empty($key) && key_exists($key, $_POST)) {
            return $_POST[$key];
        }

        if(key_exists($key, $_POST) == false) {
            return null;
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