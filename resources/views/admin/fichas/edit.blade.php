@extends('layouts.admin')

@section('content')
<main> 
  
 <div class="container">
     @if(session('success'))
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <p>{{session('success')}}</p>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      @endif
     <a href="{{route('adminfichas.index')}}">Regresar</a>
     <h1 class="text-rosa py-2">Editar ficha</h1>
     <!-- crear ficha -->
      <form class="ml-auto" action="{{ route('adminfichas.update', $ficha->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
         @method('PATCH')
          <div class="d-flex justify-content-between align-items-center align-content-center" style="max-width: 800px;">
                <input value="{{$ficha->file_ficha}}" class="d-block mx-2" placeholder="archivo" type="text" name="file_ficha">
                <input value="{{$ficha->monto}}" class="d-block mx-2" placeholder="monto" type="text" name="monto">
                <button type="submit" class="btn btn-delgado btn-rosa" style="width:450px">Actualizar Ficha</button>
          </div>
      </form>
 </div>
</main>

@endsection