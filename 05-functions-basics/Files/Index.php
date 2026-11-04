<?php
declare(strict_types = 1);
//echo __DIR__."/Helpers.php"; //__DIR__ contiene la ruta donde esta contenido el archivo que la llama
require __DIR__."/Helpers.php";

$formatedDate = formatDate("2026-11-03");
echo $formatedDate.PHP_EOL;

/*
include "Helpers.php";
echo "La aplicacion continua aunque falte el archivo.\n";
*/
/*
require "Helpers.php";
echo "La aplicacion se detiene si el archivo no esta";
*/
/*
include_once "Helpers.php"
require_once
echo "Estas instrucciones aseguran que se llame una sola vez el archivo";
*/