@extends('layouts.admin')

@section('content')
<main> 
  <x-ticket-nav/>
  <section class=" container my-5">
    @if(session('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <p>{{session('success')}}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h2 class="text-azul">Todos</h2>
      <section class="container-fluid show-curso_lista">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Usuario</th>
                <th scope="col">Correo</th>
                <th scope="col">Procedencia</th>
                <th scope="col">Monto</th>
                <th scope="col">Status</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tickets as $ticket)
               <tr  data-bs-toggle="collapse" data-bs-target="#" aria-expanded="false" aria-controls="collapseWidthExample">
                <th scope="row">{{$ticket->id}}</th>
                <td>{{$ticket->user->fname." ".$ticket->user->lname}}</td>
                <td>{{$ticket->user->email}}</td>
                <td>{{$ticket->user->origin}}</td>
                <td>{{$ticket->total}}</td>
                <td>{{$ticket->status}}</td>
                <td>
                  <!-- <a href="admin-user-show.html"><span class="tag-category badge rounded-pill bg-dark">Ver</span></a> -->
                  <form action="{{route('admintickets.destroy', $ticket->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('admintickets.show',$ticket->id)}}"><span class="tag-category badge rounded-pill bg-success">Ver</span></a>
                    <a href="{{route('admintickets.edit',$ticket->id)}}"><span class="tag-category badge rounded-pill bg-info">Editar</span></a>
                    <button style="background-color:transparent; border:none;" type="submit"><span class="tag-category badge rounded-pill bg-danger">Eliminar</span></ style="background-color:transparent; border:none;">
                  </form>
                </td>
              </tr>
              <tr>
              </tr>
              <p class="d-none">{{$total = $total + $ticket->total}}</p>
              @endforeach
            </tbody>

            <h4 class="text-end">{{$total}}</h4>

          </table>
      </section>
  </section>
</main>

@endsection