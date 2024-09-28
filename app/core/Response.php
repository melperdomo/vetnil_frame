<?php

namespace Core;

class Response
{
    public static function redirect(string $url)
    {
        header("Location: $url");
    }
}