<?php

namespace Core\Helper;

use Core\Exceptions\SingeloException;

class Env
{
    const PATH = '/../../.env';

    public static function load()
    {
        $env = static::fetchFileContents();
        foreach($env as $key => $value) {
            if(key_exists($key, $_ENV)) continue;
            $_ENV[$key] = $value;
        }
    }

    public static function get(string $key = "")
    {
        return ($key) ? $_ENV[$key] : $_ENV;
    }

    private static function fetchFileContents()
    {
        $path = __DIR__ . static::PATH;
        if(!file_exists($path)) {
            throw new SingeloException("File .env not found");
        }

        $env = [];
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue;
            }

            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);
            $value = trim($value, '"');

            $env[$key] = $value;
        }

        return $env;
    }
}