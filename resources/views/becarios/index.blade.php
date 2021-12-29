@extends('layouts.becarios')

@section('content')
<main>
  <section class="container mt-5">
      <h1 class="text-rosa">Mis cursos</h1><br>
      <div class="d-flex justify-content-end">
        <a class="btn btn-rosa d-inline-block" href="{{route('becarios.create')}}">Crear curso</a>
      </div>
  </section>
  <section class="home-cursos container my-5">
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($cursos as $curso)
            <div class="col">
                <div class="card" style="width: 18rem;">
                <img src="{{asset('/img/logos/'.$curso->imagen)}}" class="card-img-top" alt="...">
                <div class="card-body  text-center">
                    <h5 class="card-title">{{$curso->nombre}}</h5>
                     <p class="card-text">Del {{\Carbon\Carbon::parse($curso->fecha_inicio)->format('j F, Y') }} <br>al {{\Carbon\Carbon::parse($curso->fecha_fin)->format('j F, Y') }} </p>
                    <hr>
                     <p class="card-text">Del {{$curso->hora_inicio}} <br> al {{$curso->hora_fin}} </p>
                    <div class="d-flex">
                        <a href="{{route('becarios.show', $curso->id)}}" class="btn-form btn-info">Ver curso</a>
                    </div>
                </div>
                </div>
            </div>
        @endforeach
      </div>
  </section>
</main>
@endsection