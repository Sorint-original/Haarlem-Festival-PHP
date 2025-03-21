<?php


require_once(__DIR__ . "/../controllers/AdminController.php");

// get admin homepage 
Route::add('/admin', function () {
    require(__DIR__ . "/../views/pages/admin/admin-homepage.php");
});

// get admin users page

// get admin page data
Route::add('/admin/get-page', function () {
    $controller = new AdminController();
    $controller->getPageContent();
}, 'get');

// update admin page data
Route::add('/admin/update-page', function () {
    $controller = new AdminController();
    $controller->updatePage();
}, 'post');

// go to jazz edit admin page
Route::add('/admin/admin-jazz', function () {
    require(__DIR__ . "/../views/pages/admin/admin-jazz.php");
}, 'get');








