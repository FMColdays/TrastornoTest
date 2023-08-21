<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Estudiante extends Authenticatable
{
    protected $fillable = ['nombre', 'numeroControl', 'correo', 'instituto_id', 'carrera_id', 'semestre_id', 'edad', 'sexo'];
    use HasApiTokens, HasFactory, Notifiable;


    public function instituto()
    {
        return $this->hasOne(Instituto::class, 'id', 'instituto_id');
    }


    public function carrera()
    {
        return $this->hasOne(Carrera::class, 'id', 'carrera_id');
    }

    public function semestre()
    {
        return $this->hasOne(Semestre::class, 'id', 'semestre_id');
    }

    public function respuesta()
    {
        return $this->hasOne(Respuesta::class);
    }

    public function testRealizado()
    {
        return $this->hasOne(testRealizado::class);
    }

    public function resultado()
    {
        return $this->hasOne(Resultado::class);
    }

    public function getRouteKeyName()
    {
        return 'numeroControl';
    }
}
