<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpcionSelecionada extends Model
{
    use HasFactory;
    public function testRealizado()
    {
        return $this->belongsTo(TestRealizado::class);
    }

    public function opcion()
    {
        return $this->belongsTo(Opcion::class);
    }
}
