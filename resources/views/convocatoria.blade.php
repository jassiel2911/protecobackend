@extends('layouts.app')

@section('content')

<main>
    <style>
      .carousel-control-prev-icon, .carousel-control-next-icon {
        height: 50px;
        width: 50px;
        outline: black;
        background-color: navy;
        background-size: 100%, 100%;
        border-radius: 50%;
        border: 1px solid black;
        background-size: 60%;
      }
      .carousel-item img{
        width: 90%;
        display: block;
        margin:auto;
      }
      .carousel-indicators [data-bs-target]{
        background-color:navy;
      }
    </style>
<!-- Muestrea un mensaje cuando se elimina el curso, indicando que se eliminó correctamente. -->
    <div class="container-fluid py-5">
        <h1 class="text-rosa text-center">Sé parte de la generación 43 de PROTECO</h1>
        <h5 class="text-azul text-center">Aquí te contamos cómo</h5>
    </div>
    <div class="container w-100 d-flex flex-wrap">
        <div class="mx-auto"  style="max-width:500px"> 
          <div id="carouselExampleIndicators" class="carousel slide mx-auto" data-bs-ride="true">
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
                <img src="{{asset('img/convocatoria/1.png')}}" class="d-block" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{asset('img/convocatoria/2.png')}}" class="d-block" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{asset('img/convocatoria/3.png')}}" class="d-block" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{asset('img/convocatoria/4.png')}}" class="d-block" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{asset('img/convocatoria/5.png')}}" class="d-block" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{asset('img/convocatoria/6.png')}}" class="d-block" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{asset('img/convocatoria/7.png')}}" class="d-block" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{asset('img/convocatoria/8.png')}}" class="d-block" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{asset('img/convocatoria/9.png')}}" class="d-block" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{asset('img/convocatoria/10.png')}}" class="d-block" alt="...">
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
          <div class="container py-5 d-flex flex-wrap align-content-center align-items-center justify-content-center">
              <!-- <a href="{{asset('img/convocatoria/1.png')}}" target="_blank" class="btn btn-rosa d-block mx-auto">Descargar en PDF</a> -->
              <a href="{{asset('docs/convocatoria/Solicitud_Ingreso.docx')}}"  class="btn btn-azul my-3 mx-2" target="_blank">Solicitud de ingreso</a>
              <a href="{{asset('docs/convocatoria/Carta_Compromiso.docx')}}"  class="btn btn-azul my-3 mx-2" target="_blank">Carta compromiso</a>
              <a href="{{asset('docs/convocatoria/Documento_Beneficios_PROTECO.pdf')}}"  class="btn btn-azul my-3 mx-2" target="_blank">Doc. de beneficios</a>
          </div>
        </div>
        <div class="conv">
          <img style="max-width:700px; width:91vw;" class="img-fluid" src="{{asset('img/convocatoria/Convocatoria_Gen43.jpg')}}" alt="">
          <a href="{{asset('docs/convocatoria/Convocatoria_Gen43.pdf')}}"  class="btn btn-azul my-3 mx-auto" target="_blank">Descargar convocatoria</a>
        </div>
    </div>
   
    <div class="container my-5">
      <h3 class="text-rosa text-center ">¿Te perdiste la plática informativa? Puedes verla aquí</h3>
      <iframe class="mx-auto d-block my-5" width="560" height="315" src="https://www.youtube.com/embed/Paa5ZmC5A4k" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="container">
      <img src="{{asset('img/convocatoria/ProcesoSeleccionGen43.png')}}" alt="" class="img-fluid d-block mx-auto">
    </div>
</main>

@endsection