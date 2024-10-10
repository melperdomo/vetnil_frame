<?php

use Controllers\AuthController;
use Controllers\HomeController;
use Core\Exceptions\NotFoundException;
use Core\Helper\Router;

Router::get("/", function() {
    HomeController::index();
});

Router::get("/login", function() {
    AuthController::login();
});

Router::post("/login", function() {
    AuthController::doLogin();
});

Router::get("/logout", function() {
    AuthController::logout();
});

throw new NotFoundException();