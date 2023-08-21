@extends('template.plantillaadmin')
@section('tituloAdm', 'Agregar')

@section('contenido')
    <form class="contenedor">
        <h1 class="agregar-titulo sombra">Agregar Test</h1>

        <div class="contenedor-agregar">
            <div class="caja-input">
                <label for="">Nombre del test</label>
                <input class="input-agregar" type="text">
            </div>
        </div>

        <div id="contenedor-dinamico" class="contenedor-dinamico">
            <div class="contenedor-agregar">
               
                <div class="caja-input">
                    <label for="">Pregunta</label>
                    <input class="input-agregar" type="text">
                </div>
            </div>
        </div>

        <div class="contenedor-plus">
            <i id="agregar-input" class="fa-solid fa-circle-plus fa-2xl"></i>
        </div>
        <div class="contendor-btn">
            <input class="btn-registro" type="submit" value="Registrar">
        </div>
    </form>
@endsection

@section('jsEstudiante')
    <script src="{{ asset('js/InputDinamico.js') }}"></script>
@endsection
