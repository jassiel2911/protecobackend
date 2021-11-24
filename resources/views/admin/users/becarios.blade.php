@extends('layouts.admin')

@section('content')
<main>
  <x-admin-user-nav/>

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
              @foreach($becarios as $user)
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
</main>

@endsection