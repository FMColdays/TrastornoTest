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
    
        foreach ($request->carrera as $carrera) {
            $modalidades[$carrera] = $request->input('modalidad' . $carrera);
        }
        
        foreach ($modalidades as $carrera => $modalidadArray) {
            foreach ($modalidadArray as $modalidad) {
                $instituto->carreras()->attach([$carrera => ['estado' => $modalidad]]);
            }
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
        return view('admin.institutos.editar');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instituto $instituto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instituto $instituto)
    {
        //
    }
}
