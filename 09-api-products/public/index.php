<?php
declare(strict_types = 1);
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../src/Utils/ResponseHandler.php';
use App\Database\Database;
header("Content-Type: application/json; charset=utf-8");

try{
    Database::init();
    require_once __DIR__.'/../routes/Api.php';
}catch(InvalidArgumentException $e) {
    // Cualquier validación que falle en Product cae directo acá -> 400 Bad Request 
    jsonResponse(
        data:[],
        message:"Validacion datos",
        error:$e->getMessage(),
        status:400
    );
}catch(PDOException $e){
    // Cualquier fallo de SQLite cae directo acá -> 500
    jsonResponse(
        data:[],
        message:"DB",
        error:$e->getMessage(),
        status:500
    );
}catch(Throwable $e){
    // Cualquier otro error inesperado -> 500
    jsonResponse(
        data:[],
        error:$e->getMessage(),
        status:500
    );
}

