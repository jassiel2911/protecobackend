@extends('layouts.admin')

@section('content')
<section class="container mt-5">
    <h1>Usuarios</h1><br>

    <div class="row">
        <div class="col">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="admin-index.html">Asistentes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('becarios')}}">Becarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admins')}}">Admins</a>
                </li>
            </ul>
        </div>
    </div>
</section>
<section class="home-cursos container my-5">
    <section class="container show-curso_lista">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Correo</th>
              <th scope="col">Procedencia</th>
              <th scope="col">Género</th>
              <th scope="col">No.Tickets</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr>
              <th scope="row">1</th>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->origin}}</td>
              <td>{{$user->gender}}</td>
              <td>3</td>
              <td>
                <!-- <a href="admin-user-show.html"><span class="tag-category badge rounded-pill bg-dark">Ver</span></a> -->
                <a href="admin-user-edit.html"><span class="tag-category badge rounded-pill bg-dark">Editar</span></a>
                <a href="curso-edit.html"><span class="tag-category badge rounded-pill bg-dark">Eliminar</span></a>
              </td>
            </tr>
            @endforeach
          </tbody>

        </table>
    </section>
</section>
@endsection