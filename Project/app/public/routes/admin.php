<?php
require_once(__DIR__ . "/../controllers/AdminController.php");

// FOR ALL ADMIN PAGES - GET AND UPDATE DATA:
//for all pages - get data
Route::add('/admin/get-page', function () {

    $controller = new AdminController();
    $controller->getPageContent();
}, 'get');

//for all pages - update data
Route::add('/admin/update-page', function () {
    $controller = new AdminController();
    $controller->updatePage();
}, 'post');


// HOMEPAGE (ADMIN PANEL)
// go to admin homepage
Route::add('/admin', function () {
    require(__DIR__ . "/../views/pages/admin/admin-homepage.php");
});

// USERS (ADMIN PANEL)
// go to admin-users page
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


//JAZZ (ADMIN PANEL)
// go to jazz page
Route::add('/admin/admin-jazz', function () {
    require(__DIR__ . "/../views/pages/admin/admin-jazz.php");
}, 'get');

// MUSEUM (ADMIN PANEL)
// go to museum page
Route::add('/admin/admin-museum', function () {
    require(__DIR__ . "/../views/pages/admin/admin-museum.php");
}, 'get');








