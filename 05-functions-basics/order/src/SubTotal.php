<?php
declare(strict_types = 1);

function calculateSubTotal(array $items):float{
    $subtotal = 0;
    if(empty($items)) return $subtotal;
    foreach($items as $item){
        if(!isset($item['price'],$item['quantity'])) continue;
        $subtotal += $item['price'] * $item['quantity'];
    }
    return $subtotal;
}