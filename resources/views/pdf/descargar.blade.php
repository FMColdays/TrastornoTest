<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ public_path('css/normalize.css') }}" rel="stylesheet" />
    <link href="{{ public_path('css/pdf.css') }}" rel="stylesheet" />
    <title>Certificado ACOM</title>
</head>

<body>

    @php
        
        $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        $nombre_mes = $meses[date('n')];
        $fecha = date('d') . '/' . $nombre_mes . '/' . date('Y');
        $fecha2 = $nombre_mes . ' ' . date('Y');
        
    @endphp

    <header>
        <div class="contenedor-header">
            <img src="{{ public_path() . '/img/jpg/EducacionLogo.png' }}" alt="">
        </div>

        <div class="contenedor-text">
            <div class="contenido-text">
                <p>Instituto Tecnológico de Tuxtla Gutiérrez</p>
                <p> Departamento de Gestión ecnológica y Vinculación</p>
                <p>Tuxtla Gutiérrez, Chiapas, {{ $fecha }} </p>
            </div>
        </div>
    </header>

    <section class="seccion-titulo">
        <p>CONSTANCIA DE ACREDITACIÓN DE ACTIVIDAD COMPLEMENTARIA</p>
    </section>

    <section class="seccion-presente">
        <p>LIC. CAROLINA GÓMEZ VELASCO</p>
        <p>JEFA DEL DEPARTAMENTO DE SERVICIOS ESCOLARES</p>
        <p>PRESENTE</p>
    </section>

    <main>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae tenetur ex voluptatem suscipit ea quo,
            eligendi soluta labore ad enim consequuntur non ullam dicta! Cupiditate cum necessitatibus aliquid fuga?
            Eum Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem mollitia fuga corporis delectus
            laudantium recusandae ipsam excepturi accusamus officiis temporibus, aperiam vitae aut deserunt animi fugit
            aliquid accusantium nobis beatae.</p>
            <p>Se extiende la presente en la ciudad de Tuxtla Gutierrez, Chiapas, a los 20 días del mes de {{$fecha2}}</p>
    </main>


</body>

</html>
