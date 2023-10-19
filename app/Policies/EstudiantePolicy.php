<?php

namespace App\Policies;

use App\Models\Administrador;
use Illuminate\Foundation\Auth\User as Usuario;

class EstudiantePolicy
{

    public function verEstudiantes(Usuario $usuario): bool
    {
        if ($usuario instanceof Administrador) return true;
        else return false;
    }


    public function crearEstudiante(Usuario $usuario): bool
    {
        if ($usuario instanceof Administrador) return true;
        else return false;
    }

    public function verTest(Usuario $usuario): bool
    {
        if ($usuario instanceof Administrador) return false;
        else return true;
    }


    public function editarEstudiante(Usuario $usuario): bool
    {
        if ($usuario instanceof Administrador) return true;
        else return false;
    }

    public function actualizarEstudiante(Usuario $usuario): bool
    {
        if ($usuario instanceof Administrador) return true;
        else return false;
    }
}
