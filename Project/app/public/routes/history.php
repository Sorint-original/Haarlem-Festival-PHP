<?php

require_once(__DIR__ . "/../controllers/HistoryController.php");

Route::add('/history', function () {
    $controller = new HistoryController();
    $page =  $controller->GetHistoryPage();
    require(__DIR__ . "/../views/pages/history.php");
});