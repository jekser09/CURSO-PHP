<?php
declare(strict_types=1);
$name = 'Devi'; // Todas las variables inician con $
echo "Nombre: $name".PHP_EOL; // Asi podemos inscrustar un variable en un string
$city = 'Madrid';
echo 'Ciudad: $city'.PHP_EOL; // Las comillas simples no lo permiten
$age = 25;
echo "Edad: $age".PHP_EOL;
$height = 1.75;
echo "Altura: $height".PHP_EOL;
$isAvailable = false;
echo "Disponible?: $isAvailable".PHP_EOL;
$empty = null;
echo "Valor nulo: ".var_export($empty,true).PHP_EOL;
//LISTA DE VALORES
$colors = array("Rojo","Amarrillo","Verde");
echo "Colores: ".implode(", ",$colors).PHP_EOL;
$fruits = ["manzana","platano","pera"];
echo "Frutas: ".implode(", ",$fruits).PHP_EOL;
//Array asociativo (diccionario, objeto, (llave,valor))
$person = [
    'name'=>'Johand',
    'age'=>28,
    'email'=>'Jekser09@gmail.com'
];
echo "Persona: nombre => {$person['name']}".PHP_EOL;
const API_URL = "https://api.example.com";
echo "URL: ".API_URL.PHP_EOL; // Al concatenar una constante debemos hacerlo asi
echo "Tipo de dato de edad: ".gettype($age).PHP_EOL;