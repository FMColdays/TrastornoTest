@extends('template.plantillaadmin')
@section('tituloAdm', 'Agregar')

@section('contenido')
    <form class="contenedor" method="POST" action="{{ route('institutos.update', $instituto->id) }}">
        @csrf
        @method('PUT')

        <a class="btn volver" href="{{ route('institutos.index') }}"><i class="fas fa-chevron-circle-left"></i> Volver</a>
        
        < <h1 class="agregar-titulo sombra">Agregar Instituto</h1>

            <div class="contenedor-agregar">
                <div class="caja-input">
                    <label for="">Nombre del instituto</label>
                    <input class="input-agregar" name="nombre" type="text" value="{{ $instituto->nombre_instituto }}">
                </div>
            </div>

            <div class="agregar-contenido sombra">
                <div class="contenido-cuerpo contenido-agregar-carrera">

                    <div class="caja-input">
                        <label class="titulo-agregar-carrera">Agregar carreras</label>
                    </div>

                    <div id="agregar-carrera">
                        @foreach ($carrerasI as $carrera)
                            <div>
                                <div class="carrera-agregada" onclick="eliminar(this)"
                                    data-carreraid="{{ $carrera->id }}}}" data-carreran="{{ $carrera->nombre_carrera }}"
                                    data-carreram="{{ $carrera->modalidad }}">
                                    <input type="hidden" name="ids[]" value="{{ $carrera->id }}">
                                    <input type="hidden" name="carreras[]" value="{{ $carrera->nombre_carrera }}">
                                    <input type="hidden" name="modalidades[]" value="{{ $carrera->modalidad }}">
                                    <span>{{ $carrera->nombre_carrera . ' → ' . $carrera->modalidad }}</span>
                                </div>
                            </div>
                        @endforeach

                    </div>
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
