<?php
declare(strict_types = 1);

//IF ESTANDAR
$age = 18;
if($age >= 18){
    echo "El usuario es mayor de edad\n";
}else{
    echo "El usuario es menor de edad\n";
}
// TERNARIA
echo "(Ternaria) El usuario es ".($age >= 18 ? "mayor de edad" : "menor de edad").PHP_EOL;

//IF MULTIPLE
$score = 49;
echo "Score: $score\n";
if($score >= 70){
    echo "Aprobado\n";
}else if($score >= 50 && $score < 70){
    echo "Puede mejorar\n";
}else{
    echo "Reprobado\n";
}

// SWITCH
$role = 'Editors';
echo "Rol del usuario: $role\n";
switch($role){
    case 'Editor':
        echo "Acceso completo\n";
        break;
    case 'Auditor':
        echo "Acceso a pruebas\n";
        break;
    case 'Usuario':
        echo "Acceso estandar\n";
        break;
    default:
        echo "Rol no definido\n";
        break;
}

//MATCH
echo "Por match moderno\n";
$returnValue = match($role){
    'Editor'=>"Acceso completo\n",
    'Auditor'=>"Acceso a pruebas\n",
    'usuario'=>"Acceso estandar\n",
    default=>"Rol no definido\n"
};
echo $returnValue;
