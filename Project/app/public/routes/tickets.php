<?php 
require_once(__DIR__ . "/../controllers/PurchaseController.php");
Route::add('/tickets', function () {
    //checks if logged in
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login'); // Redirect to login page
        exit();
    }
    //Getting the users cart
    $controller = new PurchaseController();
    $cart = $controller->HandleCart();

    //Getting started with the tickets page
    require(__DIR__ . "/../views/pages/tickets.php");
});

Route::add('/tickets/get-eventstickets', function () {
    $controller = new PurchaseController();
    $controller->getEventsandTickets();
}, 'post');




//route to add ticket in the cart
Route::add('/ticket/([a-z-0-9-]*/add)', function ($shopTicketId) {
    $controller = new PurchaseController(); // create a new user controller
});