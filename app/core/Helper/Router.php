<?php

namespace Core\Helper;

class Router
{
    public static function get(string $url, callable $function): void
    {
        static::exec("GET", $url, $function);
    }

    public static function post(string $url, callable $function): void
    {
        static::exec("POST", $url, $function);
    }

    public static function put(string $url, callable $function): void
    {
        static::exec("PUT", $url, $function);
    }

    public static function delete(string $url, callable $function): void
    {
        static::exec("DELETE", $url, $function);
    }

    private static function exec(string $method, string $url, callable $function): void
    {
        if(Request::getMethod() !== $method) return;   
        if(Request::getUri() !== $url) return;

        $function();
        exit;
    }
}