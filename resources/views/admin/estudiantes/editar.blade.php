@extends('template.plantillaadmin')

@section('cssEstudiabte')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('contenido')
    <form class="contenedor" action="{{ route('estudiantes.update', $estudiante) }}" method="post">
        @method('PUT')
        @csrf
        <h1 class="agregar-titulo sombra">Editar Estudiante</h1>



        <div class="agregar-contenido sombra">

            <div class="contenido-cuerpo">
                <div class="caja-input">
                    <label for="nombre">Nombre completo</label>
                    <input id="nombre" class="input-agregar" type="text" value="{{ $estudiante->nombre }}"
                        value="nombre" name="nombre" placeholder="Nombre completo">
                </div>
                <div class="caja-input">
                    <label for="numeroControl">Número de control</label>
                    <input id="numeroControl" class="input-agregar" type="text" value="{{ $estudiante->numeroControl }}"
                        value="numeroControl" name="numeroControl" placeholder="Número de control">
                </div>
                <div class="caja-input">
                    <label for="correo">Correo</label>
                    <input id="correo" class="input-agregar" type="text" value="{{ $estudiante->correo }}"
                        value="correo" name="correo" placeholder="Correo">
                </div>

                <div class="caja-input">
                    <label for="buscador" style="margin-bottom: 1rem">Instituto</label>

                    <select class="input-agregar" id="buscador" name="instituto_id">
                        @foreach ($institutos as $instituto)
                            @if ($instituto->id == $estudiante->instituto_id)
                                <option value="{{ $instituto->id }}" selected>
                                    {{ $instituto->nombre_instituto }}
                                </option>
                            @else
                                <option value="{{ $instituto->id }}">
                                    {{ $instituto->nombre_instituto }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="caja-input" style="margin-top: 10px">
                    <label>Confirmar estudiante</label>
                    <select class="input-agregar" id="buscador" name="confirmacion">
                        @if ($estudiante->confirmacion == 0)
                            <option value="0" selected>Desconfirmado</option>
                            <option value="1">Confirmado</option>
                        @else
                            <option value="0">Desconfirmado</option>
                            <option value="1" selected>Confirmado</option>
                        @endif
                    </select>


                </div>
            </div>

            <div class="contenido-cuerpo">
                <div class="caja-input">
                    <label for="carrera">Carrera</label>

                    <select id="carrera" class="input-agregar" name="carrera_id" required>

                        @foreach ($carreras as $carrera)
                            @if ($carrera->id == $estudiante->carrera_id)
                                <option value="{{ $estudiante->carrera_id }}" selected>
                                    {{ $estudiante->carrera->nombre_carrera }} →
                                    @php
                                        $relacion = DB::table('carrera_instituto')
                                            ->where('instituto_id', $carrera->institutos[0]->pivot->instituto_id)
                                            ->where('carrera_id', $carrera->id)
                                            ->first();
                                        echo $relacion->estado;
                                    @endphp
                                </option>
                            @else
                                <option class="opcionesI" id="{{ $carrera->institutos[0]->pivot->instituto_id }}"
                                    value="{{ $carrera->id }}" {{ old('carrera_id') == $carrera->id ? 'selected' : '' }}>
                                    {{ $carrera->nombre_carrera }} →
                                    @php
                                        $relacion = DB::table('carrera_instituto')
                                            ->where('instituto_id', $carrera->institutos[0]->pivot->instituto_id)
                                            ->where('carrera_id', $carrera->id)
                                            ->first();
                                        echo $relacion->estado;
                                    @endphp
                                </option>
                            @endif
                        @endforeach
                    </select>

                </div>
                <div class="caja-input">
                    <label for="semestre">Semestre</label>
                    <select id="semestre" class="input-agregar" name="semestre_id">
                        @foreach ($semestres as $semestre)
                            @if ($semestre->id == $estudiante->semestre_id)
                                <option value="{{ $semestre->id }}" selected>
                                    {{ $semestre->numero_semestre }}
                                </option>
                            @else
                                <option value="{{ $semestre->id }}">
                                    {{ $semestre->numero_semestre }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="caja-input">
                    <label for="edad">Edad</label>
                    <input id="edad" class="input-agregar" type="text" value="{{ $estudiante->edad }}"
                        value="edad" name="edad" placeholder="Edad">
                </div>

                <div class="caja-input">
                    <label for="sexo">Sexo</label>
                    <select id="sexo" class="input-agregar" name="sexo">
                        @if ($estudiante->sexo == 0)
                            <option value="0" selected>Hombre</option>
                            <option value="1">Mujer</option>
                        @else
                            <option value="1" selected>Mujer</option>
                            <option value="0">Hombre</option>
                        @endif
                    </select>
                </div>

                <div class="caja-input">
                    <label for="certificado">Número de certificado</label>
                    <input id="certificado" class="input-agregar" type="text" value="{{ $estudiante->id_certificado }}"
                        readonly disabled>
                </div>
            </div>
        </div>

        <div class="contendor-btn">
            <input class="btn-registro" type="submit" value="Editar">
        </div>
    </form>
@endsection

@section('jsEstudiante')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/actualizarEstudiante.js') }}"></script>
@endsection
