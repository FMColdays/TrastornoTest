@extends('template.plantillaadmin')
@section('tituloAdm', 'Agregar')

@section('contenido')
    <form class="contenedor" action="{{ route('test.store') }}" method="post">
        @csrf
        <a class="btn volver" href="{{ route('@me') }}"><i class="fas fa-chevron-circle-left"></i> Volver</a>

        <h1 class="agregar-titulo sombra">Agregar Test</h1>

        <div class="contenedor-agregar">
            <div class="caja-input">
                <label for="">Nombre del test</label>
                <input class="input-agregar" type="text" name="nombre">
            </div>
        </div>

        <div id="contenedor-dinamico" class="contenedor-dinamico">
            <div id="contenedor-preguntas" class="contenedor-agregar">
                <div>
                    <label for="">Pregunta</label>
                    <input class="input-agregar" name="pregunta[]" type="text">
                </div>

                <div class="contenedor-respuesta">
                    <label for="">Respuesta</label>
                    <input class="input-agregar" name="respuesta1[]" type="text">
                </div>

                <div class="contenedor-plus preguntas" onclick="agregarRespuesta(this)" data-valor="1">
                    <i class="fa-solid fa-circle-plus fa-2xl"></i>
                </div>
            </div>

        </div>

        <div id="agregar-input-pregunta" class="contenedor-plus">
            <i class="fa-solid fa-circle-plus fa-2xl"></i>
        </div>

        <div class="contendor-btn">
            <input class="btn-registro" type="submit" value="Registrar">
        </div>
    </form>
@endsection

@section('jsEstudiante')
    <script src="{{ asset('js/InputDinamico.js') }}"></script>
@endsection
