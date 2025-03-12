<?php

Route::add('/admin', function () {
    require(__DIR__ . "/../views/pages/admin.php");
});

// Admin Homepage Route
Route::add('/admin/admin-homepage', function () {
    require(__DIR__ . "/../views/partials/admin-partials/admin-homepage.php");
});



