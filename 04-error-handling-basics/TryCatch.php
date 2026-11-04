<?php
declare(strict_types = 1);
function getPriceWithTaxes(float $price):float{
    if($price < 0) throw new Exception("El precio no puede ser negativo");
    return $price * 1.10;
}
try{
    $finalPrice = getPriceWithTaxes(-100);
    echo "Precio final con impuesto: $finalPrice\n";
}catch(Exception $exception){
    echo "Error: ".$exception->getMessage();
}
