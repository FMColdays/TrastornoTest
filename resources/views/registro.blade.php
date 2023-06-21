<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}" />
</head>

<body style="background-color: aliceblue;">
    <header class="header-registro"></header>

    <div class="contenedor-registro">
        <div class="contenedor contenido-preguntas">
            <form id="formulario" action="{% url 'registro' %}" method="post">

                <div class="pregunta">
                    <h1 class="titulo-registro">Registrarse</h1>
                </div>

                <div class="pregunta opciones">
                    <label for="correo">Correo institucional</label>
                    <input class="input-registro" id="correo" type="email" name="correo"
                        placeholder="Ingrese su correo institucional">
                </div>

                <div class="pregunta opciones">
                    <label for="contraseña2">Contraseña</label>
                    <input class="input-registro" id="contraseña1" type="password" name="contraseña1"
                        placeholder="Contraseña">

                    <ul class="requisitosPassword">
                        <li>Minimo 8 caracteres</li>
                        <li>Al menos una mayuscula</li>
                        <li>Al menos un numero</li>
                        <li>Sin caracteres especiales</li>
                    </ul>
                </div>

                <div class="pregunta opciones">
                    <label for="contraseña2">Confirmar contraseña</label>
                    <input class="input-registro" id="contraseña2" type="password" name="contraseña2"
                        placeholder="Repita su contraseña">

                    <p class="errorE coincidencia">Las contraseñas no coinciden</p>
                </div>

                <div class="pregunta opciones">
                    <label for="carrera">Carrera</label>
                    <select id="carrera" class="section-registro" name="carrera">
                    </select>
                </div>

                <div class="pregunta opciones">
                    <label for="edad">Edad</label>
                    <input class="input-registro" id="edad" type="number" name="edad"
                        placeholder="Ingrese su edad" min="0">
                </div>

                <div class="pregunta opciones">
                    <label for="instituto">Instituto</label>
                    <select id="buscador" class="section-registro" name="instituto">

                        @foreach ($institutos as $instituto)
                            <option>{{ $instituto->nombre_instituto }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="pregunta opciones">
                    <label for="sexo">Sexo</label>
                    <select id="sexo" class="section-registro" name="sexo">
                        <option value="0">Hombre</option>
                        <option value="1">Mujer</option>
                    </select>
                </div>

                <div class="pregunta opciones">
                    <label for="semestre">Semestre</label>
                    <select class="section-registro" name="semestre">
                        <option value="1">Primero</option>
                        <option value="2">Segundo</option>
                        <option value="3">Tercero</option>
                        <option value="4">Cuarto</option>
                        <option value="5">Quinto</option>
                        <option value="6">Sexto</option>
                        <option value="7">Septimo</option>
                        <option value="8">Octavo</option>
                        <option value="9">Noveno</option>
                        <option value="10">Decimo</option>
                    </select>
                </div>

                <input class="btnregistrar" id="btnregistrar" type="submit" value="Registrar">
            </form>
        </div>
    </div>



    <script>
        $('#buscador').select2();
    </script>


    <script src="{{ asset('js/registro.js') }}"></script>
</body>

</html>
