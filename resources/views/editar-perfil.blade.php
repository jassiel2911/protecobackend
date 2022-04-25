@extends('layouts.app')

@section('content')
<main class="container" style="margin-top:100px; padding-top:70px;">

     @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{session('success')}}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <a href="{{route('perfil.index')}}" class="text-rosa">Regresar a mi perfil</a>
    <section class="container py-3 ">
        <h1 class="text-rosa text-center">Editar información personal</h1>
        <form class="edit-form container mx-auto" action="{{route('editar-perfil.update', $user->id)}}" method="POST">
            @csrf
            @method('PATCH')
          <!-- Nombre -->
          <div class="input-div row">
            <div class="col-12 col-md-6">
              <label for="name" class="form-label">Nombre(s)</label>
              <input name="fname" type="text" placeholder="" value="{{$user->fname}}">
            </div>
            <div class="col-12 col-md-6">
              <label for="name" class="form-label">Apellidos</label>
              <input name="lname" type="text" placeholder="" value="{{$user->lname}}">
            </div>
          </div>
          <!-- Correo -->
          <div class="input-div">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input name="email" type="email" value="{{$user->email}}">
          </div><br>
          <!-- Submit -->
          <div class="input-div">
            <input type="submit" class="auth-submit btn btn-rosa" value="Actualizar">
          </div>
        </form>
    </section>

</main>
@endsection
