<?php
declare(strict_types = 1);
use App\Controllers\ProductController;

$method = $_SERVER["REQUEST_METHOD"] ?? 'GET';
$uriPath = parse_url($_SERVER["REQUEST_URI"] ?? "/",PHP_URL_PATH) ?? "/";
$segment = array_values(array_filter(explode("/",trim($uriPath,"/"))));

$resource = $segment[0] ?? null; #Ej: products
$id = isset($segment[1]) ? (int) $segment[1] : null; # Ej: 5 o null

$controller = new ProductController();

match(true){
    $method==="POST" && $resource==="products" && $id===null
        =>$controller->newProduct(),
    $method==="GET" && $resource==="products" && $id===null
        =>$controller->showProducts(),
    $method==="GET" && $resource==="products" && $id!==null
        =>$controller->showProduct($id),
    $method==="PUT" && $resource==="products" && $id===null
        =>$controller->updateProduct(),
    $method==="DELETE" && $resource==="products" && $id!==null
        =>$controller->deleteProduct($id),
    default => (function():void{
        jsonResponse(
            data:[],
            error:"Endpoint no encontrado",
            status:404
        );
    })()
};