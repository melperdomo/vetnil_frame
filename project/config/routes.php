<?php

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Controllers\ProductController;
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

Router::get("/produtos", function(){
    ProductController::list();
});

throw new NotFoundException();