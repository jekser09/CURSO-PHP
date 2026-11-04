<?php
$products = ["Laptop", "Mouse","teclado"];

// Agregar elemento
array_push($products, "monitor");
//Forma moderna
$products[] = "Diadema";
foreach($products as $product){
    echo "Producto: $product\n";
}

// Eliminar el ultimo elemento
array_pop($products);
foreach($products as $product){
    echo "Producto: $product\n";
}

$users = [
    [
        "name"=>"Johand",
        "age"=>28,
        "area"=>"Desarrollo"
    ],
    [
        "name"=>"Steven",
        "age"=>25,
        "area"=>"Infraestructura"
    ],
    [
        "name"=>"Diko",
        "age"=>29,
        "area"=>"Comunicacion"
    ],
    [
        "name"=>"Sergio",
        "age"=>29,
        "area"=>"Desarrollo"
    ],
    [
        "name"=>"Gian",
        "age"=>27,
        "area"=>"Comunicacion"
    ],
    [
        "name"=>"Camilo",
        "age"=>24,
        "area"=>"Infraestructura"
    ],
];

//Foreach
foreach($users as $user){
    $texto = <<<TXT
        Nombre: {$user["name"]}
        Edad: {$user["age"]}
        Area: {$user["area"]}
    \n
    TXT;
    echo $texto;
}
//array map
function printUsers(array $user){
    $texto = <<<TXT
        *** ARRAY_MAP ***
        Nombre: {$user["name"]}
        Edad: {$user["age"]}
        Area: {$user["area"]}
    \n
    TXT;
    echo $texto;
}
array_map('printUsers',$users);

$names = array_map(
    fn(array $user): string => $user['name'], // Funcion lambda
    $users
);
foreach($names as $name){
    echo "(lambda) Nombres: $name\n";
};

$areaUsers = array_filter($users,fn(array $user) => $user['area'] === 'Comunicacion'); // Al revez de map
array_map('printUsers',$areaUsers);

// reduce
$cart = [
    ["product"=>"laptop", "price"=>1200],
    ["product"=>"Mouse", "price"=>20],
    ["product"=>"Teclado", "price"=>80]
];

//funcion
$totalCart = array_reduce(
    $cart,
    function($total,$product){ 
        return $total + (float)$product["price"];
    },
    0
);
echo "(fn)El total del carrito es: $totalCart\n";
//lambda funcion
$totalCart = array_reduce(
    $cart,
    fn($total,$product): float => $total + (float)$product["price"],
    0
);
echo "(lambda)El total del carrito es: $totalCart\n";

$totalUsers = count($users);
echo "Total usuarios: $totalUsers\n";

### 1. Modificar (Acceso directo por índice o clave)
// Igual que en Python o JS, apuntás directo a la posición o clave:
  
$lenguajes = ['Python', 'Cobol', 'PHP'];
$lenguajes[1] = 'JavaScript'; // Modifica por índice
$lenguajes[] = 'TypeScript';
// Existe un valor?
$existe = in_array("Python",$lenguajes,true);
echo "Python en el array?: $existe\n";

$usuario = [
    'nombre' => 'Ana',
    'rol' => 'User'
];
$usuario['rol'] = 'Admin';    // Modifica o crea la clave
//Existe una clave?
$keyExist = array_key_exists('nombre',$usuario);
echo "Existe la llave rol?: $keyExist\n";
$index = array_search('rol',$usuario); // devuelve el indice o null
echo "Inidice de la llave 'rol': $index\n";

### 2. Eliminar (Y la trampa clásica de unset) 
// Según qué quieras borrar, tenés 3 herramientas:
//• Quitar el último o el primero (como en JS): 
array_pop($lenguajes);   // Saca y devuelve el último
array_shift($lenguajes); // Saca y devuelve el primero (y reindexa 0, 1...)
  
// • Borrar una posición o clave específica (unset): 
// Equivale a del lista[1] en Python.
unset($lenguajes[1]);
unset($usuario['rol']);
