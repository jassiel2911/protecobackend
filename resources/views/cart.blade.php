@extends('layouts.app')

@section('content')

<main>
    <div class="container mx-auto mt-5 mb-5">
       <h2 class="text-rosa text-center">Tu carrito</h2><br>
       <div class="mx-auto text-center">
         @foreach($carts as $cart)
            <div class=" mx-auto w-75">
                <div class="d-flex align-content-center align-items-center justify-content-between">
                    <div class="d-flex align-content-center align-items-center justify-content-between">
                        <img class="img-fluid" src="{{asset('/img/logos/'.$cart->curso->imagen)}}" alt="" width="70">
                        <h5 class="text-start mx-4">{{$cart->curso->nombre}}</h5>
                    </div>
                    <div class="d-flex align-content-center align-items-center justify-content-between"> 
                        <p class="d-none">{{$i = $i+1}}</p>
                        @if(auth()->user()->origin == "Comunidad UNAM")
                        <p class="text-end">$500</p>
                        <p class="d-none">{{$total = $total + 500}}</p>
                        @elseif(auth()->user()->origin == "Alumno externo")
                        <p class="text-end">$600</p>
                        <p class="d-none">{{$total = $total + 600}}</p>
                        @elseif(auth()->user()->origin == "Publico en general")
                        <p class="text-end">$700</p>
                        <p class="d-none">{{$total = $total + 700}}</p>
                        @endif
                        <p class="mx-3">Eliminar</p>
                    </div>
                </div>
            </div><br>
        @endforeach
        <hr>
         <div class="d-flex flex-column align-content-end align-items-end">
            <p><strong>Subtotal: </strong>$ {{$total}}</p>
             <p><strong>Cupón 3x2</strong></p>
             <form action="{{route('ticket.store')}}" method="POST">
                 @csrf
                <input type="hidden" name="total" value="{{$total}}">
                <button type="submit" class="btn-form text-center text-white bg-rosa mx-3">Generar ticket</a>
             </form>
        </div>
       </div>

    </div>
</main>

@endsection