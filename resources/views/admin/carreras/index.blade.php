@extends('template.plantillaadmin')
@section('tituloAdm', 'Carreras')

@section('contenido')
    <div class="contenedor-index">
        <header class="header-estudiantes">
            <h1>Carreras</h1>
            <form action="{{ route('carreras.index') }}" method="GET" class="header-estudiantes__buscar">
                <input id="buscar" name="buscar" type="text" placeholder="Buscar" />
                <input type="submit" value="Buscar">
            </form>
        </header>
        <div id="carreras-contenedor" class="main-test"
            data-next-page="{{ $carreras->hasMorePages() ? $carreras->nextPageUrl() : '' }}">
            @include('admin.carreras.load')
        </div>
    </div>
@endsection

@section('jsEstudiante')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="{{ asset('js/cargarDatos.js') }}"></script>
@endsection
