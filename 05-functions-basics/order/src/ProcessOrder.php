<?php
declare(strict_types = 1);
require_once __DIR__ . '/Discount.php';
require_once __DIR__ . '/SubTotal.php';
require_once __DIR__ . '/Tax.php';

function processOrder(array $cart):array{
    $subtotal = calculateSubTotal($cart);
    $discounted =  applyDiscount($subtotal,10);
    return [
        "subtotal" => $subtotal,
        "discounted" => $discounted,
        "total" =>  calculateTax($discounted,13),
    ];
}