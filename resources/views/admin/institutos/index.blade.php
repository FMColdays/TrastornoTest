@extends('template.plantillaadmin')
@section('tituloAdm', 'Institutos')

@section('contenido')
    <div class="contenedor-index">
        <header class="header-estudiantes">
            <h1>Institutos</h1>
            <form action="{{ route('institutos.index') }}" method="GET" class="header-estudiantes__buscar">
                <input id="buscar" name="buscar" type="text" placeholder="Buscar" />
                <input type="submit" value="Buscar">
            </form>
        </header>
        <div id="instititutos-contenedor" class="main-test"
            data-next-page="{{ $institutos->hasMorePages() ? $institutos->nextPageUrl() : '' }}">
            @include('admin.institutos.load')
        </div>
    </div>
@endsection

@section('jsEstudiante')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="{{ asset('js/cargarDatos.js') }}"></script>
@endsection
