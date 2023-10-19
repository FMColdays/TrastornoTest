<?php

namespace App\Policies;

use App\Models\Administrador;
use App\Models\TestRealizado;
use App\Models\Test;
use Illuminate\Foundation\Auth\User as Usuario;

class TestRealizadoPolicy
{

    public function viewTest(Usuario $usuario, TestRealizado $testRealizado): bool
    {
        return false;
    }

    public function viewRealizado(Usuario $usuario, TestRealizado $testRealizado): bool
    {
        if($usuario instanceof Administrador) return false;
        if ($usuario->id == $testRealizado->estudiante_id) {
            return true;
        } else {
            return false;
        }
    }

    public function permisoPDF(Usuario $usuario)
    {
        if ($usuario->testRealizado()->count() == count(Test::all())) {
            return true;
        } else {
            return false;
        }
    }
}
