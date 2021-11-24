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
              @foreach($users as $user)
              <tr  data-bs-toggle="collapse" data-bs-target="#" aria-expanded="false" aria-controls="collapseWidthExample">
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->fname . ' ' . $user->lname}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->origin}}</td>
                <td>{{$user->gender}}</td>
                <td>NA</td>
                <td>
                  <!-- <a href="admin-user-show.html"><span class="tag-category badge rounded-pill bg-dark">Ver</span></a> -->
                  <form action="{{route('admin.destroy', $user->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('admin.edit',$user->id)}}"><span class="tag-category badge rounded-pill bg-dark">Editar</span></a>
                    <button style="background-color:transparent; border:none;" type="submit"><span class="tag-category badge rounded-pill bg-dark">Eliminar</span></ style="background-color:transparent; border:none;">
                  </form>
                </td>
              </tr>
              <tr>
                <div class="collapse" id="{{$user->email}}">
                  <p>Hola {{$user->name}}</p>
                </div>
              </tr>
              @endforeach
            </tbody>

          </table>
      </section>
  </section>
</main>

@endsection