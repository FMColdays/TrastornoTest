<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Http\Requests\StoreEstudianteRequest;
use App\Http\Requests\UpdateEstudianteRequest;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $this->authorize('verEstudiantes', App\Models\Estudiante::class);
            $estudiantes = Estudiante::all();
            return view('admin.estudiantes', compact('estudiantes'));
        } catch (AuthorizationException) {
            return redirect('@me');
        } catch (ModelNotFoundException) {
            return redirect('@me');
        }
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEstudianteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudiante $estudiante)
    {
        try {
            $this->authorize('editarEstudiante', $estudiante);
            return view('admin.estudiante', compact('estudiante'));
        } catch (AuthorizationException) {
            return redirect('@me');
        } catch (ModelNotFoundException) {
            return redirect('@me');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEstudianteRequest $request, Estudiante $estudiante)
    {
        try {
            $this->authorize('actualizarEstudiante', $estudiante);

            $estudiante->confirmacion = $request->input('confirmacion');
            $estudiante->save();
            return redirect(route('estudiante.index'));
        } catch (AuthorizationException) {
            return redirect('@me');
        } catch (ModelNotFoundException) {
            return redirect('@me');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estudiante $estudiante)
    {
        //
    }
}
