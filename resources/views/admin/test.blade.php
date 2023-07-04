@extends('template.plantillaadmin')

@section('contenido')
    <div class="contenedor-tabla-usuarios">
        <div class="card-cuerpo">
            <table id="usuarios" class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>nombreTest</th>
                        <th>descripcion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tests as $test)
                        <tr>
                            <td>{{ $test->id }}</td>
                            <td>{{ $test->nombreTest }}</td>
                            <td>{{ $test->descripcion }}</td>

                            <td>
                                <a href="#">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>


                                <form class="eliminar-alert" action="" method="post" style="display: inline-block;">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" type="submit">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                   Z
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
