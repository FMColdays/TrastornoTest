@extends('template.plantillaadmin')
@section('tituloAdm', 'Tests')

@section('contenido')
    <div class="contenedor-index">
        <header class="header-estudiantes">
            <h1>Tests</h1>
            <form action="{{ route('test.index') }}" method="GET" class="header-estudiantes__buscar">
                <input id="buscar" name="buscar" type="text" placeholder="Buscar" />
                <input type="submit" value="Buscar">
            </form>
        </header>
        <div id="tests-contenedor" class="main-test"
            data-next-page="{{ $tests->hasMorePages() ? $tests->nextPageUrl() : '' }}">
            @include('admin.tests.load')
        </div>
    </div>
@endsection

@section('jsEstudiante')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="{{ asset('js/cargarDatos.js') }}"></script>
@endsection
