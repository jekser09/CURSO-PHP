<?php
$name = "Johand";
$course = "PHP Moderno";
$message = "Concatenado: Bienvenido ".$name." al curso de ".$course;
echo $message.PHP_EOL;
$interpolatedMessage = "Interpolado: Bienvenido {$name} al curso de {$course}";
echo $interpolatedMessage.PHP_EOL;
$words = ['Bienvenido',$name,'al curso de',$course];
echo implode(" ",$words).PHP_EOL;
$calculatedMessage = "El resultado de la suma 5 + 3 es: ".(5 + 3);
echo $calculatedMessage.PHP_EOL;
echo "\"PHP MODERNO\"".PHP_EOL; //Escapar un caracter
// ### 2. Heredoc y Nowdoc (El equivalente real a """...""" para bloques grandes)
$nombre = "Johand";
$texto = <<<TXT
    Hola parcero "$nombre"
    que mas?
TXT;
echo $texto;