<?php
declare(strict_types=1); //Habilitar el tipado estricto, gracias a inteliphense
// Comentario de una sola linea
# Otro comentario de una linea
/*
Comentarios de varias
lineas
*/

function println(string $message){ echo $message.PHP_EOL; }
// echo es la instruccion para salida por consola, con . concatenamos
println("Hola Mundo!");

class User {
    public string $name;
}
//con -> Accedemos a un atributo de una clase
$user = new User();
$user -> name = "Stev";
println($user->name); 
//echo $user -> name=1; 
