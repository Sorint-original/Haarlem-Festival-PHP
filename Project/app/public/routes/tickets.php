<?php 

Route::add('/tickets', function () {
    //checks if logged in
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login'); // Redirect to login page
        exit();
    }
    // homepage is simply loading a static page
    // view the user routes for example following the MVC pattern
    $controller = new HomepageController; 
    require(__DIR__ . "/../views/pages/index.php");
});