@extends('base')
@include('includes/navbar')

<head>

  <link rel="stylesheet" href="{{ asset('css/compraBoletos.css') }}">
</head>

@section('content')

<div class="container contenedor">

    <div class="row">

    <div class="lado-izquierdo col-md-5">

        <div class="ventanas">       
        </div>
        <div class="contenedor-asientos">
            @foreach($asientos as $asiento)
              <div class="col asientos @if($asiento['clase']['nombre'] === 'Primera Clase') clase-primera-clase
              @elseif($asiento['clase']['nombre'] === 'Premium') clase-premium
              @elseif($asiento['clase']['nombre'] === 'Básico') clase-basico
              @endif"
              onclick="mostrarInformacionAsiento({{ $asiento['idAsiento'] }})">

              {{ $asiento['numeroAsiento'] }}
              </div>
            @endforeach
        </div>
        
     </div>
  
      
        <div class="col-md-1">

        </div>


        <div class="lado-derecho col-md-6">


          <div class="imagen">
            <img id="imagenAsiento" src="{{ asset('images/asiento2.jpg') }}" alt="Preview">
          </div>

          <div class="informacion-asiento">

            <div class="info">
              <div>
                <label>Número de asiento:</label>
                <span id="numero-asiento">-</span>
              </div>
              <div class="">
                <label>Clase:</label>
                <span id="clase">-</span>
              </div>
              <div class="">
                <label>Precio:</label>
                <span id="precio">-</span>
              </div>
            </div>

            <div class="contenedor-boton">
              <a id="botonComprar" href="" class="btn btn-outline-light btn-lg"> Comprar</a>
            </div> 

        </div>
          
        
      </div>

    </div>
</div>





<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="{{asset('images/avion.png')}}" alt="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection

<script src="{{ asset('js/compraBoletos.js') }}"></script>
