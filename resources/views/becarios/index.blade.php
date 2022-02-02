@extends('layouts.becarios')

@section('content')
<main>
  <section class="container py-5 px-5 ">
    <h1 class="text-rosa text-center">Mis cursos</h1>
    <div class="d-flex justify-content-end">
      <a href="{{route('becarios.create')}}" class="btn btn-rosa">Crear curso</a>
    </div>
    <div class="row">
      @foreach($cursos as $curso)
      <div class="col">
        <div class="scene scene--card ">
          <div class="cursos-card shadow-lg" id="card-t">
            <div class="card__face card__face--front">
              <img class="iconos-cursos" src="{{asset('/img/logos/'.$curso->imagen)}}" alt="Java">
              <div class="c-body">
                <h3 class="text-azul">{{$curso->nombre}}</h3>
                <p>Del {{\Carbon\Carbon::parse($curso->fecha_inicio)->format('j F, Y') }} <br>al {{\Carbon\Carbon::parse($curso->fecha_fin)->format('j F, Y') }}</p>
                <p>Del {{$curso->hora_inicio}} <br> al {{$curso->hora_fin}}</p>
              </div>
              <div class="c-footer">
                <div class="c-footer-links d-flex">
                  <a href="{{route('becarios.edit', $curso->id)}}" class="mx-3 btn btn-delgado bg-lavanda">Editar</a>
                  <a href="{{route('becarios.show', $curso->id)}}" style="color:#fff;" class="mx-3 btn btn-delgado bg-rosa">Ver</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </section>

</main>
@endsection