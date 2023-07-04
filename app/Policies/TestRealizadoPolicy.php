<?php

namespace App\Policies;

use App\Models\TestRealizado;
use Illuminate\Foundation\Auth\User as Usuario;

class TestRealizadoPolicy
{

    public function viewTest(Usuario $usuario, TestRealizado $testRealizado): bool
    {
        return false;
    }

    public function viewRealizado(Usuario $usuario, TestRealizado $testRealizado): bool
    {
        if ($usuario->id == $testRealizado->estudiante_id) {
            return true;
        } else {
            return false;
        }
    }

    public function permisoPDF(Usuario $usuario)
    {
        if ($usuario->testRealizado()->count() > 8) {
            return true;
        } else {
            return false;
        }
    }
}
