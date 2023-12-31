@if (count($estudiantes) == 0)
    No se encontraron resultados
@endif

@foreach ($estudiantes as $estudiante)
    <a class="enlace" href="{{ route('estudiantes.edit', $estudiante) }}">
        <div class="card-estudiantes sombra"
            @if ($estudiante->confirmacion == 0) style="background-color: #dfb0b0" 
        @else style="background-color:#b0dfbd" @endif>

            <div>
                <h4>Numero de control</h4>
                <p class="numeroControl">{{ $estudiante->numeroControl }}</p>
            </div>

            <div>
                <h4>Correo</h4>
                <p class="correo">{{ $estudiante->correo }}</p>
            </div>

            <div>
                <h4>Instituto</h4>
                <p class="instituto">{{ $estudiante->instituto->nombre_instituto }}</p>
            </div>

            <div>
                <h4>Carrera</h4>
                <p class="carrera">{{ $estudiante->carrera->nombre_carrera }}</p>
            </div>

            <div>
                <h4>Semestre</h4>
                <p class="semestre">{{ $estudiante->semestre->numero_semestre }}</p>
            </div>
            @if (!is_null($estudiante->id_certificado))
                <div>
                    <h4>Numero certificado</h4>
                    <p>{{ $estudiante->id_certificado }}</p>
                </div>
            @endif

        </div>
    </a>
@endforeach

<div style="display: none">
    {{ $estudiantes->links() }}
</div>
