@extends('layouts.app')

@section('content')

<main>
<!-- Muestrea un mensaje cuando se elimina el curso, indicando que se eliminĂ³ correctamente. -->
    <div class="container py-5">
          <div class="row my-5">
              <div class="col-12 col-md-6">
                <img src="{{asset('img/base/1.png')}}" alt="" class="img-fluid mx-auto">
              </div>
              <div class="col-12 col-md-6">
                <img src="{{asset('img/base/2.png')}}" alt="" class="img-fluid mx-auto">
              </div>
        </div>
    </div>
</main>

@endsection