<?php

namespace App\Policies;

use App\Models\Administrador;
use Illuminate\Foundation\Auth\User as Usuario;


class CarreraPolicy
{
    public function verCarreras(Usuario $usuario): bool
    {
        if ($usuario instanceof Administrador) return true;
        else return false;
    }

    public function crearCarrera(Usuario $usuario): bool
    {
        if ($usuario instanceof Administrador) return true;
        else return false;
    }
}
