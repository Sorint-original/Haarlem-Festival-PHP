<?php
$STRIPE_SECRET_KEY = 'sk_test_Gx4mWEgHtCMr4DYMUIqfIrsz';
require_once 'lib/stripe-php-17.4.0-beta.1/init.php';

$stripe = new \Stripe\StripeClient($STRIPE_SECRET_KEY);

$lineItems = [
    [
        'price_data' => [
            'currency' => 'usd',
            'product_data' => [
                'name' => 'Fried Rice',
            ],
            'unit_amount' => 9.99 * 100,    //  convert to cents
        ],
        'quantity' => 1,
    ],
    [
        'price_data' => [
            'currency' => 'usd',
            'product_data' => [
                'name' => 'Fried Noodle',
            ],
            'unit_amount' => 11.99 * 100,   //  convert to cents
        ],
        'quantity' => 2,
    ]
];

// Create Stripe checkout session
$checkoutSession = $stripe->checkout->sessions->create([
    'line_items' => $lineItems,
    'mode' => 'payment',
    'success_url' => 'http://localhost/checkout-success.php?provider_session_id={CHECKOUT_SESSION_ID}',
    'cancel_url' => 'http://localhost/cart.php?provider_session_id={CHECKOUT_SESSION_ID}'
]);

// Retrieve provider_session_id. Store in database.
//$checkoutSession->id;

// Send user to Stripe
header('Content-Type: application/json');
header("HTTP/1.1 303 See Other");
header("Location: " . $checkoutSession->url);
exit;
