<?php

Route::add('/login', function () {
    require(__DIR__ . "/../views/pages/login.php");
}, 'get');

Route::add('/login', function () {
    require_once(__DIR__ . '/../controllers/UserController.php');
    $controller = new UserController();
    $controller->login();
}, 'post');

Route::add('/register', function () {
    require(__DIR__ . "/../views/pages/login.php");
}, 'get');

Route::add('/register', function () {
    require_once(__DIR__ . '/../controllers/UserController.php');
    $controller = new UserController();
    $controller->register();
}, 'post');