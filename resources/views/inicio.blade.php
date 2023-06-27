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
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/inicio.css') }}" rel="stylesheet" />
    <title>Inicio</title>
</head>

<body>
    <header class="header">
        <div class="contenedor imagen-header">
            <picture>
                <source sizes="1920w" srcset=" {{ asset('img/avif/logotec.avif') }} 1920w" type="image/avif">
                <source sizes="1920w" srcset="{{ asset('img/webp/logotec.webp') }} 1920w" type="image/webp">
                <source sizes="1920w" srcset="{{ asset('img/jpg/logotec.png') }} 1920w" type="image/jpeg">
                <img loading="lazy" decoding="async" src="{{ asset('img/jpg/logotec.png') }}" lazyalt="imagen"
                    width="500" height="300">
            </picture>

            <p>TestTecNM</p>
        </div>
        <a href="{{ route('logout') }}">Cerrar sesion</a>
    </header>

    <main class="main-test">
        <div class="contenedor">
            <p class="contenedor__iniciaTest">Inicia un test</p>
            <div class="contenedor-test">

                @foreach ($tests as $test)
                    <div>
                        <a href="{{ route($test->nombreTest) }}">
                            <div class="test">
                                <img src="https://ssl.gstatic.com/docs/templates/thumbnails/1R2sTjfMFHee6VYVhuz8Tpi78mROlLWY4XgaKkJKMuis_400.png"
                                    alt>
                            </div>
                        </a>
                        <p>Test {{ $test->nombreTest }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    <section class="realizados">
        <div class="contenedor ">
            <p>Test realizados</p>
            <div class="contenedor-test-realizados ">
                @foreach ($testRealizados as $testRealizado)
                    <a
                        href="{{ route('testRealizado',$testRealizado) }}">

                        <div class="test-realizados">
                            <img src="https://lh3.googleusercontent.com/fife/APg5EOZtoWXup3j4swh4cXBPqCzCT4pg7Wf9cF7RmBiz7VbGlcwnPkDxXzA_SQxLtg_O0CwBW4O7NXGD8iPDBCATb5phneZZ48oc922juRO7q3Lp1SLa5EhyFWIdTepM_3DFig_quz0uiobcYDsnNpqE3yAwHTCMe06ee1PQvtm6c5qvICy0OIh2H7e31th7hCTKa-jyNr0kO8TqRmEJkkhFVQZ_z2LzfQjR1-OD7q2ZRKt_Fi0pQuyGQcDlM90vSsBpH_nVliYIqLvknCNlSWqfWmC7qKZJDrX5U62A735uxPC7GxmRJsAGEaHQZW27VfjmIhnrLrzt5SYEMBgJdJl7s0_0D0jJKqZtL_ZO1nvyBpVp4_Hez59o3pWxmJ-GZGM_O6xrBCISq4NSoOJnD4UecU8QENcCuAMA38lOOKTw3P-fwFG_akXRPtp0F78e_VnneUviBKZO5Xdc3_UtPan-0Ed-3CdKAIkwiCmeAJyKuX5slaJZ_Zl2xyfjzltcPbffNP6X00Js5fTHSFypzGV17NS5SM7YsLs4WKnHYjSZAWGaKV8CccjbZ34hxa9YrVmgDbfZ3obnXz2HSW2FxGi-OyfRaBvlwAU6SDrS1SRDeQyrZZjpZFF2f20JujYA3TyaqRAVogOTNsXQrSEogYSwet-RLroeuDiojnjnWWpIPeWdthCXm15FQok9n8Fks6WDvS-2-pnXxSPlYEU0ThM5NGFeu24qyKuBGE1dLEajseEfW8ACTw5f4QvHhANOKWZeQ7BF_Ni0KFaWNyRVb4o2yEhW1EttE4GVsX3Trut-6Ul2FEjRmWkZUXtmBXin9ddXHBOJjM6LpIZ71VafXN6gWxOh_r-CvxDz-1ade7PstjeErFnIsABnNFRgA6IFxrf4N-EX-13wyp9YxFIsDC4FBpygVpddp2XR4dyYYbN29dcfA22XUFmD_LFBnsaClctxsR7j9WFY7sbu0Lg5SZG4PVyjLKOt94BzmdMFhqBvshfg53OkSK9p4WP2GZfsl1MCl_IEhpkKd364fE_98A3R6T61CzFCm96Ixsy6JniMeuMxNxRzEpXmPCjajboYDoEw4fqv5rzUznDmrs2rSp59G7e51vgmI_zTy60-lAK-HBkpEVmuLaSVEAK6fObIN4vKtIOqM02mDNQgxPZUjsiBm6SZZSPJPv3RHyUoJRb6XGVHOpEPM1hyXuO0zbDAwxmcDKOZPPssl2DpA23YkIPFh6GfdJIbUUGgPju8GtunS42oSVEOm4-1e6xRw7-9wf6kFtbfPQ6ynNzuKEo5xDczCMLrq12Pz_Tdoa7-V76J6NlfhQnqiyFU0nUMCGDXSGrvThq9Bt8kyKyMLFvIyCeSsJNhva_rcPuqtT9WmX1gziHS7X0wVNZ_52EbY71hEhIpEpxJbzuKwLJepnVwMK7J7XqPrf7HQtsufjMAlfvjdOyijUsFSWIiMj7_ssXmYakhYmZXbTVqtuNLjSLBh2khsURdM7Hut21X6bQnFkPr49NPufGPtkIY4_C1G-ainpo5oF-4g_Jv4jE2mfSf_kwDxp0OuZ8xyzgKlNmq6Zeyv-nwO1zjRf8aeYvf0KK1dwK55lzxsrIXGqoR3bfzlnZ6J60Y3zz-rfq6vfbxtdBES3FBYO6CKDD_01hEIgTccH6C=w416-h312-p"
                                alt>
                            <div class="texto-test">
                                {{ $testRealizado->test->nombreTest }}
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

</body>

</html>
