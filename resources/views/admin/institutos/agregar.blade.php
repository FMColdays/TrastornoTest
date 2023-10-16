@extends('template.plantillaadmin')
@section('tituloAdm', 'Agregar')

@section('contenido')
    <form class="contenedor" method="POST" action="{{ route('institutos.store') }}">
        @csrf
        <a class="btn volver" href="{{ route('@me') }}"><i class="fas fa-chevron-circle-left"></i> Volver</a>

        <h1 class="agregar-titulo sombra">Agregar Instituto</h1>

        <div class="contenedor-agregar">
            <div class="caja-input">
                <label for="">Nombre del instituto</label>
                <input class="input-agregar" name="nombre" type="text" value={{ old('nombre') }}>
                @error('nombre')
                    <div class="error-registro">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="agregar-contenido sombra">
            <div class="contenido-cuerpo contenido-agregar-carrera">

                <div class="caja-input">
                    <label class="titulo-agregar-carrera">Agregar carreras</label>
                </div>

                <div id="agregar-carrera"></div>
            </div>

            <div class="contenido-cuerpo contenido-agregar-carrera" id="carreras-existentes">
                <div class="caja-input">
                    <label class="titulo-agregar-carrera">Carreras</label>
                </div>

                @foreach ($carreras as $carrera)
                    <div class="contenedor-modalidades">
                        <label class="modalidades" data-id="{{ $carrera->id }}"
                            data-carrera="{{ $carrera->nombre_carrera }}" data-modalidad="{{ $carrera->modalidad }}"
                            onclick="agregar(this)">{{ $carrera->nombre_carrera }} →
                            {{ $carrera->modalidad }}</label>
                    </div>
                @endforeach

            </div>
        </div>

        <div class="contendor-btn">
            <input class="btn-registro" type="submit" value="Registrar">
        </div>

    </form>
@endsection

@section('jsEstudiante')
    <script src="{{ asset('js/agregarCarrera.js') }}"></script>
@endsection
