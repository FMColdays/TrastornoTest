@extends('template.plantillaadmin')
@section('tituloAdm', 'Agregar')

@section('contenido')
    <form class="contenedor" method="POST" action="{{ route('institutos.store') }}">
        @csrf
        <h1 class="agregar-titulo sombra">Agregar Instituto</h1>
        <div class="contenedor-agregar">
            <div class="caja-input">
                <label for="">Nombre del instituto</label>
                <input class="input-agregar" name="nombre" type="text">
            </div>
        </div>

        <div class="agregar-contenido sombra">
            <div class="contenido-cuerpo contenido-agregar-carrera">

                <div class="caja-input">
                    <label class="titulo-agregar-carrera">Agregar carreras</label>
                </div>

                <div id="agregar-carrera" class="caja-input">
                    
                </div>
            </div>

            <div class="contenido-cuerpo contenido-agregar-carrera">
                <div class="caja-input">
                    <label class="titulo-agregar-carrera">Carreras</label>
                </div>

                @php
                    $i = 0;
                    $j = 0;
                @endphp
                @foreach ($carreras as $carrera)
                    @php
                        $i++;
                        $j++;
                    @endphp

                    <div class="contenedor-modalidades">
                        <div class="contenedor-modalidades-etiquetas">
                            <label>{{ $carrera->nombre_carrera }}</label>
                            <div class="contenido-etiquetas">
                                <div class="etiquetas">
                                    <input id="modalidad{{ $carrera->id }}_{{ $i }}" type="checkbox"
                                        name="modalidad{{ $carrera->id }}" value="linea">

                                    <label for="modalidad{{ $carrera->id }}_{{ $i }}">Linea</label>
                                </div>

                                @php $i++; @endphp

                                <div class="etiquetas">
                                    <input id="modalidad{{ $carrera->id }}_{{ $i }}" type="checkbox"
                                        name="modalidad{{ $carrera->id }}" value="presencial">

                                    <label for="modalidad{{ $carrera->id }}_{{ $i }}">Presencial</label>
                                </div>
                            </div>
                        </div>
                        <div data-id="{{ $carrera->id }}" data-nombre="{{ $carrera->nombre_carrera }}"
                            class="contenedor-modalidades-aceptar">
                            <i class="fa-solid fa-check"></i>
                        </div>
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
