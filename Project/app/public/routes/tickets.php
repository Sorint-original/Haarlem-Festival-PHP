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
    //Getting started with the tickets page
    require(__DIR__ . "/../views/pages/tickets.php");
});

Route::add('/tickets/get-eventstickets', function () {
    $controller = new PurchaseController();
    $controller->getEventsandTickets();
}, 'post');

Route::add('/tickets/jazzPasses', function () {
    $controller = new JazzController();
    $JazzPasses = $controller->getDayPasses();
    echo json_encode($JazzPasses);
}, 'get');


//route to add ticket in the cart
Route::add('/tickets/addInCart', function () {
    $controller = new PurchaseController(); // create a new user controller
    $controller->addTicketInCart();
}, 'post');
//route to remove ticket in the cart
Route::add('/tickets/removeFromCart', function () {
    $controller = new PurchaseController(); // create a new user controller
    $controller->RemoveFromCart();
}, 'delete');
//route to increase the amount of a list-item in the cart
Route::add('/tickets/updateAmount', function () {
    $controller = new PurchaseController(); // create a new user controller
    $controller->UpdateAmount();
}, 'patch');

//route to get cart
Route::add('/tickets/cart', function () {
    $controller = new PurchaseController(); // create a new user controller
    $controller->HandleCart();
}, 'get');

//route to increase the amount of a list-item in the cart
Route::add('/tickets/emptyCart', function () {
    $controller = new PurchaseController(); // create a new user controller
    $controller->EmptyCart();
}, 'patch');


// PAYMENT PAGE
Route::add('/purchase', function () {
    //checks if logged in
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login'); // Redirect to login page
        exit();
    }
    //Getting the users cart
    $controller = new PurchaseController();
    $cart = $controller->GetCart();
    //Getting started with the tickets page
    require(__DIR__ . "/../views/pages/purchase.php");
});

//route to increase the amount of a list-item in the cart
Route::add('/checkout-success', function () {
    $controller = new PurchaseController(); // create a new user controller
    $controller->CompleteCheckout();

    header("Location: /tickets" );
});

