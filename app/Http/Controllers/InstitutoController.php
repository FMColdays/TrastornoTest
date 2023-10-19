<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstitutoStoreRequest;
use App\Http\Requests\UpdateInstitutoRequest;
use App\Models\Carrera;
use App\Models\Instituto;
use Exception;
use Illuminate\Http\Request;

class InstitutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $this->authorize('verInstitutos', App\Models\Instituto::class);
            $buscar = trim($request->input('buscar'));

            if ($buscar == '') {
                $institutos = Instituto::latest()->paginate(6);
            } else {

                $institutos = Instituto::when($buscar, function ($query, $buscar) {
                    return $query->where(function ($query) use ($buscar) {
                        $query->where('nombre_instituto', 'LIKE', '%' . $buscar . '%');
                    });
                })->latest()->paginate(PHP_INT_MAX);
            }

            if ($request->ajax()) {
                $view = view('admin.institutos.load', compact('institutos'))->render();
                return response()->json(['view' => $view, 'nextPageUrl' => $institutos->nextPageUrl()]);
            }
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
    public function store(InstitutoStoreRequest $request)
    {
        try {
            $this->authorize('crearInstituto', App\Models\Instituto::class);
            $instituto = new Instituto();
            $instituto->nombre_instituto = $request->nombre;
            $instituto->save();

            $instituto->carreras()->attach($request->input('ids'));

            return redirect()->route('institutos.index');
        } catch (Exception) {
            return redirect('@me');
        }
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
        try {
            $this->authorize('editarInstituto', App\Models\Instituto::class);

            $carrerasI = $instituto->carreras;
            $carreras = Carrera::whereDoesntHave('institutos', function ($query) use ($instituto) {
                $query->where('instituto_id', $instituto->id);
            })->get();

            return view('admin.institutos.editar', compact('carreras', 'carrerasI', 'instituto'));
        } catch (Exception) {
            return redirect('@me');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInstitutoRequest $request, Instituto $instituto)
    {
        try {
            $this->authorize('editarInstituto', App\Models\Instituto::class);
            $instituto->nombre_instituto = $request->nombre;
            $instituto->save();


            $instituto->carreras()->sync($request->input('ids'));


            return redirect()->route('institutos.index');
        } catch (Exception) {
            return redirect('@me');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instituto $instituto)
    {
        try {
            $this->authorize('eliminarInstituto', App\Models\Instituto::class);
            $instituto->delete();

            return redirect()->route('institutos.index');
        } catch (Exception) {
            return redirect('@me');
        }
    }
}
