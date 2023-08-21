@extends('template.plantillaadmin')
@section('tituloAdm','Carreras')

@section('contenido')
    <div class="contenedor-index">
        <header class="header-estudiantes">
            <h1>Carreras</h1>
        </header>

        <div class="main-test">

           @foreach ($carreras as $carrera)
               <a href="{{route('carreras.edit', $carrera)}}">
                <div class="card-index sombra">
                     <h4>{{$carrera->nombre_carrera}}</h4>
                </div>
               </a>
           @endforeach
        </div>
    </div>
@endsection
