<?php

route::add('/stories/getAll', function () {
    require(__DIR__ . "/../views/pages/stories.php");

require_once(__DIR__ . "/../controllers/StoriesController.php");

Route::add('/stories', function () {
   $controller = new StoriesController();
    $controller->getStories();



});
// get page by page idate
