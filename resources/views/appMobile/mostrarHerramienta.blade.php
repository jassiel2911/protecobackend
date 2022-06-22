@extends('layouts.becarios')

@section('content')
<div class="table-container">
  <table class="table table-striped table-hover" aria-label>
    <thead>
      <tr>
        <td scope="col">Titulo</td>
        <td scope="col">Descripción</td>
        <td scope="col">Link de la imagen</td>
        <td scope="col">Link de la página oficial</td>
        <td scope="col">Action</td>
      </tr>
    </thead>
    <tbody>
      <!-- Post preview-->
      <div class="post-preview">  
      @foreach ($herramientas as $herramienta)      
        <tr>
          <td>{{ $herramienta->title }}</td>
          <td>{{ $herramienta->description }}</td>
          <td><a href="{{ $herramienta->image }}"> Link de la imagen</a></td>
          <!-- Se pone la palabra "Link" porque las url son muy grandes y se salen de su cuadro -->
          <td><a href="{{ $herramienta->link }}"> Link de la página </a></td>
          <td class="text-center">
            <a href="{{ route('herramientas.edit', $herramienta->id)}}" class="btn btn-primary btn-sm">Editar</a>
            <form action="{{ route('herramientas.destroy', $herramienta->id)}}" method="post" style="display: inline-block">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm" type="submit">Borrar</button>
            </form>
          </td>
      <!-- Divider-->
      @endforeach
      </div>
      <br> <br> <br>
      <a class="btn btn-success" href="{{ route('herramientas.create')}}"> Crear Nueva Herramienta</a>
    </tbody>
  </table>
</div>

@endsection