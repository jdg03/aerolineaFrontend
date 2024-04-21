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

          

          <div class="primera-clase">
            @foreach($asientos_primera_clase as $asiento)
              @if($asiento['estado'] === true)
                  <div class="col asientos" onclick="mostrarInformacionAsiento({{ $asiento['idAsiento'] }})">
                      {{ $asiento['numeroAsiento'] }}
                      <img src="{{ asset('images/asiento-de-coche-primeraclase2.png') }}" alt="Asiento de Primera Clase">
                  </div>
              @else
                  <div class="col asientos no-disponible">
                     <span> {{ $asiento['numeroAsiento'] }}</span>
                      <img src="{{ asset('images/asiento-de-coche-primeraclase2.png') }}" alt="Asiento de Primera Clase">
                  </div>
              @endif
            @endforeach
          </div>

          <div class="premium">
            @foreach($asientos_premium as $asiento)
              @if($asiento['estado'] === true)
                  <div class="col asientos" onclick="mostrarInformacionAsiento({{ $asiento['idAsiento'] }})">
                      {{ $asiento['numeroAsiento'] }}
                      <img src="{{ asset('images/asiento-de-coche-premium2.png') }}" alt="Asiento Premium">
                  </div>
              @else
                  <div class="col asientos no-disponible">
                      <span> {{ $asiento['numeroAsiento'] }}</span>
                      <img src="{{ asset('images/asiento-de-coche-premium2.png') }}" alt="Asiento Premium">
                  </div>
              @endif
            @endforeach
          </div>

          <div class="basico">
            @foreach($asientos_basico as $asiento)
              @if($asiento['estado'] === true)
                <div class="col asientos" onclick="mostrarInformacionAsiento({{ $asiento['idAsiento'] }})">
                    {{ $asiento['numeroAsiento'] }}
                    <img src="{{ asset('images/asiento-de-coche2.png') }}" alt="Asiento Básico">
                </div>
              @else
                <div class="col asientos no-disponible">
                  <span> {{ $asiento['numeroAsiento'] }}</span>
                    <img src="{{ asset('images/asiento-de-coche2.png') }}" alt="Asiento Básico">
                </div>
              @endif
           @endforeach

          </div>
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
              <a class="btn btn-outline-light btn-lg" data-bs-toggle="modal" data-bs-target="#compra"> Comprar</a>
            </div>
          

        </div>
          
        
      </div>

    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="compra" tabindex="-1" aria-labelledby="modalCrearCuentaLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
           
            <div class="container d-flex justify-content-center">
              <div class="card shadow" style="width: 30rem;">
                  
                <img src="{{ asset('images/logo.png') }}" class="mx-auto" width="140px" alt="">
                  <h3 class="text-center text-secondary my-3">Ingrese sus datos</h3>
                  
                  <form action="{{route('crearCliente')}}" method="POST">
                      @csrf
                      <div class="input-group mb-3">
                          <input type="text" name="nombre" placeholder="Nombre" class="form-control rounded-pill mx-3">
                      </div>
                      <div class="input-group mb-3">
                          <input type="text" name="correo" placeholder="CorreoElectronico" class="form-control rounded-pill mx-3">
                      </div>
                      <div class="input-group mb-3">
                          <input type="text" name="telefono" placeholder="Telefono" class="form-control rounded-pill mx-3">
                      </div>
                      <div class="input-group mb-3">
                          <input type="text" name="direccion" placeholder="Direccion" class="form-control rounded-pill mx-3">
                      </div>
                      <div class="input-group mb-3">
                          <input type="text" name="nacionalidad" placeholder="Nacionalidad" class="form-control rounded-pill mx-3">
                      </div>
                      <div class="input-group mb-3">
                          <input type="text" name="pasaporte" placeholder="Pasaporte" class="form-control rounded-pill mx-3">
                      </div>
                      <div class="input-group mb-3">
                          <input type="password" name="contrasenia" placeholder="Contrasenia" class="form-control rounded-pill mx-3">
                      </div>
                      <div class="input-group mb-3">
                        <a id="botonComprar" href="" class="btn btn-primary rounded-pill w-100 mx-3">Comprar</a>
                      </div>
                      
                  </form>
              </div>
            </div>

          </div>
      </div>
  </div>
</div>

@endsection

<script src="{{ asset('js/compraBoletos.js') }}"></script>
