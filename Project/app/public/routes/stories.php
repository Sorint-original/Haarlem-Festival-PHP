<?php

require_once(__DIR__ . "/../controllers/StoriesController.php");

Route::add('/stories', function () {
    //  is simply loading a static page
    // view the user routes for example following the MVC pattern
   
    $controller = new StoriesController();
    $controller->getStories();

});

// get page content (except events)
Route::add('/get-stories-content', function () {
    $controller = new StoriesController();
    $controller->getPageContent();
}, 'get');


