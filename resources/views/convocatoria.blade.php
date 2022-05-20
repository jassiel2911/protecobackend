@extends('layouts.app')

@section('content')

<main>
<!-- Muestrea un mensaje cuando se elimina el curso, indicando que se eliminó correctamente. -->
    <div class="container py-5">
        <h1 class="text-rosa text-center">Sé parte de la generación 43</h1>
    </div>
    <div class="container w-100 d-flex py-5">
        <div class="mx-auto">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6" aria-label="Slide 7"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="7" aria-label="Slide 8"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="8" aria-label="Slide 9"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="9" aria-label="Slide 10"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{asset('img/convocatoria/1.png')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{asset('img/convocatoria/2.png')}}." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{asset('img/convocatoria/3.png')}}." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{asset('img/convocatoria/4.png')}}." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{asset('img/convocatoria/5.png')}}." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{asset('img/convocatoria/6.png')}}." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{asset('img/convocatoria/7.png')}}." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{asset('img/convocatoria/8.png')}}." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{asset('img/convocatoria/9.png')}}." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{asset('img/convocatoria/10.png')}}." class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        </div>
    </div>
    <div class="container py-5 d-flex flex-wrap align-content-center align-items-center justify-content-center" style="width:max-content">
        <!-- <a href="{{asset('img/convocatoria/1.png')}}" target="_blank" class="btn btn-rosa d-block mx-auto">Descargar en PDF</a> -->
        <a href="{{asset('img/convocatoria/Solicitud_Ingreso.docx')}}"  class="btn btn-azul my-3 mx-2" target="_blank">Solicitud de ingreso</a>
        <a href="{{asset('img/convocatoria/Carta_Compromiso.docx')}}"  class="btn btn-azul my-3 mx-2" target="_blank">Carta compromiso</a>
    </div>
</main>

@endsection