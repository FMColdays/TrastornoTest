 @extends('template.plantillaadmin')
 @section('tituloAdm','Inicio')
 
 @section('contenido')
     <div class="contenedor-inicio">
         <a href="{{route('estudiantes.create')}}">
             <div class="card-inicio">
                 <i class="fa-solid fa-graduation-cap"></i>
                 <h3>Agregar estudiante</h3>
             </div>
         </a>
         <a href="{{route('institutos.create')}}">
             <div class="card-inicio">
                 <i class="fa-solid fa-school"></i>
                 <h3>Agregar instituto</h3>
             </div>
         </a>
         <a href="{{route('carreras.create')}}">
             <div class="card-inicio">
                 <i class="fa-solid fa-suitcase"></i>
                 <h3>Agregar carrera</h3>
             </div>
         </a>
         <a href="{{route('test.create')}}">
             <div class="card-inicio">
                 <i class="fa-solid fa-book"></i>
                 <h3>Agregar test</h3>
             </div>
         </a>
     </div>
 @endsection
