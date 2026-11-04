<?php
declare(strict_types = 1);

/*
Visiblidad para proteger datos sensibles
*/
class User{
    private int $id;
    public string $name;
    public string  $email;
    private string $password;

    //Constructor
    public function __construct(int $id,string $name, string $email, string $password){
        $this->id=$id;
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

    public function getId():int{
        return $this->id;
    }
}

$user = new User(
    id:145,
    name:"Johand",
    email:"Jekser09@gmail.com",
    password:"123456"
);

$user->showProfile();
echo "ID: {$user->getId()}\n";

echo $user->verifyPassword("123456")
    ? "Contraseña correcta\n"
    : "Contraseña incorrecta\n";
