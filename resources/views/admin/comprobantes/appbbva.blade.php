@extends('layouts.admin')

@section('content')
<main> 
  <x-comprobantes/>
 
  <section class="home-cursos container my-5">
    <!-- @if(session('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <p>{{session('success')}}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif -->
    <h2 class="text-azul">App BVA</h2>
      <section class="container-fluid show-curso_lista">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha</th>
                <th scope="col">No Ficha</th>
                <th scope="col">U. digitos</th>
                <th scope="col">CIE</th>
                <th scope="col">Monto</th>
                <th scope="col">Probatorio</th>
              </tr>
            </thead>
             <tbody>
              @foreach($comprobantes as $comprobante)
              <tr  data-bs-toggle="collapse" data-bs-target="#" aria-expanded="false" aria-controls="collapseWidthExample">
                <th scope="row">{{$comprobante->id}}</th>
                <td scope="row">{{$comprobante->fecha}}</td>
                <td scope="row">{{$comprobante->no_ficha}}</td>
                <td scope="row">{{$comprobante->ultimos_digitos}}</td>

                <td scope="row">{{$comprobante->cie}}</td>
                <td scope="row">{{$comprobante->monto}}</td>
                <td scope="row">
                  <img src="{{asset("comprobantes/$comprobante->captura")}}" alt="" width="700">
                  <a target="_blank" href="{{asset("comprobantes/$comprobante->captura")}}">Ver archivo</a>
                </th>
              </tr>
              @endforeach
            </tbody>
          </table>
      </section>
  </section>
</main>

@endsection