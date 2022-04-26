@extends('layouts.admin')

@section('content')
<main> 
  <x-ficha/>
 
  <section class="home-cursos container my-5">
    <!-- @if(session('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <p>{{session('success')}}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif -->
    <h2 class="text-azul">600</h2>
      <section class="container-fluid show-curso_lista">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Archivo</th>
                <th scope="col">Monto</th>
                <th scope="col">Ticket ID</th>
                <th scope="col">Comprobante</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
             <tbody>
              @foreach($fichas as $ficha)
              <tr  data-bs-toggle="collapse" data-bs-target="#" aria-expanded="false" aria-controls="collapseWidthExample">
                <th scope="row">{{$ficha->id}}</th>
                <td>{{$ficha->file_ficha}}</td>
                <td>{{$ficha->monto}}</td>
                <td>{{$ficha->ticket_id}}</td>
                <td>
                    @if($ficha->comprobante==1)
                    ✅
                    @endif
                </td>
                <td>

                </td>
               
              </tr>
              @endforeach
            </tbody>
          </table>
      </section>
  </section>
</main>

@endsection