@extends('template.plantillaadmin')
@section('tituloAdm','Agregar')

@section('contenido')
    <form class="contenedor">
        <h1 class="agregar-titulo sombra">Agregar Carrera</h1>

        <div class="agregar-contenido sombra">
            <div class="contenido-cuerpo">
                <div class="caja-input">
                    <label for="">Nombre de la carrera</label>
                    <input class="input-agregar" type="text">
                </div>
               
            </div>

            
        </div>

        <div class="contendor-btn">
            <input class="btn-registro" type="submit" value="Registrar">
        </div>
    </form>
@endsection
