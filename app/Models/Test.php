<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    public function preguntas()
    {
        return $this->hasMany(Pregunta::class);
    }

    public function respuesta()
    {
        return $this->hasOne(Respuesta::class);
    }

    public function testRealizado()
    {
        return $this->hasOne(testRealizado::class);
    }

    public function getRouteKeyName()
    {
        return 'nombreTest';
    }
}
