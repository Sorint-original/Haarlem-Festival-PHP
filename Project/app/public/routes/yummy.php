<?php

require_once(__DIR__ . "/../controllers/YummyController.php");

// Main yummy page route
Route::add('/yummy', function () {
    require(__DIR__ . "/../views/pages/yummy.php");
}, 'get');

// Get yummy page content
Route::add('/yummy/get-page', function () {
    $controller = new YummyController();
    $page = $controller->getYummyPage();
    echo json_encode($page);
}, 'get');

// API: Get all restaurants or by cuisine
Route::add('/restaurants', function () {
    require_once(__DIR__ . '/../controllers/YummyController.php');
    $controller = new YummyController();
    if (isset($_GET['cuisine']) && $_GET['cuisine'] !== 'all') {
        $controller->getRestaurantsByCuisine();
    } else {
        $controller->getAllRestaurants();
    }
}, 'get');

// API: Get restaurant by ID (renamed to /restaurant)
Route::add('/restaurant', function () {
    require_once(__DIR__ . '/../controllers/YummyController.php');
    $controller = new YummyController();
    $controller->getRestaurantById();
}, 'get');
