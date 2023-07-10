@extends('template.plantillaadmin')

@section('contenido')
    <div class="contenedor-estudiantes">

        <div class="header-estudiantes">
            <h1>Estudiantes</h1>
            <form action="{{ route('estudiante.index') }}" method="GET" class="header-estudiantes__buscar">
                <h4>Buscar</h4>
                <input id="buscar" name="buscar" type="text">
                <input type="submit">
            </form>
        </div>

        <div id="estudiantes-contenedor" class="main-estudiantes"
            data-next-page="{{ $estudiantes->hasMorePages() ? $estudiantes->nextPageUrl() : '' }}">
            @include('admin.load')
        </div>
    </div>
@endsection

@section('jsEstudiante')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="{{ asset('js/estudiantes.js') }}"></script>
@endsection
