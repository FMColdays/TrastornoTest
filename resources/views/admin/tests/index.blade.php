@extends('template.plantillaadmin')
@section('tituloAdm','Tests')

@section('contenido')
    <div class="contenedor-index">
        <header class="header-estudiantes">
            <h1>Tests</h1>
        </header>

        <div class="main-test">

           @foreach ($tests as $test)
               <a href="{{route('test.edit', $test)}}">
                <div class="card-index sombra">
                     <h4>{{$test->nombreTest}}</h4>
            
                     <form action="{{ route('test.destroy', $test) }}" method="post">
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
