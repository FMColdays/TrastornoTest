<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Exception;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $this->authorize('verCarreras', App\Models\Carrera::class);
            $carreras = Carrera::all();
            return view('admin.carreras.index', compact('carreras'));
        } catch (Exception) {
            return redirect('@me');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {

            $this->authorize('crearCarrera', App\Models\Carrera::class);
            return view('admin.carreras.agregar');
        } catch (Exception) {
            return redirect('@me');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Carrera $carrera)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carrera $carrera)
    {
        return view('admin.carreras.editar');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carrera $carrera)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carrera $carrera)
    {
        //
    }
}
