<?php

use Controllers\AuthController;
use Controllers\HomeController;
use Core\Exceptions\NotFoundException;
use Core\Middleware;
use Core\Router;

Router::get("/login", function() {
    AuthController::login();
});

Router::post("/login", function() {
    AuthController::doLogin();
});

Middleware::run("checkUserSession", function() {

    Router::get("/", function() {
        HomeController::index();
    });

});

throw new NotFoundException();