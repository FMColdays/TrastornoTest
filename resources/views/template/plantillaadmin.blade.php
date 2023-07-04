@extends('template.plantilla')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/inicioAdmin.css') }}">
@endsection

@section('titulo', 'Inicio')

@section('id')
    id ="body"
@endsection
@section('cuerpo')
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

            <a href="{{ route('estudiante.index') }}" >
                <div class="option">
                    <i class="fa-solid fa-school"></i>
                    <h4>Instituto</h4>
                </div>
            </a>

            <a href="{{ route('estudiante.index') }}" >
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

@endsection

@section('js')
    <script src="{{ asset('js/inicioAdmin.js') }}"></script>
@endsection
