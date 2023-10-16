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
                    <label for="nombre">Nombre de la carrera</label>
                    <input id="nombre" class="input-agregar" type="text" name="nombre" value={{ old('nombre') }}>
                    @error('nombre')
                        <div class="error-registro">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="caja-input">
                    <label class="titulo-modalidades">Modalidades</label>

                    <div class="contenedor-etiquetas-modalidades">
                        <div class="etiquetas-modalidades">
                            <input id="presencial" name="modalidad[]" type="checkbox" value="presencial"
                                {{ in_array('presencial', old('modalidad', [])) ? 'checked' : '' }}>
                            <label for="presencial">Presencial</label>
                        </div>

                        <div class="etiquetas-modalidades">
                            <input id="linea" name="modalidad[]" type="checkbox" value="linea"
                                {{ in_array('linea', old('modalidad', [])) ? 'checked' : '' }}>
                            <label for="linea">Línea</label>
                        </div>
                    </div>

                    @error('modalidad')
                        <div class="error-registro">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>
        </div>

        <div class="contendor-btn">
            <input class="btn-registro" type="submit" value="Registrar">
        </div>
    </form>
@endsection
