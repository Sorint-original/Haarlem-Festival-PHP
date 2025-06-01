<?php 
require_once(__DIR__ . "/../controllers/PurchaseController.php");
Route::add('/tickets', function () {
    //checks if logged in
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login'); // Redirect to login page
        exit();
    }
    // homepage is simply loading a static page
    // view the user routes for example following the MVC pattern
    require(__DIR__ . "/../views/pages/tickets.php");
});

Route::add('/tickets/get-eventstickets', function () {
    $controller = new PurchaseController();
    $controller->getEventsandTickets();
}, 'post');