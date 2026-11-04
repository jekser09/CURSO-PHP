<?php
declare(strict_types = 1);

/*
Visiblidad para proteger datos sensibles
*/
class User{
    //Property hook (PHP 8.4+):Intercepta la asignacion como setter transparente
    public string $name{
        set(string $valor){
            if(trim($valor)==="") throw new InvalidArgumentException("El nombre no puede estar vacio");
            $this->name=trim($valor);
        }
    }
    public string  $email{
        set(string $valor){
            if(trim($valor)==="") throw new InvalidArgumentException("El email no puede estar vacio");
            $this->email=trim($valor);
        }
    }
    private string $password{
        set(string $valor){
            $aux = trim($valor);
            if($aux==="") throw new InvalidArgumentException("El password no puede estar vacio");
            if(strlen($aux)<8) throw new InvalidArgumentException("La longitud del password no puede ser inferior a 8 caracteres");
            $this->password=$aux;
        }
    }

    //Constructor
    public function __construct(
        public readonly int $id, // <- Reemplaza a private $id + getId() 
        string $name,
        string $email,
        string $password
    )
    {
        $this->name=$name;
        $this->email=$email;
        $this->password=$password;
    }

    public function showProfile():void{
        echo "\tNombre: {$this->name},\n\tEmail: {$this->email}\n";
    }

    public function verifyPassword(string $password):bool{
        return $this->password === $password;
    }
}

try{
    $user = new User(
        id:145,
        name:"Johand",
        email:"Jekser@",
        password:"123456"
    );
    $user->showProfile();
    echo "ID: {$user->id}\n";

    echo $user->verifyPassword("123456")
        ? "Contraseña correcta\n"
        : "Contraseña incorrecta\n";
}catch(InvalidArgumentException $e){
    echo "Error: {$e->getMessage()}\n";
}catch(Exception $e){
    echo "Error: {$e->getMessage()}\n";
}
