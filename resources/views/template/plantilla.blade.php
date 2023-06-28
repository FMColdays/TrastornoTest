<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/3923/3923306.png" />
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@100;400;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}" />
    @yield('css')
    <title>@yield('titulo')</title>
</head>

<body @yield('color')>

    @yield('cuerpo')
    @yield('js')

</body>

</html>
