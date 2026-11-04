<?php
declare(strict_types = 1);
require_once __DIR__ . '/src/ProcessOrder.php';
/*
=============
🏆 Tarea procesar orden
=============
1. Incluir los archivos necesarios usando require_once.
    → Subtotal.php debe contener la lógica para calcular el subtotal.
    → Discount.php debe contener la lógica para aplicar descuentos.
    → Tax.php debe contener la lógica para calcular impuestos.

2. Crear una función llamada processOrder.
    → Debe recibir un array $cart con los productos de la orden.
    → Debe devolver un array con los resultados del proceso.

3. Calcular el subtotal de la orden.
    → Utilizar la función calculateSubtotal pasando el carrito completo.

4. Aplicar un descuento al subtotal.
    → Usar la función applyDiscount.
    → El descuento debe ser del 10%.

5. Calcular el total final con impuesto.
    → Usar la función calculateTotal.
    → El impuesto debe ser del 13%.

6. Retornar el resultado final como un array asociativo con las siguientes claves:
    → 'subtotal'    : monto total sin descuento ni impuesto.
    → 'discounted'  : monto luego de aplicar el descuento.
    → 'total'       : monto final con impuesto incluido.
*/

$cart = [
    ["name" => "Mouse", "price" => 100, "quantity" => 2],
    ["name" => "Teclado", "price" => 150, "quantity" => 1],
    ["name" => "Producto roto"] // sin price/quantity -> salta
];

$result = processOrder($cart);

echo "Subtotal: {$result['subtotal']}\n"; // 350
echo "Con descuento: {$result['discounted']}\n"; // 315
echo "Total final: {$result['total']}\n"; // 355.95