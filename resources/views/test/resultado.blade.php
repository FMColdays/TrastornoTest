@extends('template.plantilla')

@section('css')
    <link href="{{ asset('css/resultado.css') }}" rel="stylesheet" />
@endsection

@section('titulo', 'resultado')

@section('cuerpo')
    <div>
        <header class="contenedor header-resulado"></header>

        <main class="contenedor main-resultado">
            <div>
                <h2 class="titulo-resultado" class>Resultados del Test</h2>
            </div>
            <div class="contenedor-contenido">
                <h5>Test {{ $nombre }}</h5>
                <p class>Fecha: {{ date('d-m-Y') }} </p>
                <p>{{ $res }}</p>
                <a href="{{ route('@me') }}" class="btn-finalizar" type="submit">Finalizar</a>
            </div>
        </main>
    </div>

    <footer class="footer">
        <p><span>Test</span> TecNM</p>
    </footer>
@endsection
