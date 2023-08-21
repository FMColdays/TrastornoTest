@extends('template.plantillaadmin')
@section('tituloAdm', 'Estudiantes')

@section('contenido')
    <div class="contenedor-index">

        <header class="header-estudiantes sombra">
            <h1>Estudiantes</h1>
            <form action="{{ route('estudiantes.index') }}" method="GET" class="header-estudiantes__buscar">
                <input id="buscar" name="buscar" type="text" placeholder="Buscar">
                <input type="submit" value="Buscar">
            </form>
        </header>

        <div id="estudiantes-contenedor" class="main-estudiantes"
            data-next-page="{{ $estudiantes->hasMorePages() ? $estudiantes->nextPageUrl() : '' }}">
            @include('admin.estudiantes.load')
        </div>
    </div>
@endsection

@section('jsEstudiante')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="{{ asset('js/estudiantes.js') }}"></script>
@endsection
