<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;


    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function opciones()
    {
        return $this->hasMany(Opcion::class);
    }

    public function respuesta()
    {
        return $this->hasOne(Respuesta::class);
    }
}
