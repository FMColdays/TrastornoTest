<?php

namespace App\Policies;

use App\Models\Administrador;
use Illuminate\Foundation\Auth\User as Usuario;

class TestPolicy
{
    public function verTestAdmin(Usuario $usuario)
    {
        if ($usuario instanceof Administrador) return true;
        else return false;
    }
    
}
