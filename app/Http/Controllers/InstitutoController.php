<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Instituto;
use Exception;
use Illuminate\Http\Request;

class InstitutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $this->authorize('verInstitutos', App\Models\Instituto::class);
            $institutos = Instituto::all();
            return view('admin.institutos.index', compact('institutos'));
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
            $this->authorize('crearInstituto', App\Models\Instituto::class);
            $carreras = Carrera::all();

            return view('admin.institutos.agregar', compact('carreras'));
        } catch (Exception) {
            return redirect('@me');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $instituto = new Instituto();
        $instituto->nombre_instituto = $request->nombre;
        $instituto->save();

        foreach ($request->input('ids') as $idCarrera) {
            $instituto->carreras()->attach($idCarrera);
        }

        return redirect()->route('institutos.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Instituto $instituto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instituto $instituto)
    {

        $carrerasI = $instituto->carreras;
        $carreras = Carrera::whereDoesntHave('institutos', function ($query) use ($instituto) {
            $query->where('instituto_id', $instituto->id);
        })->get();

        return view('admin.institutos.editar', compact('carreras','carrerasI', 'instituto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instituto $instituto)
    {
        $instituto->nombre_instituto = $request->nombre;
        $instituto->save();

   
        $instituto->carreras()->sync($request->input('ids'));
  

        return redirect()->route('institutos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instituto $instituto)
    {
        $instituto->delete();
        return redirect()->route('institutos.index');
    }
}
