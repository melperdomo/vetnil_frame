<?php

use Controllers\AuthController;
use Core\Exceptions\NotFoundException;
use Core\Router;

Router::get("/login", function() {
    AuthController::login();
});

Router::post("/login", function() {
    AuthController::doLogin();
});

throw new NotFoundException();