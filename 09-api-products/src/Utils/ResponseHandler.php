<?php
declare(strict_types = 1);

function jsonResponse(
    array $data,
    string $message = "",
    string $error = "",
    int $status = 200
):void{
    $response = [
        'data'=>$data,
        'message'=>$message,
        'error'=>$error
    ];
    http_response_code($status);
    echo json_encode($response,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}