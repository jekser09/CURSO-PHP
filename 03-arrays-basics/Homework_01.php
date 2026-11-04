<?php
declare(strict_types = 1);
/*
=============
🏆 Tarea para funciones en arreglos para transformar y filtrar
=============
*/
// 1. Usar array_map para transformar una lista de usuarios.
//    → Cada elemento debe ser un array con las claves "id" y "label".
//    → "label" debe combinar el nombre y el rol con formato: "Nombre (rol)".

// 2. Mostrar la lista formateada por pantalla.
//    → Recorrer el array resultante e imprimir cada "label" precedido por un guion (-).
//    → Ejemplo de salida esperada:
//        - Ana (admin)
//        - Luis (user)
//        - María (editor)

// 3. Usar array_filter para filtrar productos disponibles.
//    → Incluir solo aquellos productos cuyo "stock" sea mayor a cero.

// 4. Mostrar los productos disponibles.
//    → Por cada producto disponible, imprimir su nombre y precio en el formato: "Nombre | Precio: valor".

$usersTask = [
    ["id" => 1, "name" => "Ana", "email" => "ana@email.com", "role" => "user"],
    ["id" => 2, "name" => "Luis", "email" => "luis@email.com", "role" => "admin"],
    ["id" => 3, "name" => "María", "email" => "maria@email.com", "role" => "editor"],
];

// 1 ok
$usersList = array_map(
    fn(array $user):array => ["id" => $user['id'], "label" => "{$user['name']} ({$user['role']})"],
    $usersTask
);
// 2 ok
foreach($usersList as $user){
    echo "- {$user['label']}\n";
}

$catalog = [
    ["sku" => "LP-001", "name" => "Laptop", "price" => 1200, "stock" => 3],
    ["sku" => "MS-002", "name" => "Mouse", "price" => 25, "stock" => 0],
    ["sku" => "KB-003", "name" => "Teclado", "price" => 80, "stock" => 12]
];
// 3 ok
$availableItems = array_filter(
    $catalog,
    fn(array $item):bool => $item['stock'] > 0
);
//4 ok
foreach($availableItems as $item){
    echo "{$item['name']} | Precio: {$item['price']}\n";
}

// ORDENAMIENTO Todas las funciones de ordenamiento modifican el array original
usort(
    $catalog,
    fn(array $a, array $b) => $a['price'] <=> $b['price']
);
foreach($catalog as $item){
    echo "-> {$item['name']} | Precio: {$item['price']}\n";
}

$skuList = array_column($catalog,"sku");
$requestedSku = "KB-003";
echo
    in_array($requestedSku,$skuList,true)
    ? "El producto ($requestedSku) esta disponible\n"
    : "El producto ($requestedSku) no esta disponible\n";