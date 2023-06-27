<?php

namespace App\Policies;

use App\Models\TestRealizado;
use Illuminate\Foundation\Auth\User as Usuario;

class TestRealizadoPolicy
{

    public function view(Usuario $usuario, TestRealizado $testRealizado): bool
    {
        if ($usuario->id == $testRealizado->estudiante_id) {
            return true;
        } else {
            return false;
        }
    }

}
