<?php
declare(strict_types = 1);
function calculateTax(float $amount, float $taxPercent):float{
    if($taxPercent <= 0) return $amount;
    return $amount + ($amount * $taxPercent/100);
}