<?php

require_once(__DIR__ . "/../controllers/HomepageController.php");

Route::add('/', function () {
    // homepage is simply loading a static page
    // view the user routes for example following the MVC pattern
    $controller = new HomepageController; 
    require(__DIR__ . "/../views/pages/index.php");
});
// get page content (except events)
Route::add('/get-page-content', function () {
    $controller = new HomepageController();
    $controller->getPageContent();
}, 'get');
// get event content
Route::add('/get-events', function () {
    $controller = new HomepageController();
    $controller->getEvents();
}, 'post');


// FESTIVAL ROUTES

//JAZZ
require_once(__DIR__ . "/../controllers/JazzController.php");

Route::add('/jazz', function () {
    $controller = new JazzController();
    $JazzPasses = $controller->getDayPasses();
    $page =  $controller->GetJazzPage();
    require(__DIR__ . "/../views/pages/jazz.php");
});

Route::add('/jazz/get-events', function () {
    $controller = new JazzController();
    $controller->getEvents();
}, 'post');

Route::add('/jazz/band/([a-z-0-9-]*)', function ($bandId) {
    $controller = new JazzController(); // create a new user controller
    $band = $controller->getBand($bandId); // get data for the view
    $shows = $controller->GetBandShows($bandId);
    require_once(__DIR__ . "/../views/pages/jazzBand.php"); // load the view
});

