<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&family=Montserrat:wght@400;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/inicioAdmin.css') }}">
    <title>Inicio</title>
</head>

<body id="body">
    <header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
        </div>
        <div class="logo__menu">
            <img src="{{ asset('img/jpg/nombretec.png') }}" alt="nombretec">
        </div>
    </header>

    <div class="menu__side" id="menu_side">


        <div class="options__menu">

            <a href="{{ url('/') }}" class="{{ Request::path() == '@me' ? 'selected' : '' }}">
                <div class="option">
                    <i class="fas fa-home"></i>
                    <h4>Inicio</h4>
                </div>
            </a>

            <a href="{{ route('estudiante.index') }}" class="{{ Request::path() == 'estudiante' ? 'selected' : '' }}">
                <div class="option">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <h4>Estudiantes</h4>
                </div>
            </a>

            <a href="{{ route('estudiante.index') }}">
                <div class="option">
                    <i class="fa-solid fa-school"></i>
                    <h4>Instituto</h4>
                </div>
            </a>

            <a href="{{ route('estudiante.index') }}">
                <div class="option">
                    <i class="fa-solid fa-suitcase"></i>
                    <h4>Carrera</h4>
                </div>
            </a>

            <a href="{{ route('test.index') }}" class="{{ Request::path() == 'test' ? 'selected' : '' }}">
                <div class="option">
                    <i class="fa-solid fa-book"></i>
                    <h4>Tests</h4>
                </div>
            </a>

            <a href="{{ route('logout') }}">
                <div class="option">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <h4>Cerrar sesion</h4>
                </div>
            </a>

        </div>


    </div>

    <main>
        @yield('contenido')
    </main>
    @yield('jsEstudiante')
    <script src="{{ asset('js/inicioAdmin.js') }}"></script>
</body>

</html>
