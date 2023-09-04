@extends('template.plantillaadmin')
@section('tituloAdm', 'Agregar')

@section('contenido')
    <form class="contenedor" method="POST" action="{{ route('carreras.store') }}">
        @csrf
        <a class="btn volver" href="{{ route('@me') }}"><i class="fas fa-chevron-circle-left"></i> Volver</a>
        
        <h1 class="agregar-titulo sombra">Agregar Carrera</h1>

        <div class="agregar-contenido sombra">
            <div class="contenido-cuerpo">

                <div class="caja-input">
                    <label for="nombre">Nombre de la carrera cancion</label>
                    <input id="nombre" class="input-agregar" type="text" name="nombre">
                </div>

                <div class="caja-input">
                    <label class="titulo-modalidades">Modalidades</label>

                    <div class="contenedor-etiquetas-modalidades">
                        <div class="etiquetas-modalidades">
                            <input id="presencial" name="modalidad[]" type="checkbox" value="presencial">
                            <label for="presencial">Presencial</label>
                        </div>

                        <div class="etiquetas-modalidades">
                            <input id="linea" name="modalidad[]" type="checkbox" value="linea">
                            <label for="linea">Linea</label>
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
