<?php
declare(strict_types = 1);

$formData = [
    "name" => "Johand",
    "email" => "Jekser09@gmail.com",
    "password" => "123456"
];

function validateUserForm(array $data):array{
    $requiredFields = ["name","email","password"];
    return array_filter(
        $requiredFields,
        fn(string $field):bool => !isset($data[$field]) || trim((string)$data[$field]) === ""
    );
}

$errors = validateUserForm($formData);

if(count($errors) > 0) echo "Errores en el formulario: \n".implode(", ",$errors);
else echo "Formulario valido\n";