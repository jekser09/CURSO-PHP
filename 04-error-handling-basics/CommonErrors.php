<?php
declare(strict_types = 1);

$formdata = [
    "name" => "Johand"
];

if(isset($formdata["email"])){
    echo "Email recibido: ".$formdata["email"].PHP_EOL;
}else{
    echo "El campo email es obligatorio\n";
}

function calculateTotal(float $price, int $qty):float{
    return $price * $qty;
}
$total = calculateTotal(100.3,2);
echo "Total a pagar es: $total\n";

function divide(int $a, int $b):float{
    if($b === 0){
        echo "Error: Division por cero no permitida\n";
        return 0;
    }
    return $a / $b;
}
$result = divide(10,0);
echo "Resultado de la devision es: $result\n";

$fruits = ["manzana","banana","naranja"];
if(isset($fruits[3])){
    echo $fruits[3].PHP_EOL;
}else{
    echo "Error: indice 3 no existe en el array\n";
}

function greet(string $name):string{
    if(func_num_args() > 1){
        echo "No puedes enviar mas de un argumento a esta funcion";
    }
    return "Hola, $name!\n";
}
echo greet("Johand","Test");