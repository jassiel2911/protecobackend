@extends('layouts.app')

@section('content')

<main>
    <section class="container py-5 carrito px-5 ">
        <h1 class="text-rosa text-center">Ticket generado con éxito 👍</h1>
        <h3 class="text-center">Detalles</h3>
        <div class="card mx-auto my-3 bg-grisclaro" style="width: 18rem;">
          <div class="card-body">
            <p><b>Ticket #{{$ticket->id}}</b></p>
            <p><b>Cursos: </b></p>
            <ul>
                @foreach($ticket_items as $ticket_item)
                    <li>{{$ticket_item->curso->nombre}}</li>
                    
                @endforeach
            </ul>
            <p><b>Total a pagar: </b>${{$ticket->total}}</p>
          </div>
        </div>
        <hr>
        <!-- <p>Las fichas de pago aún no están disponibles, te notificaremos por e-mail cuando ya puedas generarla. :)</p> -->
        <p>Para descargar la ficha de pago ve a la sección de  
          <a style="text-decoration: underline;" class="text-rosa" href="{{route('perfil.index')}}">Mi perfil.</a>
          y da click en "Generar ficha".
      </p>
        <!-- <p>Las fichas de pago estarán disponibles el día Lunes 10 de enero y las podrás descargar desde la sección de <a style="text-decoration: underline;" class="text-rosa" href="{{route('perfil.index')}}">Mi perfil.</a></p> -->
        <h5 class="text-rosa text-center">¡Gracias por tu confianza!</h5>
        <!-- <p>Descarga las fichas referenciadas con las que podrás hacer el pago de tus cursos, recuerda que puede ser por transferencia o directamente en un cajero BBVA. <b>¿Tienes dudas? </b><a style="text-decoration: underline;" href="" class="text-rosa">Visita esta infografía</a></p>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Referencia</th>
              <th scope="col">Monto</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Ficha 456122135 <a href="">Descargar</a></td>
              <td>$500</td>
            </tr>
          </tbody>
        </table> -->
        <!-- <p>También puedes encontrar las fichas en la sección de <a style="text-decoration: underline;" class="text-rosa" href="">Mi perfil</a></p> -->
    </section>
</main>

@endsection