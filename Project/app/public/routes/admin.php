<?php


require_once(__DIR__ . "/../controllers/AdminController.php");

// get admin homepage 
Route::add('/admin', function () {
    require(__DIR__ . "/../views/pages/admin/admin-homepage.php");
});

// get admin users page

// get admin homepage data
Route::add('/admin/admin-homepage', function () {
    $controller = new AdminController();
    $controller->getPageContent();
}, 'get');

// update admin homepage data
Route::add('/admin/admin-homepage', function () {
    $controller = new AdminController();
    $controller->updatePage();
}, 'post');

// get admin homepage data
Route::add('/admin/admin-jazz', function () {
    require(__DIR__ . "/../views/pages/admin/admin-jazz.php");
}, 'get');

// update admin homepage data
Route::add('/admin/admin-jazz', function () {
    $controller = new AdminController();
    $controller->updatePage();
}, 'post');








