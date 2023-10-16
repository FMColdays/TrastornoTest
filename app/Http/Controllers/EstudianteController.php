<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Http\Requests\StoreEstudianteRequest;
use App\Http\Requests\UpdateEstudianteRequest;
use App\Models\Carrera;
use App\Models\Instituto;
use App\Models\Semestre;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EstudianteController extends Controller
{
    public function index(Request $request)
    {
        try {
            $this->authorize('verEstudiantes', App\Models\Estudiante::class);
            $buscar = trim($request->input('buscar'));

            if ($buscar == '') {
                $estudiantes = Estudiante::latest()->paginate(10);
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
                $view = view('admin.estudiantes.load', compact('estudiantes'))->render();
                return response()->json(['view' => $view, 'nextPageUrl' => $estudiantes->nextPageUrl()]);
            }

            return view('admin.estudiantes.index', compact('estudiantes'));
        } catch (Exception) {
            return redirect('@me');
        }
    }


    public function create()
    {

        try {
            $this->authorize('crearEstudiante', App\Models\Estudiante::class);
            $datosTablaPivot = DB::table('carrera_instituto')
                ->join('institutos', 'carrera_instituto.instituto_id', '=', 'institutos.id')
                ->join('carreras', 'carrera_instituto.carrera_id', '=', 'carreras.id')
                ->select(
                    'institutos.nombre_instituto',
                    'carreras.nombre_carrera',
                    'carreras.modalidad',
                    'carrera_instituto.instituto_id',
                )->get();



            $institutos = Instituto::all();
            $semestres = Semestre::all();
            return view('admin.estudiantes.agregar', compact('institutos', 'datosTablaPivot', 'semestres'));
        } catch (Exception) {
            return redirect('@me');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEstudianteRequest $request)
    {

        try {
            $this->authorize('crearEstudiante', App\Models\Estudiante::class);
            $estudiante = new Estudiante();
            $estudiante->fill($request->all());
            $estudiante->contraseña = Hash::make($request->input('contraseña'));
            $estudiante->save();

            return redirect('estudiantes');
        } catch (Exception) {
            return redirect('@me');
        }
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
            $datosTablaPivot = DB::table('carrera_instituto')
                ->join('institutos', 'carrera_instituto.instituto_id', '=', 'institutos.id')
                ->join('carreras', 'carrera_instituto.carrera_id', '=', 'carreras.id')
                ->select(
                    'institutos.nombre_instituto',
                    'carreras.nombre_carrera',
                    'carreras.id',
                    'carreras.modalidad',
                    'carrera_instituto.instituto_id',
                )->get();

            $institutos = Instituto::all();
            $semestres = Semestre::all();
            return view('admin.estudiantes.editar', compact('estudiante', 'institutos', 'datosTablaPivot', 'semestres'));
        } catch (Exception) {
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
            $estudiante->fill($request->all());
            $estudiante->confirmacion =  $request->input('confirmacion');
            $estudiante->save();
            return redirect(route('estudiantes.index'));
        } catch (Exception) {
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
