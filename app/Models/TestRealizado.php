<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestRealizado extends Model
{
    use HasFactory;


    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function opcionesSeleccionadas()
    {
        return $this->hasMany(OpcionSelecionada::class);
    }

    public function getRouteKeyName()
    {
        return 'nombre';
    }
}
