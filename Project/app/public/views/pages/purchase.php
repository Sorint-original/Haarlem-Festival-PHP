<?php
$STRIPE_SECRET_KEY = 'sk_test_Gx4mWEgHtCMr4DYMUIqfIrsz';
require_once 'lib/stripe-php-17.4.0-beta.1/init.php';

$stripe = new \Stripe\StripeClient($STRIPE_SECRET_KEY);

$lineItems = [];
    
foreach ($cart->CartItems as $item) {
    $productName = $item->event->title ?? $item->ticket->EventId;
    if (isset($item->event)) {
        $description = date('M l d H:i-',((int) (string) $item->event->startTime)/ 1000).date('H:i',((int) (string) $item->event->endTime)/ 1000)." | ".$item->event->location;
    } else {
        $description = 'Event Ticket';
    }
    
    array_push($lineItems, [
        'price_data' => [
            'currency' => 'eur',
            'product_data' => [
                'name' => $productName,
                'description' => $description,
            ],
            'unit_amount' => (int)($item->ticket->price * 100),
        ],
        'quantity' => (int)$item->amount,
    ]);
    }

// Create Stripe checkout session
$checkoutSession = $stripe->checkout->sessions->create([
    'line_items' => $lineItems,
    'mode' => 'payment',
    'success_url' => 'http://localhost/checkout-success',
    'cancel_url' => 'http://localhost/tickets'
]);

// Retrieve provider_session_id. Store in database.

// Send user to Stripe
header('Content-Type: application/json');
header("HTTP/1.1 303 See Other");
header("Location: " . $checkoutSession->url);
exit;
