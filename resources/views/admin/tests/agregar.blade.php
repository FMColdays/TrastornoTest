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
                <input class="input-agregar" type="text" name="nombre" value={{ old('nombre') }}>
                @error('nombre')
                    <div class="error-registro">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="caja-input">
                <label for="">Descripción del test</label>
                <input class="input-agregar" type="text" name="descripcion" value={{ old('descripcion') }}>
                @error('descripcion')
                    <div class="error-registro">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="caja-input">
                <label for="">Evaluación del test</label>
                <div class="contenedor-pregunta-valor">
                    <div class="contenedor-respuesta">
                        <label class="respuesta-test-label" for="">Resultado bajo</label>
                        <input class="input-agregar" name="resultado1" type="text" value={{ old('resultado1') }}>
                        @error('resultado1')
                            <div class="error-registro">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="contenedor-valor">
                        <label class="respuesta-test-label" for="">Valor</label>
                        <input class="input-agregar" name="valorRes1" type="number" min="1"
                            value={{ old('valorRes1') }}>
                        @error('valorRes1')
                            <div class="error-registro">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="contenedor-pregunta-valor">
                    <div class="contenedor-respuesta">
                        <label class="respuesta-test-label" for="">Resultado leve</label>
                        <input class="input-agregar" name="resultado2" type="text" value={{ old('resultado2') }}>
                        @error('resultado2')
                            <div class="error-registro">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="contenedor-valor">
                        <label class="respuesta-test-label" for="">Valor</label>
                        <input class="input-agregar" name="valorRes2" type="number" min="1"
                            value={{ old('valorRes2') }}>
                        @error('valorRes2')
                            <div class="error-registro">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="contenedor-pregunta-valor">
                    <div class="contenedor-respuesta">
                        <label class="respuesta-test-label" for="">Resultado grave</label>
                        <input class="input-agregar" name="resultado3" type="text" value={{ old('resultado3') }}>
                        @error('resultado3')
                            <div class="error-registro">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="contenedor-valor">
                        <label class="respuesta-test-label" for="">Valor</label>
                        <input class="input-agregar" name="valorRes3" type="number" min="1"
                            value={{ old('valorRes3') }}>
                        @error('valorRes3')
                            <div class="error-registro">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>



        <div id="contenedor-dinamico" class="contenedor-dinamico">
            <div id="contenedor-preguntas" class="contenedor-agregar">
                <div>
                    <label class="pregunta-test-label" for="">Pregunta</label>
                    <input class="input-agregar" name="valores[]" type="hidden" value="1">
                    <input class="input-agregar" name="pregunta[]" type="text" value={{ old('pregunta[]') }}>
                </div>

                <div class="contenedor-respuesta">
                    <div class="contenedor-pregunta-valor">
                        <div class="contenedor-respuesta">
                            <label class="respuesta-test-label" for="">Respuesta</label>
                            <input class="input-agregar" name="respuesta1[]" type="text"
                                value={{ old('respuesta1[]') }}>

                        </div>
                        <div class="contenedor-valor">
                            <label class="respuesta-test-label" for="">Valor</label>
                            <input class="input-agregar" name="valorR1[]" type="number" min="1"
                                value={{ old('valorR1[]') }}>
                        </div>
                    </div>
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
