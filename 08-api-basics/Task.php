<?php
declare(strict_types = 1);
header("Content-Type: application/json");
$method = $_SERVER["REQUEST_METHOD"];

function validateTask(array $data):array{
    $errors = [];
    if(empty($data)){
        $errors[]="No ha enviando ningun tipo de informacion";
        return $errors;
    }
    if(empty($data['title'])){
        $errors[]="El titulo es obligatorio";
    }
    if(empty($data['description'])){
        $errors[]="La descripcion es obligatoria";
    }
    return $errors;
}

if($method === "GET"){
    $tasks = [
        ["id"=>1,"tittle"=>"Aprender PHP","completed"=>true],
        ["id"=>2,"tittle"=>"Aprender Laravel","completed"=>false],
    ];
    echo json_encode($tasks);
}else if($method === "POST"){
    $input = file_get_contents("php://input");
    $data = json_decode($input,true) ?? [];
    $errors = validateTask($data);
    if(count($errors) > 0){
        http_response_code(422);
        echo json_encode($errors);
        exit;
    }
    http_response_code(201);
    echo json_encode([
        "message"=>"Tarea creada satisfactoriamente",
        ...$data
    ]);
}
