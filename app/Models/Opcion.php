<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opcion extends Model
{
  use HasFactory;
  public function preguntas()
  {
    return $this->belongsTo(Pregunta::class);
  }

  public function respuesta()
  {
    return $this->hasOne(Respuesta::class);
  }

  
  public function OpcionSelecionada()
  {
    return $this->hasOne(OpcionSelecionada::class);
  }

}
