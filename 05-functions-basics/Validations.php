<?php
declare(strict_types = 1);
function isValidEmail(string $email):bool{
    return filter_var($email,FILTER_VALIDATE_EMAIL) !== false;
}

function sanitizeUserId(string $user):int{
    return (int) filter_var($user,FILTER_SANITIZE_NUMBER_INT);
}

$email = "test@mail.com";
echo isValidEmail($email) ? "Email Valido\n" : "Email Invalido\n";

$userId = "AVDC: 45";
echo sanitizeUserId($userId) > 0 ? "ID de usuario valido":"ID de usuario invalido";
