<?php

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\ProductController;
use App\Controllers\ReceiptController;
use App\Controllers\SaleController;
use App\Controllers\ScratchOffController;
use App\Controllers\UserController;
use Core\Exceptions\NotFoundException;
use Core\Helper\Router;

Router::get("/", function () {
    HomeController::index();
});

Router::get("/login", function () {
    AuthController::login();
});

Router::post("/login", function () {
    AuthController::doLogin();
});

Router::get("/logout", function () {
    AuthController::logout();
});

Router::get("/produtos", function () {
    ProductController::list();
});

Router::get("/vendas", function () {
    SaleController::list();
});

Router::get("/rabbitmq", function () {
    HomeController::rabbitmq();
});

Router::get("/produtos", function () {
    ProductController::list();
});

Router::get("/cadastro", function () {
    UserController::register();
});

Router::post("/cadastro", function () {
    UserController::userRegister();
});

Router::get("/cupomfiscal", function () {
    ReceiptController::receipt();
});

Router::post("/cupomfiscal", function () {
    ReceiptController::receiptRegister();
});

Router::get("/raspadinha", function() {
    ScratchOffController::generatePrize();
});

throw new NotFoundException();
