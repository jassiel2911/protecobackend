@extends('layouts.admin')

@section('content')
<main> 
  <x-ticket-nav/>

  <section class="home-cursos container my-5">
      <h2 class="text-azul">Pagados</h2>
      <section class="container show-curso_lista">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Usuario</th>
                <th scope="col">Semestre</th>
                <th scope="col">Status</th>
                <th scope="col">Monto</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tickets as $ticket)
              <tr  data-bs-toggle="collapse" data-bs-target="#" aria-expanded="false" aria-controls="collapseWidthExample">
                <th scope="row">{{$ticket->id}}</th>
                <td>{{$ticket->user->fname." ".$ticket->user->lname}}</td>
                <td>{{$ticket->semestre}}</td>
                <td>{{$ticket->status}}</td>
                <td>{{$ticket->total}}</td>
                <td>
                  <!-- <a href="admin-user-show.html"><span class="tag-category badge rounded-pill bg-dark">Ver</span></a> -->
                  <form action="{{route('admintickets.destroy', $ticket->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('admintickets.show',$ticket->id)}}"><span class="tag-category badge rounded-pill bg-dark">Ver</span></a>
                    <!-- <button style="background-color:transparent; border:none;" type="submit"><span class="tag-category badge rounded-pill bg-dark">Eliminar</span></ style="background-color:transparent; border:none;"> -->
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