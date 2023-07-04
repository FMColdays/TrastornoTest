<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituto extends Model
{
    use HasFactory;


    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'instituto_id', 'id');
    }


    public function carreras()
    {
        return $this->hasMany(Carrera::class);
    }
}
