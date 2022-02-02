@extends('layouts.admin')

@section('content')
<main>
  <section class="container mt-5">
      <h1 class="text-rosa">Cursos</h1><br>
      <div class="d-flex justify-content-end">
        <a class="btn btn-rosa d-inline-block" href="{{route('cursos.create')}}">Crear curso</a>
      </div>
      <div class="row">
          <div class="col">
              <ul class="nav">
                  <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="{{route('cursos.index')}}">Intersemestrales</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{route('semestrales')}}">Semestrales</a>
                  </li>
              </ul>
          </div>
      </div>
  </section>
  <section class="home-cursos container my-3">
      <h2 class="text-azul">Semestrales</h2><br>
      <section class="container show-curso_lista">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Fecha</th>
                <th scope="col">No. Asistentes</th>
                <th scope="col">Fecha de inicio</th>
              </tr>
            </thead>
            <tbody>
              @foreach($cursos as $curso)
              <tr>
                <th scope="row">{{$curso->id}}</th>
                <td>{{$curso->nombre}}</td>
                <td>{{$curso->fecha_inicio }} - {{$curso->fecha_fin }}</td>
                <td>{{$curso->id}}</td>
                <td>{{$curso->id}}</td>
                <td>
                  <a href="admin-user-show.html"><span class="tag-category badge rounded-pill bg-dark">Ver</span></a>
                  <a href="admin-user-edit.html"><span class="tag-category badge rounded-pill bg-dark">Editar</span></a>
                  <a href="curso-edit.html"><span class="tag-category badge rounded-pill bg-dark">Eliminar</span></a>
                </td>
              </tr>
              @endforeach
            </tbody>

          </table>
      </section>
  </section>
</main>
@endsection