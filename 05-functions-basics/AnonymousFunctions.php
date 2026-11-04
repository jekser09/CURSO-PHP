<?php
declare(strict_types = 1);

$users = [
    ["name" => "Teddy", "role" => "admin", "age" => 28],
    ["name" => "Edgar", "role" => "user", "age" => 16],
    ["name" => "Devi", "role" => "editor", "age" => 22],
    ["name" => "Maria", "role" => "user", "age" => 35],
];

$formatPrice = function (float $price):string {
    return "Precio: ".number_format($price,2).PHP_EOL;
};

echo $formatPrice(2500);

$adultUsers = array_filter(
    $users,
    fn(array $user) => $user['age'] >= 18
);
foreach($adultUsers as $user){
    echo "- Nombre: ".$user["name"]."\n";
}

$allowedUser = 'editor';
$allowedUserWithRole = array_filter(
    $users,
    fn(array $user) => $user['role'] === $allowedUser
);
foreach($adultUsers as $user){
    echo "- Nombre: ".$user["name"]."\n";
}
