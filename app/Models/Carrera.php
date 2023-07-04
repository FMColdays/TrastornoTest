<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
  use HasFactory;


  public function estudiante()
  {
    return $this->belongsTo(Estudiante::class, 'carrera_id', 'id');
  }


  public function instituto()
  {
    return $this->belongsTo(Instituto::class);
  }
}
