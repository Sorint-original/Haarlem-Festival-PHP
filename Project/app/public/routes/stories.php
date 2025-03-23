<?php
require_once(__DIR__ . "/../controllers/StoriesController.php");

Route::add('/stories', function () {
    //  is simply loading a static page
    // view the user routes for example following the MVC pattern
   

    require(__DIR__ . "/../views/pages/stories.php");

});

// get page content (except events)
Route::add('/get-stories-content', function () {
    $controller = new StoriesController();
    $controller->getPageContent();
}, 'get');

//get events controllerda olusturdugum fonksiyonu cagiriyorum, controllerda da modeli cagirmistim.
//bu linki java scriptte fetch yaparken kullanacagim