<?php

require_once(__DIR__ . "/../controllers/HistoryController.php");

Route::add('/history', function () {
    $controller = new HistoryController();
    $page = $controller->GetHistoryPage();
    require(__DIR__ . "/../views/pages/history.php");
});

Route::add('/history/location/([a-z0-9-]+)', function ($slug) {
    $controller = new HistoryController();
    $location = $controller->GetLocation($slug);
    require(__DIR__ . "/../views/pages/location-detail.php");
});

Route::add('/history/schedule', function () {
    $controller = new HistoryController();
    $schedules = $controller->GetSchedule(); // <- Create this method
    require(__DIR__ . '/../views/pages/HistorySchedule.php');
});


