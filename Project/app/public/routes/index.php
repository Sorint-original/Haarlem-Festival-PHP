<?php

require_once(__DIR__ . "/../controllers/HomepageController.php");


Route::add('/', function () {
    // homepage is simply loading a static page
    // view the user routes for example following the MVC pattern
    $controller = new HomepageController; 
    require(__DIR__ . "/../views/pages/index.php");
});

Route::add('/get-events', function () {
    $controller = new HomepageController();
    $controller->getEvents();
}, 'post');


