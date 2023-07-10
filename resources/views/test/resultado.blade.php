@extends('template.plantilla')

@section('css')
    <link href="{{ asset('css/resultado.css') }}" rel="stylesheet" />
@endsection

@section('titulo', 'resultado')

@section('cuerpo')


    <div>

        <header class="contenedor header-resulado">

        </header>

        <main class="contenedor main-resultado">
            <div class="text-center">
                <h2 class="fw-bold mb-2 text-uppercase">Resultados del Test</h2>
            </div>
            <div class="d-grid gap-2">
                <h5 style="text-align: center">Diagnostico de </h5>
                <div style="display: flex; flex-direction: column; justify-content:space-around; align-items:center"
                    action="{% url 'inicio' %}" method="post">

                    <pre class="">Fecha: {{date('d-m-Y'); }} </pre>
                    <pre>{{$res}}</pre>
                    <a href="{{route('@me')}}" class="btn-finalizar" type="submit">Finalizar</a>
                
                </div>
            </div>
        </main>

    </div>

    <footer class="footer">
        <p><span>Test</span> TecNM</p>
    </footer>

@endsection
