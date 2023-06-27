<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;

    public function opcion()
    {
        return $this->belongsTo(Opcion::class);
    }

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class);
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }
}
