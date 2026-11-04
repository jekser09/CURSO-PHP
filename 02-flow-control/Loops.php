<?php
declare(strict_types = 1);

echo "*** FOR ***\n";
for($i = 1;$i <=5; $i++){
    echo "Numero: $i\n";
}
echo PHP_EOL;

echo
"
Al igual que en otros lenguajes contamos con las palabras reservadas
continue y break para los bucles
continue para 'saltarnos' una iteracion
break para romper/detener/salir del bucle
\n";

echo "*** WHILE ***\n";
$attemps = 0;
while($attemps < 10){
    $attemps++;
    echo "Intento #: $attemps\n";
}
echo PHP_EOL;

echo "*** FOR EACH ***\n";
$names = ["Stev","Johand","Sergio"];
foreach($names as $name){
    echo "$name\n";
}
echo "Con indices\n";
foreach($names as $index => $name){
    echo "Posicion $index: $name\n";
}

/*
EN PHP BASICAMENTE TODO ES UN "OBJETO (JS) O DICCIONARIO (PYTHON) O MAP (JAVA) O ARRAY ASOCIATIVO (PHP)"
php = {
    "llave": valor,
    "llave": valor,
    "llave": valor,
    "llave": valor,
    "llave": valor
}
*/