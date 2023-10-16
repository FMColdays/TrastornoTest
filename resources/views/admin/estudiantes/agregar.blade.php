@extends('template.plantillaadmin')
@section('tituloAdm', 'Agregar')

@section('cssEstudiabte')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('contenido')
    <form class="contenedor" action="{{ route('estudiantes.store') }}" method="post">
        @csrf
        <a class="btn volver" href="{{ route('@me') }}"><i class="fas fa-chevron-circle-left"></i> Volver</a>

        <h1 class="agregar-titulo sombra">Agregar Estudiante</h1>

        <div class="agregar-contenido sombra">
            <div class="contenido-cuerpo">

                <div class="caja-input">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" class="input-agregar" type="text" name="nombre" value={{ old('nombre') }}>
                    @error('nombre')
                        <div class="error-registro">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="caja-input">
                    <label for="numero">Numero de control</label>
                    <input id="numero" class="input-agregar" type="text" name="numeroControl"
                        value={{ old('numeroControl') }}>
                    @error('numeroControl')
                        <div class="error-registro">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="caja-input">
                    <label for="correo">Correo</label>
                    <input id="correo" class="input-agregar" type="text" name="correo" value={{ old('correo') }}>
                    @error('correo')
                        <div class="error-registro">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="caja-input">
                    <label for="contraseña">Contraseña</label>
                    <input id="contraseña" class="input-agregar" type="password" name="contraseña"
                        value={{ old('contraseña') }}>
                    @error('contraseña')
                        <div class="error-registro">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="caja-input" style="margin-bottom: 10px">
                    <label for="buscador" style="margin-bottom: 14px">Instituto</label>
                    <select class="input-agregar" id="buscador" name="instituto_id" style="width: 100%;">
                        @foreach ($institutos as $instituto)
                            <option value="{{ $instituto->id }}"
                                {{ old('instituto_id') == $instituto->id ? 'selected' : '' }}>
                                {{ $instituto->nombre_instituto }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="contenido-cuerpo">
                <div class="caja-input">
                    <label for="carrera">Carrera</label>
                    <select id="carrera" class="input-agregar" name="carrera_id" required>

                        @foreach ($datosTablaPivot as $carrera)
                            <option class="opcionesI" value="{{ $carrera->instituto_id }}"
                                data-instituto="{{ $carrera->instituto_id }}">
                                {{ $carrera->nombre_carrera }} → {{ $carrera->modalidad }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="caja-input">
                    <label for="semestre">Semestre</label>
                    <select id="semestre" class="input-agregar" name="semestre_id">
                        @foreach ($semestres as $semestre)
                            <option value="{{ $semestre->id }}"
                                {{ old('semestre_id') == $semestre->id ? 'selected' : '' }}>
                                {{ $semestre->numero_semestre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="caja-input">
                    <label for="edad">Edad</label>
                    <input id="edad" class="input-agregar" type="number" name="edad" min="1"
                        value={{ old('edad') }}>
                    @error('edad')
                        <div class="error-registro">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="caja-input">
                    <label for="sexo">Sexo</label>
                    <select id="sexo" class="input-agregar" name="sexo">
                        <option value="0" {{ old('sexo') == 0 ? 'selected' : '' }}>Hombre</option>
                        <option value="1" {{ old('sexo') == 1 ? 'selected' : '' }}>Mujer</option>
                    </select>
                </div>

            </div>
        </div>

        <div class="contendor-btn">
            <input class="btn-registro" type="submit" value="Registrar">
        </div>
    </form>
@endsection

@section('jsEstudiante')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/actualizarEstudiante.js') }}"></script>
@endsection
