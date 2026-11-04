<?php
declare(strict_types = 1);

$formData = [
    "name" => "Johand",
    "email" => "Jekser09@gmail.com",
    "password" => ""
];
$requiredFields = ['name','email','password'];
$missingFields = array_filter(
    $requiredFields,
    fn(string $field) => !array_key_exists($field,$formData) || trim((string)$formData[$field]) === ""
);
if(count($missingFields) > 0) echo "Faltan los siguiente campos: ".implode(", ",$missingFields).PHP_EOL;
else echo "El formulario esta completo\n";