@foreach ($tests as $test)
<a href="{{ route('test.edit', $test) }}">
    <div class="card-index sombra">
        <h4>{{ $test->nombreTest }}</h4>
        <form action="{{ route('test.destroy', $test) }}" method="post">
            @method('DELETE')
            @csrf
            <input id="eliminarI" class="eliminar-instituto" type="submit" value="Eliminar">
        </form>
    </div>
</a>
@endforeach