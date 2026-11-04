<?php
declare(strict_types = 1);

function calculateTotal(float $price, int $quantity):float{
    return $price * $quantity;
}

echo "El total a pagar es: ".calculateTotal(50,3).PHP_EOL; // argumentos posicionales
echo "El total a pagar es: ".calculateTotal(quantity:50,price:100).PHP_EOL; // argumentos nombrados