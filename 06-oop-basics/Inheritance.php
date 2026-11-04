<?php
declare(strict_types = 1);

class BaseUser{
    protected string $name;

    public function __construct(string $name){
        $this->name=$name;
    }

    protected function logAccess():void{
        echo "Acceso registrado para el nombre: {$this->name}\n";
    }
}

class AdminUser extends BaseUser{
    public function showRole():void{
        echo "El usuario {$this->name} es administrador\n";
    }
    public function dashboard():void{
        $this->logAccess();
        echo "Accede al panel de administracion\n";
    }
}

$admin = new AdminUser(
    name:"Johand"
);

$admin->dashboard();
$admin->showRole();