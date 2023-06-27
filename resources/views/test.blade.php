<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/3923/3923306.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/test.css') }}" rel="stylesheet" />
    <title>depresion</title>

</head>

<body style="background-color: {{ $color }} ">
    <div>
        <header class="header-preguntas" style="background-color:{{ $color }}"></header>

        <div class="contenedor-preguntas">
            <div class="contenedor contenido-preguntas">
                <form id="test-form" action="{{ route('guardarTest') }}" method="POST">
                    @csrf
                    <input type="hidden" name="test_id" value="{{ encrypt($test->id) }}">
                    <input type="hidden" name="nombre" value="{{ encrypt($nombre) }}">

                    <div class="pregunta">
                        <h1 class="titulo-pregunta">Test de {{ $nombre }}</h1>

                        <p class="error-login">*Debe rellenar todos los campos</p>

                    </div>

                    @foreach ($preguntas as $unapregunta)
                        <div class="pregunta test-validar">

                            <label value="{{ $unapregunta->id }}">{{ $unapregunta->pregunta }}</label>


                            @foreach ($unapregunta->opciones as $unaopcion)
                                <div>
                                    <label class="radio-contenedor">
                                        <input id="{{ $unaopcion->id }}" type="radio"
                                            name="{{ $unapregunta->id }}"value="{{ $unaopcion->id }}">
                                            <span class="radio-select">
                                                <i class="fa-solid fa-circle"></i>
                                            </span>
                                    </label>
                                    <label for="{{ $unaopcion->id }}">{{ $unaopcion->opcion }}</label>
                                </div>
                            @endforeach
                        </div>
                    @endforeach

                    <input type="submit" value="Enviar">

                </form>

            </div>
        </div>
    </div>

    <footer class="footer">
        <p><span>Test</span> TecNM</p>
    </footer>

    <script src="{{ asset('js/test.js') }}"></script>
</body>

</html>
