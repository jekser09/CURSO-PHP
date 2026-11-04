<?php
declare(strict_types = 1);

namespace App\Services;
use App\Models\User;

class UserService{
    public function register(User $user):void{
        echo "Usuario {$user->name} registrado correctamente\n";
    }
}