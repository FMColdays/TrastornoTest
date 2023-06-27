<!DOCTYPE html>
<html lang="es">

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
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" />
    <title>Login</title>
</head>

<body>

    <main class="main">
        @if (session('mensaje'))
            <div class="error-login">
                {{ session('mensaje') }}
            </div>
        @endif
        <section class="contenedor-login">
            <section class="contenedor-img">

                <h2 class="nombretec-titulo">Test TecNM / ITTG</h2>

                <picture>
                    <source sizes="1920w" srcset=" {{ asset('img/avif/nombretec.avif') }} 1920w" type="image/avif">
                    <source sizes="1920w" srcset="{{ asset('img/webp/nombretec.webp') }} 1920w" type="image/webp">
                    <source sizes="1920w" srcset="{{ asset('img/jpg/nombretec.png') }} 1920w" type="image/jpeg">
                    <img loading="lazy" decoding="async" src="{{ asset('img/jpg/nombretec.png') }}" lazyalt="imagen"
                        width="500" height="300">
                </picture>
            </section>

            <section class="contenedor-contenido">
                <form class="form-login" action="{{route('validar')}}" method="POST">
                    @csrf
                    <p class="form-login__titulo">Iniciar Sesión</>
                    <div class="form-login-input">
                        <span class="form-login__icono">
                            <i class="fa fa-user-circle"></i>
                        </span>
                        <input class="form-login__correo" type="email" name="correo" id="usuario"
                            placeholder="Coreo Institucional">
                    </div>
                    <div class="form-login-input">
                        <span class="form-login__icono">
                            <i class="fa fa-lock"></i>
                        </span>
                        <input class="form-login__contraseña" name="contraseña" id="contraseña" type="password"
                            placeholder="Contraseña">
                    </div>

                    <input class="btn-sesion" type="submit" value="Iniciar sesión">
                </form>
                <a class="a-registrarse" href="{{ route('registro') }}">Registrarse</a>
            </section>

        </section>
    </main>
    <script src="{{ asset('js/img.js') }}"></script>
</body>

</html>
