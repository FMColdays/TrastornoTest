<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
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
}
