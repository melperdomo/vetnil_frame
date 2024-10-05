<?php

use Controllers\AuthController;
use Controllers\HomeController;
use Core\Exceptions\NotFoundException;
use Core\Middleware\Middleware;
use Core\Helper\Router;

Router::get("/login", function() {
    AuthController::login();
});

Middleware::run(["validateCsrf"], function() {

    Router::post("/login", function() {
        AuthController::doLogin();
    });

});

Middleware::run(["checkUserSession", "checkAcl"], function() {

    Router::get("/", function() {
        HomeController::index();
    });

    Router::get("/logout", function() {
        AuthController::logout();
    });

});

throw new NotFoundException();