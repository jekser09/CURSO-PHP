<?php
declare(strict_types = 1);
function applyDiscount(float $amount,float $discount):float{
    if($discount <= 0) return $amount;
    return $amount - ($amount * $discount/100);
}