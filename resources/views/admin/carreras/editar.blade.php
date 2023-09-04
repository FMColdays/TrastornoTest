@extends('template.plantillaadmin')
@section('tituloAdm', 'Agregar')

@section('contenido')
    <form class="contenedor" method="POST" action="{{ route('carreras.update', $carrera->id) }}">
        @csrf
        @method('PUT')
        <a class="btn volver" href="{{ route('@me') }}"><i class="fas fa-chevron-circle-left"></i> Volver</a>

        <h1 class="agregar-titulo sombra">Agregar Carrera</h1>

        <div class="agregar-contenido sombra">
            <div class="contenido-cuerpo">

                <div class="caja-input">
                    <label for="nombre">Nombre de la carrera cancion</label>
                    <input id="nombre" class="input-agregar" type="text" name="nombre"
                        value="{{ $carrera->nombre_carrera }}">
                </div>

                <div class="caja-input">
                    <label class="titulo-modalidades">Modalidad</label>

                    <div class="contenedor-etiquetas-modalidades">
                        <div class="etiquetas-modalidades vista">
                            <label for="presencial">{{ $carrera->modalidad }}</label>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="contendor-btn">
            <input class="btn-registro" type="submit" value="Registrar">
        </div>
    </form>
@endsection
