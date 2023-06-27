<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Estudiante extends Authenticatable
{
    protected $fillable = ['numeroControl', 'correo', 'instituto', 'carrera', 'semestre', 'edad', 'sexo'];
    use HasFactory;

    public function respuesta()
    {
        return $this->hasOne(Respuesta::class);
    }


    public function testRealizado()
    {
        return $this->hasOne(testRealizado::class);
    }
}
