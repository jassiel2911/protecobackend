@extends('layouts.becarios')
@section('content')
    <main>
    <section class="container" id="">
            <div class="my-3 d-flex justify-content-center flex-wrap">
                <h1 class="text-rosa text-center mx-5">Mis cursos</h1>
                <div class="d-flex justify-content-end">
                <a href="{{route('becarios.create')}}" class="btn btn-rosa">Crear curso</a>
                </div>
            </div>

            <!-- Cursos -->
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered table-responsive">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Horario</th>
                    <th scope="col">Cupo</th>
                    <th scope="col">Semestre</th>
                    <th scope="col">Link de Classroom</th>
                    <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cursos as $curso)
                    <tr>
                    <th scope="row">{{$curso->id}}</th>
                    <th scope="row">
                        <img width="80" class="iconos-cursos" src="{{asset('/img/logos/'.$curso->imagen)}}" alt="Java">
                    </th>
                    <td>{{$curso->nombre}}</td>
                    <td>{{\Carbon\Carbon::parse($curso->fecha_inicio)->format('j F, Y') }} - {{\Carbon\Carbon::parse($curso->fecha_fin)->format('j F, Y') }}</td>
                    <td><p>De {{Carbon\Carbon::parse($curso->hora_inicio)->format('g:i a')}} a {{Carbon\Carbon::parse($curso->hora_fin)->format('g:i a')}} </p></td>
                    <td>{{$curso->cupo}}</td>
                    <td>{{$curso->semestre}}</td>
                    <td><a href="{{$curso->classroom}}">{{$curso->classroom}}</a></td>
                    <td>
                        <form method="POST" action="{{ route('cursos.destroy', $curso->id) }}" >
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('becarios.show', $curso->id) }}"><span class="tag-category badge rounded-pill bg-dark">Ver</span></a>
                        <a href="{{ route('becarios.edit', $curso->id) }}"><span class="tag-category badge rounded-pill bg-dark">Editar</span></a>
                        </form>
                    </td>
                    </tr>
                    @endforeach
                </tbody>

                </table>
            </div>
    </section>

    </main>
@endsection