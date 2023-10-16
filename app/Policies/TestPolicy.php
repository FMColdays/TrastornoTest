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

    public function crearTest(Usuario $usuario): bool
    {
        if ($usuario instanceof Administrador) return true;
        else return false;
    }

    public function editarTest(Usuario $usuario): bool
    {
        if ($usuario instanceof Administrador) return true;
        else return false;
    }

    public function eliminarTest(Usuario $usuario): bool
    {
        if ($usuario instanceof Administrador) return true;
        else return false;
    }
}
