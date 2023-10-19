@foreach ($institutos as $instituto)
    <a href="{{ route('institutos.edit', $instituto) }}">
        <div class="card-index sombra">
            <h4>{{ $instituto->nombre_instituto }}</h4>
            <form action="{{ route('institutos.destroy', $instituto->id) }}" method="post">
                @method('DELETE')
                @csrf
                <input id="eliminarI" class="eliminar-instituto" type="submit" value="Eliminar">
            </form>
        </div>
    </a>
@endforeach
