<?php

namespace Controllers;

use Core\Request;
use Core\View;
use Throwable;

class SingeloController
{
    public static function clientException(Throwable $ex)
    {
        http_response_code(400);
        View::render("exception/client", [
            "ex_code" => $ex->getCode(),
            "ex_msg" => $ex->getMessage(),
            "ex" => $ex,
        ]);
    }

    public static function singeloException(Throwable $ex)
    {
        http_response_code(500);
        View::render("exception/singelo", [
            "ex_code" => $ex->getCode(),
            "ex_msg" => $ex->getMessage(),
            "ex" => $ex,
        ]);
    }

    public static function notFoundException(Throwable $ex)
    {
        http_response_code(404);
        $method = Request::getMethod();
        $uri = Request::getUri();

        View::render("exception/not-found", [
            "ex_code" => $ex->getCode(),
            "ex_msg" => "[$method] \"$uri\" not found",
            "ex" => $ex
        ]);
    }

    public static function notAllowedException(Throwable $ex)
    {
        http_response_code(405);

        View::render("exception/not-allowed", [
            "ex" => $ex
        ]);
    }
}