@extends('layouts.becarios')

@section('content')
<main>
   <section class="home-cursos" id="cursos-proteco">
      <div class="container">
         <div class="my-3">
             <h1 class="text-rosa text-center">Mis cursos</h1>
            <div class="d-flex justify-content-end">
              <a href="{{route('becarios.create')}}" class="btn btn-rosa">Crear curso</a>
            </div>
         </div>

          <!-- Cursos -->
          <div class="home-cursos-cards my-4">
              @foreach($cursos as $curso)
              <div class="card">
                      <div class="card-body">
                          <div class="card-img">
                              <img src="{{asset('/img/logos/'.$curso->imagen)}}" alt="">
                          </div>
                          <div class="card-text">
                              <h4 class="card-text_titulo">{{$curso->nombre}}</h4>
                              <div class="d-none">{{setlocale(LC_ALL, 'es_ES')}}</div>
                              <p class="card-text_p">
                                  <span class="material-symbols-outlined">calendar_month</span>
                                  {{\Carbon\Carbon::parse($curso->fecha_inicio)->translatedFormat('j F') }} - 
                              </p>
                              <p class="card-text_p">
                                  <span class="material-symbols-outlined">schedule</span>
                                  De {{Carbon\Carbon::parse($curso->hora_inicio)->format('g:i a')}} a {{\Carbon\Carbon::parse($curso->fecha_fin)->translatedFormat('j F') }}
                              </p>
                              <hr>
                              <div class="card-links">
                                  <div class="card-links-botones">
                                      <a target="_blank" class="link-temario" href="">Ver temario</a>
                                  </div>
                                  <div class="d-flex">
                                          <!-- data-bs-toggle="modal" data-bs-target="#exampleModal" -->
                                          <input type="hidden" name="curso_id" value="{{$curso->id}}">
                                          <button type="submit" class="ml-4 bg-transparent border-0" title="Añadir al carrito">
                                              <span class="material-symbols-outlined">add_shopping_cart</span>
                                          </button>
                                          <span class="flip d-block">
                                              <span class="material-symbols-outlined">more_vert</span>
                                          </span>    
                                          <!-- atras -->
                                          <div class="panel">
                                              <p class="panel-p">
                                                  <span>Antecedentes:</span> Ninguno  
                                              </p>
                                              <p class="panel-p">
                                                  <span>Equipo:</span> Computadora con acceso a internet  
                                              </p>
                                              <p class="panel-p">
                                                  <span>Cupo:</span> 20  
                                              </p>
                                                <a href="{{route('becarios.edit', $curso->id)}}" class="text-rosa mx-3">Editar</a>
                                                <a href="{{route('becarios.show', $curso->id)}}" style="color:#fff;" class="mx-3">Ver</a>
                                              </div>
                                  </div>
                                
                              </div>
                          </div>
                      </div>
              </div>    
              @endforeach
          </div>
          <!-- <a class="d-block text-center text-rosa btn btn-rosa btn-min" href="{{route('ver-cursos.index')}}">Ver todos</a> -->
      </div>
  </section>


</main>
@endsection