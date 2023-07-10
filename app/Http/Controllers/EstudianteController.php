<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Http\Requests\StoreEstudianteRequest;
use App\Http\Requests\UpdateEstudianteRequest;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $this->authorize('verEstudiantes', App\Models\Estudiante::class);
            $buscar = trim($request->input('buscar'));

            if ($buscar == '') {
                $estudiantes = Estudiante::latest()->paginate(9);
            } else {
                $estudiantes = Estudiante::when($buscar, function ($query, $buscar) {
                    return $query->where(function ($query) use ($buscar) {
                        $query->where('numeroControl', $buscar)
                            ->orWhere('correo', $buscar)
                            ->orWhereHas('instituto', function ($query) use ($buscar) {
                                $query->where('nombre_instituto', 'LIKE', '%' . $buscar . '%');
                            })->orWhereHas('carrera', function ($query) use ($buscar) {
                                $query->where('nombre_carrera', 'LIKE', '%' . $buscar . '%');
                            })->orWhereHas('semestre', function ($query) use ($buscar) {
                                $query->where('numero_semestre', 'LIKE', '%' . $buscar . '%');
                            });
                    });
                })->latest()->paginate(PHP_INT_MAX);
            }

            if ($request->ajax()) {
                $view = view('admin.load', compact('estudiantes'))->render();
                return response()->json(['view' => $view, 'nextPageUrl' => $estudiantes->nextPageUrl()]);
            }



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
