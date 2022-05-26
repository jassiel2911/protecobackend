@extends('layouts.admin')

@section('content')
<main>
  <x-admin-user-nav/>

  <section class="container my-3 table-responsive">
      <h2 class="text-azul">Becarios</h2>
      <section class="container">
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
                <td>{{$user->fname . ' ' . $user->lname}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->origin}}</td>
                <td>{{$user->gender}}</td>
                <td>3</td>
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