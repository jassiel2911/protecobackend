<!-- Vista principal cursos. -->
@extends('layouts.becarios')

@section('content')
<div class="table-container">
  <table class="table table-striped table-hover" aria-label>
    <thead>
      <tr>
        <td>Titulo</td>
        <td>Descripción</td>
        <td>Fecha</td>
        <td>Link de imagen</td>
        <td>Acción</td>
      </tr>
    </thead>
    <tbody>
      @foreach ($cursos as $curso)
      <tr>
        <td>{{ $curso->title }}</td>
        <td>{{ $curso->description }}</td>
        <td>{{ $curso->date }}</td>
        <!-- Se pone la palabra "Link" porque las url son muy grandes y se salen de su cuadro -->
        <td><a href="{{ $curso->link }}"> Link </a></td>
        <td class="text-center">
          <a href="{{ route('cursosApp.edit', $curso->id)}}" class="btn btn-primary btn-sm">Editar</a>
          <form action="{{ route('cursosApp.destroy', $curso->id)}}" method="post" style="display: inline-block">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm" type="submit">Borrar</button>
          </form>
        </td>
        <!-- Divider-->
        @endforeach
        <a class="btn btn-success" href="{{ route('cursosApp.create')}}"> Crear nuevo curso</a>
    </tbody>
  </table>
</div>
@endsection