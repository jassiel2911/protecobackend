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
              </tr>
            </thead>
            <tbody>
              @foreach($admins as $user)
              <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->fname . ' ' . $user->lname}}</td>
                <td>{{$user->email}}</td>
                 <td>
                  <form action="{{route('admin.destroy', $user->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('admin.edit',$user->id)}}"><span class="tag-category badge rounded-pill bg-dark">Editar</span></a>
                    <button style="background-color:transparent; border:none;" type="submit"><span class="tag-category badge rounded-pill bg-dark">Eliminar</span></button>
                  </form>
                 </td>
              </tr>
              @endforeach
            </tbody>

          </table>
      </section>
  </section>
</main>

@endsection