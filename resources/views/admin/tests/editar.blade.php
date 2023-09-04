@extends('template.plantillaadmin')
@section('tituloAdm', 'Editar')

@section('contenido')
    <form class="contenedor" action="{{ route('test.update', $test) }}" method="post">
        @csrf
        @method('PUT')



        <h1 class="agregar-titulo sombra">Editar Test</h1>

        <div class="contenedor-agregar">
            <div class="caja-input">
                <label for="">Nombre del test</label>
                <input class="input-agregar" type="text" name="nombre" value="{{ $test->nombreTest }}">
            </div>
        </div>

        @php
            $count = 1;
        @endphp
        <div id="contenedor-dinamico" class="contenedor-dinamico">
            @foreach ($preguntas as $unapregunta)
                <div class="contenedor-agregar">
                    @if ($count > 1)
                        <i class="fa-solid fa-trash fa-lg minus-dinamico" onclick="eliminar(this)"></i>
                    @endif

                    <div>
                        <label for="">Pregunta</label>
                        <input class="input-agregar" name="id[]" type="hidden" value={{ $unapregunta->id }}>
                        <input class="input-agregar" name="pregunta[]" type="text" value="{{ $unapregunta->pregunta }}">
                    </div>
                    @php
                        $count2 = 1;
                    @endphp
                    @foreach ($unapregunta->opciones as $unaopcion)
                        <div class="contenedor-respuesta">
                            @if ($count2 > 1)
                                <i class="fa-solid fa-circle-minus fa-lg minus-dinamico"
                                    onclick="eliminarRespuesta(this)"></i>
                            @endif
                            <label for="">Respuesta</label>
                            <input class="input-agregar" name="idRespuesta{{ $unapregunta->id }}[]" type="hidden"
                                value={{ $unaopcion->id }}>
                            <input class="input-agregar" name="respuesta{{ $unapregunta->id }}[]" type="text"
                                value="{{ $unaopcion->opcion }}">
                        </div>
                        @php
                            $count2++;
                        @endphp
                    @endforeach

                    <div class="contenedor-plus preguntas" onclick="agregarRespuesta(this)"
                        data-valor="{{ $unapregunta->id }}">
                        <i class="fa-solid fa-circle-plus fa-2xl"></i>
                    </div>
                </div>

                @php
                    $count++;
                @endphp
            @endforeach
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
    <script src="{{ asset('js/actualizarTest.js') }}"></script>
@endsection
