<?php

namespace App\Policies;

use App\Models\Administrador;
use Illuminate\Foundation\Auth\User as Usuario;

class InstitutoPolicy
{
    public function verInstitutos(Usuario $usuario): bool
    {
        if($usuario instanceof Administrador) return true;
        else return false;
    }

    public function crearInstituto(Usuario $usuario): bool
    {
        if($usuario instanceof Administrador) return true;
        else return false;
    }

    public function editarInstituto(Usuario $usuario): bool
    {
        if($usuario instanceof Administrador) return true;
        else return false;
    }

    public function eliminarInstituto(Usuario $usuario): bool
    {
        if($usuario instanceof Administrador) return true;
        else return false;
    }
}
