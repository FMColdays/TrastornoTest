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

        $this->authorize('crearCarrera', App\Models\Carrera::class);

        foreach ($request->modalidad as $modalidad) {
            $carrera = new Carrera();
            $carrera->nombre_carrera = $request->nombre;
            $carrera->modalidad = $modalidad;
            $carrera->save();
        }

        return redirect('carreras');
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
        return view('admin.carreras.editar', compact('carrera'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carrera $carrera)
    {
        $carrera->nombre_carrera = $request->nombre;
        $carrera->save();
        return redirect()->route('carreras.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carrera $carrera)
    {
        $carrera->delete();
        return redirect()->route('carreras.index');
    }
}
