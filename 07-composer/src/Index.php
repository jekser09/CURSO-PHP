<?php
require_once __DIR__.'/../vendor/autoload.php';

use App\Models\User;
use App\Services\UserService;

/*
#Namespace
Los archivos no aíslan nombres. En cuanto un archivo se carga en memoria, sus     
clases quedan sueltas en una "bolsa global". Si tu código define class User
y una librería que instalaste con Composer también tiene class User, PHP explota con:
Fatal error: Cannot declare class User, because the name is already in use

Un namespace le pone un "apellido" jerárquico (o prefijo de carpeta virtual) a tus clases,
interfaces, traits y funciones usando la barra invertida \
*/

$quote = new \RandomQuotes\RandomQuotes();
$dayQuote = $quote->generate();
echo "({$dayQuote['quoteAuthor']}) \"{$dayQuote['quoteText']}\"\n";
echo "\n";

$user = new User();
$user->name="Johand";
$service = new UserService();
$service->register($user);
