@extends('template.plantillaadmin')
@section('tituloAdm', 'Carreras')

@section('contenido')
    <div class="contenedor-index">
        <header class="header-estudiantes">
            <h1>Carreras</h1>
        </header>

        <div class="main-test">

            @foreach ($carreras as $carrera)
                <a href="{{ route('carreras.edit', $carrera) }}">
                    <div class="card-index sombra">
                        <h4>{{ $carrera->nombre_carrera . ' → ' . $carrera->modalidad }} </h4>

                        <form action="{{ route('carreras.destroy', $carrera->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <input id="eliminarI" class="eliminar-instituto" type="submit" value="Eliminar">
                        </form>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
