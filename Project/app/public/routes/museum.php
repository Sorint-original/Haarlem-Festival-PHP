<?php

require_once(__DIR__ . "/../controllers/MuseumController.php");

Route::add('/museum', function () {
    require(__DIR__ . "/../views/pages/museum.php");
});

Route::add('/museum/get-page', function () {
    $controller = new MuseumController();
    $controller->getPageContent();
}, 'get');