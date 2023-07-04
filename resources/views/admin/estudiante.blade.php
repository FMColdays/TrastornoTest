@extends('template.plantillaadmin')

@section('contenido')
    <div>
        <form action="{{ route('estudiante.update', $estudiante) }}" method="post">
            @method('PUT')
            @csrf
            <label for="">no</label>
            <input type="radio" name="confirmacion" value="0" @if ($estudiante->confirmacion == '0') checked @endif>
            <label for="">si</label>
            <input type="radio" name="confirmacion" value="1" @if ($estudiante->confirmacion == '1') checked @endif>
            <input type="submit">
        </form>

    </div>
@endsection
