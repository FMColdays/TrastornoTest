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
                     <p>{{$test->descripcion}}</p>
                </div>
               </a>
           @endforeach
        </div>
    </div>
@endsection
