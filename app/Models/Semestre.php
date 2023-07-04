<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    use HasFactory;


    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'semestre_id', 'id');
    }

}
