@extends('template.plantilla')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/resultado.css') }}" rel="stylesheet" />
@endsection

@section('titulo', 'resultado')

@section('cuerpo')

@section('color')
    style="background-color: pink "
@endsection
<div>
    <header class="header-preguntas" style="background-color:rgb(248, 153, 169)"></header>

    <main class="main-resultado">
        <a class="btnBack" href="{{route('@me')}}">Regresar al inicio</a>
    </main>

</div>

<footer class="footer">
    <p><span>Test</span> TecNM</p>
</footer>

@endsection
