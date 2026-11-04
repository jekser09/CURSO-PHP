<?php
declare(strict_types = 1);
/*
1. Si no ponés el header('Content-Type: application/json...'): 
  PHP por defecto manda Content-Type: text/html. Aunque el texto tenga llaves
  {"id": 1}, el navegador o fetch() / Postman lo van a tratar como texto plano o
  HTML en vez de parsearlo como JSON.
  2. ¿Por qué usamos la constante JSON_UNESCAPED_UNICODE en el 2do parámetro?:
  Por defecto, json_encode() convierte las tildes y la ñ en códigos escapados
  horribles (por ejemplo, " Canción " sale como "Canci\u00f3n"). Con     
  JSON_UNESCAPED_UNICODE respeta el UTF-8 limpio. (Y si querés que se vea     
  indentado prolijo mientras probás, podés combinarlo con JSON_UNESCAPED_UNICODE
  | JSON_PRETTY_PRINT).
*/
// $method = $_SERVER["REQUEST_METHOD"];
// http_response_code(200);
// echo "Metodo HTTP recibido: $method\n";
// echo "Servidor activo y respondiendo\n";

header('Content-Type: application/json; charset=utf-8');
http_response_code(200);
$response = [
    "status"=>"success",
    "message"=>"API Funcionando correctamente",
    "type"=>"memory"
];

$formatJson =
    JSON_UNESCAPED_UNICODE |
    JSON_PRETTY_PRINT |
    JSON_UNESCAPED_SLASHES |          
    JSON_THROW_ON_ERROR;
echo json_encode($response,$formatJson);

$inputFile = json_decode(file_get_contents('test.json'),true);
print_r($inputFile);
echo json_encode($inputFile,$formatJson);

