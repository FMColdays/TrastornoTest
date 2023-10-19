@extends('template.plantilla')

@section('css')
    <link href="{{ asset('css/inicio.css') }}" rel="stylesheet" />
@endsection

@section('titulo', 'Inicio')

@section('cuerpo')

    <header class="header">

        <div class="contenedor imagen-header">
            <picture>
                <source sizes="1920w" srcset=" {{ asset('img/avif/logotec.avif') }} 1920w" type="image/avif">
                <source sizes="1920w" srcset="{{ asset('img/webp/logotec.webp') }} 1920w" type="image/webp">
                <source sizes="1920w" srcset="{{ asset('img/jpg/logotec.png') }} 1920w" type="image/jpeg">
                <img loading="lazy" decoding="async" src="{{ asset('img/jpg/logotec.png') }}" lazyalt="imagen"
                    width="500" height="300">
            </picture>
        </div>



        <div class="contenedor-ancle">
            @if (auth()->user()->testRealizado()->count() == count($tests))
                <a href="javascript:generarPDF()"><i class="fa-solid fa-file-pdf fa-xl"></i></a>
                <div id="user-name" data-name="{{ auth()->user()->nombre }}"></div>
                <div id="user-certificado" data-certificado="{{ auth()->user()->id_certificado }}"></div>

                <div id="svg-container" style="display: none">
                    {{ QrCode::size(500)->generate('https://tecnmtest.com/estudiantes/' . auth()->user()->numeroControl . '/edit') }}
                </div>
            @endif
            <div class="contenedor-logout">
                <a class="logout-icono" href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket"></i></a>
                <a class="logout-text" href="{{ route('logout') }}">Cerrar sesion</a>
            </div>
        </div>
    </header>

    <main class="main-test">
        <div class="contenedor">
            <p class="contenedor__iniciaTest">Inicia un test</p>
            <div class="contenedor-test">
                @foreach ($tests as $test)
                    @php
                        $testRealizado = $testRealizados->where('test_id', $test->id)->first();
                    @endphp

                    @if (!$testRealizado)
                        <div>
                            <a href="{{ route('test.show', strtolower($test->nombreTest)) }}">
                                <div class="test">
                                    <img src="https://ssl.gstatic.com/docs/templates/thumbnails/1R2sTjfMFHee6VYVhuz8Tpi78mROlLWY4XgaKkJKMuis_400.png"
                                        alt="imagen-test">
                                </div>
                            </a>
                            <p class="nombre-test">Test {{ $test->nombreTest }}</p>
                        </div>
                    @else
                        <div>
                            <div class="test-null">
                                <i class="fa-solid fa-circle-check" style="color: #066a17;"></i>
                                <img class="imagen-realizado"
                                    src="https://ssl.gstatic.com/docs/templates/thumbnails/1R2sTjfMFHee6VYVhuz8Tpi78mROlLWY4XgaKkJKMuis_400.png"
                                    alt="imagen-test">
                            </div>
                            <p class="nombre-test">Test {{ $test->nombreTest }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </main>

    <section class="realizados">
        <div class="contenedor ">

            <p class="contenedor__realizadoTest">
                {{ count($testRealizados) == 0 ? 'No haz realizado ningun test' : 'Test Realizados' }}</p>

            <div class="contenedor-test-realizados ">
                @foreach ($testRealizados as $testRealizado)
                    <a href="{{ route('testRealizado.show', $testRealizado) }}">

                        <div class="test-realizados">
                            <img src="https://ssl.gstatic.com/docs/templates/thumbnails/1R2sTjfMFHee6VYVhuz8Tpi78mROlLWY4XgaKkJKMuis_400.png"
                                alt="imagen-test">
                            <div class="nombre-test">
                                {{ $testRealizado->test->nombreTest }}
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

        </div>
    </section>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/canvg/1.5/canvg.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script src="{{ asset('js/generarPDF.js') }}"></script>
@endsection
