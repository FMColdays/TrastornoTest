<?php

namespace App\Http\Controllers;

use App\Models\Resultado;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function resultados()
    {
    
        $resultados = Resultado::all();
        return response()->json($resultados);
    }
}
