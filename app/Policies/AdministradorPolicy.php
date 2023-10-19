<?php

namespace App\Policies;

use App\Models\Administrador;
use Illuminate\Foundation\Auth\User as Usuario;

class AdministradorPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function verEstudiante(Usuario $usuario): bool
    {
        if($usuario instanceof Administrador) return true;
        else return false;
    }
   
}
