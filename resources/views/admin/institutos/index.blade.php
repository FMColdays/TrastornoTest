@extends('template.plantillaadmin')
@section('tituloAdm','Institutos')

@section('contenido')
    <div class="contenedor-index">
        <header class="header-estudiantes">
            <h1>Institutos</h1>
        </header>

        <div class="main-test">

           @foreach ($institutos as $instituto)
               <a href="{{route('institutos.edit', $instituto)}}">
                <div class="card-index sombra">
                     <h4>{{$instituto->nombre_instituto}}</h4>
                </div>
               </a>
           @endforeach
        </div>
    </div>
@endsection
