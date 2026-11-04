<?php
declare(strict_types = 1);

//================================
if(true){
    $message = "Hola desde el if";
}
echo $message.PHP_EOL;

foreach([1,2,3] as $number){
    $lastNumber = $number;
}

echo "Ultimo numero: $lastNumber\n";
//================================
// MALA PRACTICA
$total = 100;
function showTotalWithGlobal():void{ 
    global $total;
    echo "Total usando una variable global: $total\n";
}
showTotalWithGlobal();

function showTotal(float $total):void{
    echo "Total usando atributos: $total\n";
}
showTotal($total);
//================================
echo "----FUNCIONES----\n";
$tax = 0.13;
$calculateTax = function(float $amount) use($tax):float{
    return $amount * $tax;
};
echo "Impuesto (closure): ".$calculateTax(100).PHP_EOL;
$calculateTaxArrow = fn(float $amount):float => $amount * $tax;
echo "Impuesto (arrow): ".$calculateTaxArrow(100).PHP_EOL;
