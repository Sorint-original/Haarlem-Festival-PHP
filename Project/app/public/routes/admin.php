<?php
require_once(__DIR__ . "/../controllers/AdminController.php");

// get admin-homepage 
Route::add('/admin', function () {
    require(__DIR__ . "/../views/pages/admin/admin-homepage.php");
});

// get admin homepage data
Route::add('/admin/admin-homepage', function () {

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


// get admin-users page
Route::add('/admin/users', function () {
    require(__DIR__ . "/../views/pages/admin/admin-users.php");
});
//get user by user id 
Route::add('/admin/getUserById', function () {
    $controller = new AdminController();
    $controller->getUserByUserId();
}, 'get');

// get all users
Route::add('/admin/users-getAllUsers', function () {
    $controller = new AdminController();
    $controller->getAllUsers();
}, 'get');

// update users 
Route::add('/admin/updateUser', function () {
    $controller = new AdminController();
    $controller->updateUser();
}, 'post');

// create user
Route::add('/admin/addUser', function () {
    $controller = new AdminController();
    $controller->createUserAdminPanel();
}, 'post');


// delete user
Route::add('/admin/deleteUser', function () {
    $controller = new AdminController();
    $controller->deleteUser();
}, 'delete');

// go to jazz edit admin page
Route::add('/admin/admin-jazz', function () {
    require(__DIR__ . "/../views/pages/admin/admin-jazz.php");
}, 'get');









