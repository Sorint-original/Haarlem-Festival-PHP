<?php
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