<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@100;400;700;900&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/3923/3923306.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/test.css') }}" rel="stylesheet" />
    <title>depresion</title>

</head>

<body style="background-color: white">
    <div>
        <header class="header-preguntas" style="background-color:gray"></header>

        <div class="contenedor-preguntas">
            <div class="contenedor contenido-preguntas">
                <div class="test-div-realizado">
                    @csrf

                    <div class="pregunta">
                        <h1 class="titulo-pregunta">Test de {{$nombre}}</h1>
                    </div>

                    @foreach ($preguntas as $unapregunta)
                        <div class="pregunta test-validar">

                            <label value="{{ $unapregunta->id }}">{{ $unapregunta->pregunta }}</label>

                            @foreach ($unapregunta->opciones as $unaopcion)
                                @php
                                    $opcionSeleccionada = $opciones->firstWhere('opcion_id', $unaopcion->id);
                                    $checked = $opcionSeleccionada ? 'checked' : '';
                                    $disabled = $opcionSeleccionada ? '' : 'disabled';
                                @endphp
                                <div>
                                    <label class="radio-contenedor">
            
                                    <input id="{{ $unaopcion->id }}" type="radio" name="{{ $unapregunta->id }}"
                                        value="{{ $unaopcion->id }}" {{ $checked }} {{ $disabled }}>
                                        <span class="radio-select">
                                            <i class="fa-solid fa-circle"></i>
                                        </span>
                                    </label>
                                    <label for="{{ $unaopcion->id }}">{{ $unaopcion->opcion }}</label>
                                </div>
                            @endforeach
                        </div>
                    @endforeach



                </div>

            </div>
        </div>
    </div>

    <footer class="footer">
        <p><span>Test</span> TecNM</p>
    </footer>
</body>

</html>
