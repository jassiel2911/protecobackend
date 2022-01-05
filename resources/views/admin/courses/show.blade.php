@extends('layouts.admin')

@section('content')
<main>
    <div class="container">
        <section class="container mt-5">
        <a href="{{route('cursos.index')}}">Regresar</a><br><br>
          <h1 class="text-rosa">{{$curso->nombre}}</h1><br>
          <div class="card bg-light p-3">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <p>Semestre {{$curso->semestre}}</p>
                    <p>Del {{\Carbon\Carbon::parse($curso->fecha_inicio)->format('j F, Y') }} al {{\Carbon\Carbon::parse($curso->fecha_fin)->format('j F, Y') }}</p>
                    <p>De {{$curso->hora_inicio}} a {{$curso->hora_fin}}</p> 
                    <p>{{$curso->dias}}</p>
                    <p>Antecedentes: {{$curso->antecedentes}}</p>
                    <p>Equipo: {{$curso->equipo}}</p>
                </div>
                 <div class="col-12 col-lg-6">
                    <p>Tipo {{$curso->tipo}}</p>
                    <p>Categoría: {{$curso->cat}}</p>
                    <p>Nivel: {{$curso->nivel}}</p>
                    <p>Cupo:  {{$curso->cupo}}</p> 
                    <p>Inscritos:  {{$curso->inscritos}}</p> 
                    <p>Temario: <a target="_blank" href="{{asset('/temarios/'.$curso->temario)}}">{{$curso->temario}}</a></p>
                </div>
            </div>
        </div>
        </section>
        <section class="container mt-5">
            <h2 class="text-rosa">Asistentes</h2>
            <table class="table table-hover table-striped table-bordered mt-4">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Procedencia</th>
                    <th scope="col">Calificacion</th>
                    <th scope="col">Constancia</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Juan Pérez</td>
                        <td>@</td>
                        <td>UNAM</td>
                        <td>
                            <form action="">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="number" min="0" max="10" name="cal" id="" class="bg-light border-dark">
                                    </div>
                                    <div class="col-6">
                                        <button type="text" class="submit btn-form btn-rosa w-50" >Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </td>
                        <td>En proceso</td>
                    </tr>
                </tbody>

              </table>
        </section>
    </div>
</main>

@endsection