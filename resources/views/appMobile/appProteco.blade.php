<!-- Vista principal talleres -->

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
      @foreach ($talleres as $taller)
      <!-- Post preview-->

      <tr>
        <td>{{ $taller->title }}</td>
        <td>{{ $taller->description }}</td>
        <td>{{ $taller->date }}</td>
        <!-- Se pone la palabra "Link" porque las url son muy grandes y se salen de su cuadro -->
        <td><a href="{{ $taller->liga }}"> Link </a></td>
        <td class="text-center">
          <a href="{{ route('talleres.edit', $taller->id)}}" class="btn btn-primary btn-sm">Editar</a>
          <form action="{{ route('talleres.destroy', $taller->id)}}" method="post" style="display: inline-block">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm" type="submit">Borrar</button>
          </form>
        </td>
        </td>
      </tr>
      @endforeach
      <a class="btn btn-success" href="{{ route('talleres.create')}}"> Crear nuevo taller</a>
    </tbody>
  </table>
</div>
@endsection