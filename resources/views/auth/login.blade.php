@extends('template.plantilla')

@section('css')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" />
@endsection

@section('titulo', 'Login')

@section('cuerpo')
    @if (session('mensaje'))
        <div class="error-login">
            {{ session('mensaje') }}
        </div>
    @endif
    <main>
        <div class="contenedor-img">
            <p class="titulo-img">Test TecNM / ITTG</p>
            <picture>
                <source sizes="1920w" srcset=" {{ asset('img/avif/nombretec.avif') }} 1920w" type="image/avif">
                <source sizes="1920w" srcset="{{ asset('img/webp/nombretec.webp') }} 1920w" type="image/webp">
                <source sizes="1920w" srcset="{{ asset('img/jpg/nombretec.png') }} 1920w" type="image/jpeg">
                <img loading="lazy" decoding="async" src="{{ asset('img/jpg/nombretec.png') }}" lazyalt="imagen"
                    width="500" height="300">
            </picture>
        </div>

        <form class="contenedor-contenido" action="{{ route('validar') }}" method="POST">
            @csrf
            <h1 class="titulo-contenido">Iniciar sesión</h1>
    
            <div class="contenido">
                <div class="contenido-inputs">
                    <label for="correo">Correo</label>
                    <input class="input-correo" id="correo" type="text" name="correo" placeholder="Correo">
                </div>
                <div class="contenido-inputs">
                    <label for="contraseña">Contraseña</label>
                    <div class="contendor-contraseña">
                        <input class="input-contraseña" id="contraseña" type="password" name="contraseña"
                            placeholder="Contraseña">
                        <span id="ojo" class="fa-solid fa-eye"></span>
                    </div>
                </div>
            </div>
            <div class="contendor-inicio">
                <input class="iniciar" type="submit" value="Iniciar sesión">
                <a class="registro" href="{{ route('registro') }}">Registrarse</a>
            </div>
        </form>

    </main>
@endsection


@section('js')
    <script src="{{ asset('js/img.js') }}"></script>
    <script src="{{ asset('js/login.js') }}"></script>
@endsection
