@extends('layouts.admin')

@section('content')
<main>
  <section class="container mt-5">
      <div class="d-flex justify-content-between align-items-center">
        <h1 class="text-rosa">Cursos</h1><br>
        <a class="btn btn-rosa d-inline-block" href="{{route('cursos.create')}}">Crear curso</a>
      </div>
  </section>
  <section class="container py-5">
      <ul class="nav bg-azul nav-pills nav-pills-cursos mb-3 d-flex" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
              <button class="nav-link active" id="pills-todos-tab" data-bs-toggle="pill" data-bs-target="#pills-todos" type="button" role="tab" aria-controls="pills-todos" aria-selected="true">Intersemestrales</button>
          </li>
          <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-programacion-tab" data-bs-toggle="pill" data-bs-target="#pills-programacion" type="button" role="tab" aria-controls="pills-programacion" aria-selected="false">Semestrales</button>
          </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active py-3" id="pills-todos" role="tabpanel" aria-labelledby="pills-todos-tab">
              <!-- Inters -->
              <div class="row">
                  <!-- <h3>Semana 1</h3> -->
                  <div class="col">
                    <table class="table table-hover table-striped table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Titular</th>
                          <th scope="col">Fecha</th>
                          <th scope="col">Inscritos</th>
                          <th scope="col">No. Asistentes</th>
                          <th scope="col">Publicado</th>
                          <th scope="col">Link de Classroom</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($inters as $inter)
                        <tr>
                          <th scope="row">{{$inter->id}}</th>
                          <td>{{$inter->nombre}}</td>
                          @foreach($becarios as $becario)
                            @if($becario->id == $inter->titular)
                            <td>{{$becario->fname." ".$becario->lname}}</td>
                            @endif
                          @endforeach
                          <td>{{\Carbon\Carbon::parse($inter->fecha_inicio)->format('j F, Y') }} - {{\Carbon\Carbon::parse($inter->fecha_fin)->format('j F, Y') }}</td>
                          @foreach($tickets as $ticket)
                            @if($ticket->curso_id == $inter->id)
                            <p class="d-none">{{$i=$i+1}}</p>
                            @endif
                          @endforeach
                          <td>{{$i}}</td>
                          <p class="d-none">{{$i=0}}</p>
                          <td>{{$inter->inscritos}}</td>
                          <td>
                            @if($inter->publicado == 1)
                              Sí
                            @else
                              No
                            @endif
                          </td>
                          <td><a href="{{$inter->classroom}}">{{$inter->classroom}}</a></td>
                          <td>
                            <form method="POST" action="{{ route('cursos.destroy', $inter->id) }}" >
                              @csrf
                              @method('DELETE')
                              <a href="{{ route('cursos.show', $inter->id) }}"><span class="tag-category badge rounded-pill bg-dark">Ver</span></a>
                              <a href="{{ route('cursos.edit', $inter->id) }}"><span class="tag-category badge rounded-pill bg-dark">Editar</span></a>
                              <button type="submit" class="border-0"><span class="tag-category badge rounded-pill bg-dark ">Eliminar</span></a>
                            </form>
                  
                          </td>
                        </tr>
                        @endforeach
                      </tbody>

                    </table>
                  </div>
              </div>
          </div>
          <div class="tab-pane fade" id="pills-programacion" role="tabpanel" aria-labelledby="pills-programacion-tab">
            <!-- Semestrales -->
            <div class="row">
                <div class="col">
                  <table class="table table-hover table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Titular</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Inscritos</th>
                        <th scope="col">No. Asistentes</th>
                        <th scope="col">Publicado</th>
                        <th scope="col">Link de Classroom</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($semestrales as $semestral)
                      <tr>
                        <th scope="row">{{$semestral->id}}</th>
                        <td>{{$semestral->nombre}}</td>
                        @foreach($becarios as $becario)
                          @if($becario->id == $semestral->titular)
                          <td>{{$becario->fname." ".$becario->lname}}</td>
                          @endif
                        @endforeach
                        <td>{{\Carbon\Carbon::parse($semestral->fecha_inicio)->format('j F, Y') }} - {{\Carbon\Carbon::parse($semestral->fecha_fin)->format('j F, Y') }}</td>
                        @foreach($tickets as $ticket)
                          @if($ticket->curso_id == $semestral->id)
                          <p class="d-none">{{$i=$i+1}}</p>
                          @endif
                        @endforeach
                        <td>{{$i}}</td>
                        <p class="d-none">{{$i=0}}</p>
                        <td>{{$semestral->inscritos}}</td>
                        <td>
                          @if($semestral->publicado == 1)
                            Sí
                          @else
                            No
                          @endif
                        </td>
                        <td><a href="{{$semestral->classroom}}">{{$semestral->classroom}}</a></td>
                        <td>
                          <form method="POST" action="{{ route('cursos.destroy', $semestral->id) }}" >
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('cursos.show', $semestral->id) }}"><span class="tag-category badge rounded-pill bg-dark">Ver</span></a>
                            <a href="{{ route('cursos.edit', $semestral->id) }}"><span class="tag-category badge rounded-pill bg-dark">Editar</span></a>
                            <button type="submit" class="border-0"><span class="tag-category badge rounded-pill bg-dark ">Eliminar</span></a>
                          </form>
                  
                        </td>
                      </tr>
                      @endforeach
                    </tbody>

                  </table>
                </div>
            </div>
          </div>
      </div>
  </section>
</main>


@endsection