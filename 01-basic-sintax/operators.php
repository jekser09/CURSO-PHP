<?php
declare(strict_types = 1);
// ARITMETICOS
echo (10 + 5).PHP_EOL;
echo (10 - 5).PHP_EOL;
echo (10 * 5).PHP_EOL;
echo (10 / 5).PHP_EOL;
echo (10 % 5).PHP_EOL; //Modulo
// ASIGNACION
$numero = 5;
echo $numero.PHP_EOL;
$numero += 1;
echo $numero.PHP_EOL;
$numero -= 1;
echo $numero.PHP_EOL;
$numero *= 1;
echo $numero.PHP_EOL;
$numero /= 1;
echo $numero.PHP_EOL;
$numero %= 1;
echo $numero.PHP_EOL;

//COMPARACION
echo (5 == 5).PHP_EOL;
echo (5 === 5).PHP_EOL; // IGUALDAD ESTRICTA
echo (5 != 5).PHP_EOL;
echo (5 !== 5).PHP_EOL; //DIFERENCIA ESTRICTA
echo (5 > 5).PHP_EOL;
echo (5 < 5).PHP_EOL;
echo (5 >= 5).PHP_EOL;
echo (5 <= 5).PHP_EOL;

//LOGICOS
echo (true && false).PHP_EOL; // and
echo (true || false).PHP_EOL; // or
echo (!true).PHP_EOL; // not

// INCREMENTO Y DECREMENTO
$contador = 1;
++$contador;
echo $contador.PHP_EOL;
$contador++;
echo $contador.PHP_EOL;
--$contador;
echo $contador.PHP_EOL;
$contador--;
echo $contador.PHP_EOL;

//EJEMPLO
$price = 100;
$qty = 3;
$stock = 5;
$coupon = "DEV10";

$canBuy = ($qty <= $stock) && ($qty > 0);
echo "Stock: $stock | Pedido: $qty\n";
echo "Se puede comprar?: ".($canBuy ? "SI" : "NO");
$subtotal = $price * $qty;
$hasDiscount = ($coupon == "DEV10") || ($qty > 5);
$discount = $hasDiscount ? $subtotal * 0.10 : 0;

$total = $subtotal - $discount;
echo "Orden #100";
echo "Stock final".($stock - $qty);
