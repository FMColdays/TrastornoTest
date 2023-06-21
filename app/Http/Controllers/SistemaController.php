<?php

namespace App\Http\Controllers;

use App\Models\Instituto;
use Illuminate\Http\Request;

class SistemaController extends Controller
{
    public function registro(){
        $institutos = Instituto::all();
        return view('registro', compact('institutos'));
    }
}
