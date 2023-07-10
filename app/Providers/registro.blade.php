@extends('template.plantilla')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}" />
@endsection

@section('titulo', 'Registrarse')

@section('cuerpo')
    <header class="header-registro"></header>

    <div class="contenedor-registro">
        <div class="contenedor contenido-preguntas">
            <form id="formulario" action="{{ route('registrarse') }}" method="post">
                @csrf
                <div class="pregunta">
                    <h1 class="titulo-registro">Registrarse</h1>
                </div>

                <div class="pregunta">
                    <label class="label-registro" for="numeroControl">Numero de control</label>
                    <input class="input-registro" id="numeroControl" type="text" name="numeroControl"
                        placeholder="Numero de control" value={{ old('numeroControl') }}>

                    @error('numeroControl')
                        <div class="error-registro">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="pregunta">
                    <label class="label-registro" for="correo">Correo institucional</label>
                    <input class="input-registro" id="correo" type="email" name="correo"
                        placeholder="Correo institucional" value={{ old('correo') }}>

                    @error('correo')
                        <div class="error-registro">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="pregunta">
                    <label class="label-registro" for="contraseña">Contraseña</label>
                    <input class="input-registro" id="contraseña" type="password" name="contraseña"
                        placeholder="Contraseña">

                    <ul class="requisitosPassword">
                        <li>Minimo 8 caracteres</li>
                        <li>Al menos una mayuscula</li>
                        <li>Al menos un numero</li>
                        <li>Sin caracteres especiales</li>
                    </ul>

                    @error('contraseña')
                        <div class="error-registro">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="pregunta">
                    <label class="label-registro" for="contraseña2">Confirmar contraseña</label>
                    <input class="input-registro" id="contraseña2" type="password" name="contraseña2"
                        placeholder="Repita su contraseña">

                    @error('contraseña2')
                        <div class="error-registro">
                            {{ $message }}
                        </div>
                    @enderror
                    <p class="errorE coincidencia">Las contraseñas no coinciden</p>
                </div>

                <div class="pregunta">
                    <label class="label-registro" for="instituto">Instituto</label>
                    <select id="buscador" class="section-registro" name="instituto_id">
                        @foreach ($institutos as $instituto)
                            <option value="{{ $instituto->id }}" {{ old('instituto_id') == $instituto->id ? 'selected' : '' }}>
                                {{ $instituto->nombre_instituto }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="pregunta">
                    <label class="label-registro" for="carrera">Carrera</label>
                    <select id="carrera" class="section-registro" name="carrera_id" required>
                        @foreach ($carreras as $carrera)
                            <option class="opcionesI" id="{{ $carrera->instituto_id }}" value="{{ $carrera->id }}"
                                {{ old('carrera_id') == $carrera->id ? 'selected' : '' }}>
                                {{ $carrera->nombre_carrera }}
                            </option>
                        @endforeach
                    </select>
                </div>
                


                <div class="pregunta">
                    <label class="label-registro" for="semestre">Semestre</label>
                    <select class="section-registro" name="semestre_id">
                        @foreach ($semestres as $semestre)
                            <option value="{{ $semestre->id }}" {{ old('semestre_id') == $semestre->id ? 'selected' : '' }}>
                                {{ $semestre->numero_semestre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                
                <div class="pregunta">
                    <label class="label-registro" for="edad">Edad</label>
                    <input class="input-registro" id="edad" type="text" name="edad" placeholder="Edad"
                        value={{ old('edad') }}>
                    @error('edad')
                        <div class="error-registro">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="pregunta">
                    <label class="label-registro" for="sexo">Sexo</label>
                    <select id="sexo" class="section-registro" name="sexo">
                        <option value="0" {{ old('sexo') == 0 ? 'selected' : '' }}>Hombre</option>
                        <option value="1" {{ old('sexo') == 1 ? 'selected' : '' }}>Mujer</option>
                    </select>
                </div>
                
                <input class="btnregistrar" id="btnregistrar" type="submit" value="Registrar">
            </form>
        </div>
    </div>

@endsection

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/img.js') }}"></script>
    <script src="{{ asset('js/registro.js') }}"></script>
@endsection
