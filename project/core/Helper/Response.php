<?php

namespace Core\Helper;

class Response
{
    public static function redirect(string $url)
    {
        header("Location: $url");
    }
}