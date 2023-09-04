@extends('template.plantillaadmin')
@section('tituloAdm', 'Institutos')

@section('contenido')
    <div class="contenedor-index">
        <header class="header-estudiantes">
            <h1>Institutos</h1>
        </header>

        <div class="main-test">

            @foreach ($institutos as $instituto)
                <a href="{{ route('institutos.edit', $instituto) }}">
                    <div class="card-index sombra">
                        <h4>{{ $instituto->nombre_instituto }}</h4>

                        <form action="{{ route('institutos.destroy', $instituto->id) }}" method="post">
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
