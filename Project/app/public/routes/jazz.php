<?php
require_once(__DIR__ . "/../controllers/JazzController.php");

Route::add('/jazz', function () {
    require(__DIR__ . "/../views/pages/jazz.php");
});

Route::add('/jazz/get-events', function () {
    $controller = new JazzController();
    $controller->getEvents();
}, 'post');

